<?php

use api\models\Account;

return [

    /***  DENY BLOCK  ***/
    [
        'deny',
        'roles' => [Account::ROLE_MOBILE],
        'controllers' => ['event'],
        'actions' => ['register'],
    ],
    [
        'deny',
        'roles' => [Account::ROLE_MOBILE],
        'controllers' => ['user'],
        'actions' => ['create'],
    ],
    [
        'deny',
        'roles' => [Account::ROLE_MOBILE],
        'controllers' => ['pay'],
    ],
    /*** END DENY BLOCK ***/

    [
        'allow',
        'users' => ['?'],
        'controllers' => ['raec'],
    ],
    [
        'allow',
        'roles' => [Account::ROLE_BASE],
        'controllers' => ['user'],
        'actions' => ['auth', 'search', 'create', 'get', 'login', 'purposes', 'professionalinterests', 'edit', 'setdata', 'setphoto', 'attributes', 'address', 'sections'],
    ],
    [
        'allow',
        'roles' => [Account::ROLE_BASE],
        'controllers' => ['section'],
    ],
    [
        'allow',
        'roles' => [Account::ROLE_BASE],
        'controllers' => ['company'],
    ],
    [
        'allow',
        'roles' => [Account::ROLE_BASE],
        'controllers' => ['event'],
        'actions' => ['roles', 'register', 'list', 'info', 'companies', 'statistics', 'users', 'purposes', 'halls', 'changerole', 'usersPhotos', 'runetids', 'participationCancel'],
    ],
    [
        'allow',
        'roles' => [Account::ROLE_BASE],
        'controllers' => ['pay'],
    ],
    [
        'allow',
        'roles' => [Account::ROLE_BASE],
        'controllers' => ['invite'],
    ],
    [
        'allow',
        'roles' => [Account::ROLE_BASE],
        'controllers' => ['purpose'],
    ],
    [
        'allow',
        'roles' => [Account::ROLE_BASE],
        'controllers' => ['professionalinterest'],
    ],
    [
        'allow',
        'roles' => [Account::ROLE_BASE],
        'controllers' => ['userdocument'],
        'actions' => ['types', 'get', 'set'],
    ],
    [
        'allow',
        'roles' => [Account::ROLE_BASE],
        'controllers' => ['competence'],
        'actions' => ['tests', 'result'],
    ],
    [
        'allow',
        'roles' => [Account::ROLE_BASE],
        'controllers' => ['test'],
        'actions' => ['index']
    ],
    [
        'allow',
        'roles' => [Account::ROLE_BASE],
        'controllers' => ['connect']
    ],

    /*** MBLT ***/
    [
        'allow',
        'roles' => [Account::ROLE_MBLT],
        'controllers' => ['event'],
        'actions' => ['users', 'companies'],
    ],
    [
        'allow',
        'roles' => [Account::ROLE_MBLT],
        'controllers' => ['company'],
        'actions' => ['get'],
    ],

    /** MicroSoft **/
    [
        'allow',
        'roles' => [Account::ROLE_MICROSOFT],
        'controllers' => ['ms', 'pay', 'user'],
    ],

    /** Iri **/
    [
        'allow',
        'roles' => ['iri'],
        'controllers' => ['iri'],
    ],

    /***  ЗАПРЕЩЕНО ВСЕ ЧТО НЕ РАЗРЕШЕНО   ***/
    [
        'deny',
        'users' => ['*'],
    ],
];
