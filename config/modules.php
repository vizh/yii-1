<?php
return array(
  'modules' => array(
    'gii' => array(
      'class' => 'system.gii.GiiModule',
      'password' => 'vBFwhV06yZ',

      //'ipFilters'=>array('127.0.0.1','::1'),
      'generatorPaths'=>array(
        'application.gii',   // псевдоним пути
      ),
    ),


    'runetid',  
    'company',
    'contact',
    'event',
    'geo',
    'user',
    'pay',
    'mytest',


    'rbac',
  ),
);