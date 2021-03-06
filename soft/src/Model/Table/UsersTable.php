<?php
// src/Model/Table/UsersTable.php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->belongsTo('Associations');
        $this->hasMany('Amounts');

    }

    public function validationDefault(Validator $validator)
    {
       $validator
              ->notEmpty('username', 'Nombre de usuario requerido')
              ->add('username', 'validFormat',[
                'rule'=>array('custom','/^[A-Za-z0-9\-\_]+$/'),
                'message'=> 'Debe contener únicamente números o letras'])
              ->notEmpty('password', 'Contraseña requerida')
              ->add('password', 'validFormat',[
                'rule'=>array('custom', '/^(?=.*\d).{4,8}$/'),
                'message' => 'Password debe tener entre 4 y 8 caracteres y al menos un número'
              ])
              ->notEmpty('name', 'Nombre requerido')
              ->add('name', 'validFormat', [
                          'rule' => array('custom', '/^[A-Za-z]+$/'),
                          'message' => 'Debe contener únicamente letras.'
              ])
              ->notEmpty('last_name_1')
              ->add('last_name_1', 'validFormat', [
                          'rule' => array('custom', '/^[A-Za-z]+$/'),
                          'message' => 'Debe contener únicamente letras.'
              ])
              ->notEmpty('last_name_2')
              ->add('last_name_2', 'validFormat', [
                          'rule' => array('custom', '/^[A-Za-z]+$/'),
                          'message' => 'Debe contener únicamente letras.'
              ])
              ->requirePresence('role') ;





       /*
            ->notEmpty('username', 'A username is required')
            ->notEmpty('password', 'A password is required')
            ->notEmpty('role', 'A role is required')
            ->add('role', 'inList', [
                'rule' => ['inList', ['admin', 'author']],
                'message' => 'Please enter a valid role'
            ]);*/
      return $validator;
    }

}
?>
