<?php
class User extends AppModel {

	public $useTable = 'Users';

	public $validate = array(
        'username' => array(
        	'first'=>array(
	        	'rule' => 'isUnique',
	        	'required' => true,
	        	'message' => 'Užívateľ s týmto menom už existuje!'
	        )
        )
    );

	public function beforeSave($options = array()) {
	    if (isset($this->data['User']['password'])) {
	        $passwordHasher = new BlowfishPasswordHasher();
	        $this->data['User']['password'] = $passwordHasher->hash(
	            $this->data['User']['password']
	        );
	    }
	    return true;
	}


}