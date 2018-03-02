<?php
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class UsersController extends AppController {

  public function beforeFilter() {
    if($this->Auth->User('type') == '1') return $this->redirect(array('controller' => 'pages', 'action' => 'search'));
   if($this->Auth->User('type') == '3') return $this->redirect(array('controller' => 'pages', 'action' => 'search'));
    parent::beforeFilter();
    $this->Auth->Allow('login');
    $this->set('title_for_layout', __('Knihypreskoly'));
  }

  public function login() {
    if($this->Auth->User('User.username')) return $this->redirect(array('controller' => 'pages', 'action' => 'search'));

    
      if ($this->request->is('post')) {
        if($res = $this->Auth->login()) {
          $this->Flash->success(__('Úspešne ste sa prihlásili do systému.'));
          return $this->redirect($this->Auth->redirectUrl());
        }

        $this->Flash->error(__('Nepodarilo sa...'));

        //return $this->redirect(array('action' => 'login'));
      }

    $this->layout = 'login';

    //}
  }

  public function index() {
   if($this->Auth->User('type') == '1') return $this->redirect(array('controller' => 'pages', 'action' => 'search'));
   if($this->Auth->User('type') == '3') return $this->redirect(array('controller' => 'pages', 'action' => 'search'));
   //if($this->Auth->User('User.type') == '3') return $this->redirect(array('controller' => 'pages', 'action' => 'search'));

    $this->Paginator->settings['limit'] = 25;
    $this->Paginator->settings['order'] = ['priezvisko' => 'ASC'];

    if($this->request->is('POST')) {
      $this->redirect(array("?" => array('search' => $this->request->data['User']['search'])));
    }

    if(isset($this->params->query['search'])) {
      $query = $this->params->query['search'];
      if(!empty($query)) {
        $this->Paginator->settings['conditions'][] = array(
          'OR' => array(
            'User.email LIKE' => '%' . $query . '%',
            'User.name LIKE' => '%' . $query . '%',
            'User.lastname LIKE' => '%' . $query . '%'
          )
        );
        $this->request->data['User']['search'] = $this->params->query['search'];
      }
    }



    $users = $this->Paginator->paginate('User');
    $this->set(compact('users'));

    $this->set("title_for_layout", __("Zoznam používateľov"));

       
//  debug($users);  
  
}

  public function edit($id = null) {
     if($this->Auth->User('type') == '1') return $this->redirect(array('controller' => 'pages', 'action' => 'search'));
      if($this->Auth->User('type') == '3') return $this->redirect(array('controller' => 'pages', 'action' => 'search'));
    //if($this->Auth->User('User.username') != 'admin') return $this->redirect(array('controller' => 'pages', 'action' => 'search'));

    if($this->request->is('post')) {
      if ($this->User->save($this->request->data)) {
          $this->Flash->success(__('Uložené.'));
          return $this->redirect(array('action' => 'edit', $id));
      } else $this->Flash->error(__('Niekde nastala chyba.'));
    }
    
    if($id){
      $item = $this->User->findById($id);
      if (!$item) {
          throw new NotFoundException(__('Neplatný identifikátor.'));
      }
      $this->request->data = $item;

      $this->set(compact('item'));
      $this->set('title_for_layout', __('Používateľa ').$item['User']['lastname']);
    } else {

      $this->set('title_for_layout', __('Pridať používateľa'));
    }

  }

  public function delete($id){
    if(!$id){
      throw new NotFoundException();
    }
    if($this->User->delete($id)){
      $this->Session->setFlash(__('Odstránené.'), 'flash', array('alert'=>'success'));
      return $this->redirect(array('action'=>'index'));
    }
  }

}