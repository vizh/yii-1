<?php

return array(
  array(
    'allow',
    'roles' => array('Admin'),
    'module' => 'partner',
    'controllers' => array('user'),
  ),
  array(
    'allow',
    'users' => array('?'),
    'module' => 'partner',
    'controllers' => array('auth'),
    'actions' => array('index')
  ),
  array(
    'allow',
    'roles' => array('Admin'),
    'module' => 'partner',
    'controllers' => array('user'),
    'actions' => array('statistics')
  ),
  array(
    'deny',
    'roles' => array('Partner'),
    'module' => 'partner',
    'controllers' => array('user'),
    'actions' => array('statistics')
  ),
  array(
    'allow',
    'roles' => array('Partner'),
    'module' => 'partner',
    'controllers' => array('main', 'order', 'coupon', 'userEdit', 'utility', 'special'),
  ),
  array(
    'allow',
    'roles' => array('Partner'),
    'module' => 'partner',
    'controllers' => array('user'),
    'actions' => array('index')
  ),

  array(
    'allow',
    'roles' => array('Admin'),
    'module' => 'partner',
    'controllers' => array('user')
  ),

  array(
    'allow',
    'roles' => array('Partner'),
    'module' => 'partner',
    'controllers' => array('orderitem'),
    'actions' => array('index', 'create', 'redirect')
  ),
  array(
    'allow',
    'roles' => array('Admin'),
    'module' => 'partner',
    'controllers' => array('orderitem'),
    'actions' => array('activateajax')
  ),
  array(
    'allow',
    'roles' => array('Partner'),
    'module' => 'partner',
    'controllers' => array('auth'),
    'actions' => array('logout')
  ),
  array(
    'allow',
    'roles' => array('Admin'),
    'module' => 'partner',
    'controllers' => array('ruvents', 'internal')
  ),
  array(
    'allow',
    'roles' => array('Admin'),
    'module' => 'partner',
    'controllers' => array('user'),
    'actions' => array('register')
  ),
  array(
    'allow',
    'roles' => array('Admin'),
    'module' => 'partner',
    'controllers' => array('stat')
  ),
  array(
    'allow',
    'roles' => array('Admin'),
    'module' => 'partner',
    'controllers' => array('program')
  ),
  array(
    'deny',
    'users' => array('*')
  ),
);