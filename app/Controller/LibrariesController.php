<?php
App::uses('AppController', 'Controller');

class LibrariesController extends AppController {

  public function beforeFilter() {
    parent::beforeFilter();
  }

  public function index() {

    $this->Library->bindModel(array('belongsTo' => array('User' => array('foreignKey' => 'user_id'), 'Book' => array('foreignKey' => 'book_id'))));

    $this->Paginator->settings['limit'] = 25;
    $this->Paginator->settings['order'] = ['id' => 'ASC'];

     if($this->request->is('POST')) {
      $this->redirect(array("?" => array('search' => $this->request->data['Library']['search'])));
    }

    if(isset($this->params->query['search'])) {
      $query = $this->params->query['search'];
      if(!empty($query)) {
        $this->Paginator->settings['conditions'][] = array(
          'OR' => array(
            'Book.name LIKE' => '%' . $query . '%',
            'User.name LIKE' => $query,
            'User.lastname LIKE' => '%' . $query . '%'
          )
        );
        $this->request->data['Library']['search'] = $this->params->query['search'];
 
    

      }
    }

    $users = $this->Paginator->paginate('Library');
    $this->set(compact('users'));

    $this->set("title_for_layout", __("Zoznam učebníc žiakov"));
  }

 
    

}



