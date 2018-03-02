<?php
App::uses('AppController', 'Controller');

class BooksController extends AppController {

  public function beforeFilter() {
    parent::beforeFilter();
  }

  public function index() {

    $this->Paginator->settings['limit'] = 25;
    $this->Paginator->settings['order'] = ['nazov' => 'ASC'];

    if($this->request->is('POST')) {
      $this->redirect(array("?" => array('search' => $this->request->data['Book']['search'])));
    }

   

    if(isset($this->params->query['search'])) {
      $query = $this->params->query['search'];
      if(!empty($query)) {
        $this->Paginator->settings['conditions'][] = array(
          'OR' => array(
            'Book.name LIKE' => '%' . $query . '%',
            'Book.author LIKE' => '%' . $query . '%' ,
            'Book.isbn LIKE' => '%' . $query . '%'
          )
        );

        
        $this->request->data['Book']['search'] = $this->params->query['search'];
      }
    }



    $users = $this->Paginator->paginate('Book');
    $this->set(compact('users'));

    $this->set("title_for_layout", __("Zoznam učebníc v ponuke"));
  }

  public function edit($id = null) {

    if($this->Auth->User('type') == '2') return $this->redirect(array('controller' => 'pages', 'action' => 'search'));

    if($this->request->is(array('post', 'put'))) { 

      if(!empty($this->request->data['Book']['new_pdf']['name'])) {
        $ext = pathinfo($this->request->data['Book']['new_pdf']['name'], PATHINFO_EXTENSION);
        
        if($ext == 'pdf') {
          $or_filename = pathinfo($this->request->data['Book']['new_pdf']['name'], PATHINFO_FILENAME);
          $filename = Inflector::slug($this->request->data['Book']['name'].' '.$this->request->data['Book']['author'], '_').'_'.uniqid().'.'.$ext;
          $filePath = WWW_ROOT . 'files' . DS . 'books' . DS;

          if(move_uploaded_file(
              $this->request->data['Book']['new_pdf']['tmp_name'],
              $filePath.$filename
          )); 

          $this->request->data['Book']['pdf'] = $filename;
        } else {
          $this->Flash->error(__('Súbor sa neuložil. Vložte súbor typu PDF.'));
        }
      }

      if ($it = $this->Book->save($this->request->data)) {
          $this->Flash->success(__('Uložené.'));
          //return $this->redirect(array('action' => 'edit', $it['Book']['id']));
          return $this->redirect(array('action' => 'index'));
      } else $this->Flash->error(__('Niekde nastala chyba.'));
    }  
    
    if($id){
      $item = $this->Book->findById($id);
      if (!$item) {
          throw new NotFoundException(__('Neplatný identifikátor.'));
      }
      $this->request->data = $item;

      
      $this->set(compact('item'));
      $this->set('title_for_layout', __('Učebnica').' '.$item['Book']['name']);
    } else {

      $this->set('title_for_layout', __('Pridať učebnicu do ponuky'));
    }

  }

  function download($id) {
    if(empty($id)) {
     	$this->Flash->error(__('Neplatný odkaz.'));
      	return $this->redirect(array('action' => 'index'));
    }

    $book = $this->Book->findById($id);

    if(empty($book)) {
    	$this->Flash->error(__('Neplatný odkaz. Učebnica neexistuje.'));
      	return $this->redirect(array('action' => 'index'));
    }

    if($this->Auth->User('type') != 0) {

	    $this->loadModel('Library');
	    $this->Library->bindModel(array('belongsTo' => array('User' => array('foreignKey' => 'user_id'), 'Book' => array('foreignKey' => 'book_id'))));

	    $my_book = $this->Library->find('first', array('conditions' => array('Library.user_id' => $this->Auth->User('id'), 'Library.book_id' => $id)));

	    if(!empty($my_book)) {
	    	$data['Library']['id'] = $my_book['Library']['id'];
	    }
	    $data['Library']['user_id'] = $this->Auth->User('id');
	    $data['Library']['book_id'] = $id;
	    $data['Library']['last_view'] = date('Y-m-d H:i:s');

	    $save = $this->Library->save($data);

	}

	return $this->redirect('/files/books/'.$book['Book']['pdf']);

    $this->autoRender = false;

  }

  public function delete($id){
    if(!$id){
      throw new NotFoundException();
    }
    if($this->Book->delete($id)){
      $this->Session->setFlash(__('Odstránené.'), 'flash', array('alert'=>'success'));
      return $this->redirect(array('action'=>'index'));
    }
  }
    

}



