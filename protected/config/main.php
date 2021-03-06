<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
  'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
  'name' => 'My Web Application',

  // preloading 'log' component
  'preload' => array('log'),

  // autoloading model and component classes
  'import' => array(
    'application.models.*',
    'application.components.*',
    'application.modules.user.models.*',
    'application.modules.user.components.*',
    'application.modules.rights.*',
    'application.modules.rights.components.*',
  ),

  'modules' => array(
    // uncomment the following to enable the Gii tool

    'gii' => array(
      'class' => 'system.gii.GiiModule',
      'password' => '123',
      // If removed, Gii defaults to localhost only. Edit carefully to taste.
      'ipFilters' => array('127.0.0.1', '::1'),
    ),
    'admin',
    'user'=>array(
      'tableUsers' => 'tbl_users',
      'tableProfiles' => 'tbl_profiles',
      'tableProfileFields' => 'tbl_profiles_fields',
      # encrypting method (php hash function)
      'hash' => 'md5',
      # send activation email
      'sendActivationMail' => FALSE,
      # allow access for non-activated users
      'loginNotActiv' => TRUE,
      # activate user on registration (only sendActivationMail = false)
      'activeAfterRegister' => TRUE,
      # automatically login from registration
      'autoLogin' => TRUE,
      # registration path
      'registrationUrl' => array('/user/registration'),
      # recovery password path
      'recoveryUrl' => array('/user/recovery'),
      # login form path
      'loginUrl' => array('/user/login'),
      # page after login
      'returnUrl' => array('/user/profile'),
      # page after logout
      'returnLogoutUrl' => array('/user/login'),
    ),

    //Modules Rights
    'rights'=>array(

      'superuserName'=>'admin', // Name of the role with super user privileges.
      'authenticatedName'=>'Authenticated',  // Name of the authenticated user role.
      'userIdColumn'=>'id', // Name of the user id column in the database.
      'userNameColumn'=>'username',  // Name of the user name column in the database.
      'enableBizRule'=>true,  // Whether to enable authorization item business rules.
      'enableBizRuleData'=>true,   // Whether to enable data for business rules.
      'displayDescription'=>true,  // Whether to use item description instead of name.
      'flashSuccessKey'=>'RightsSuccess', // Key to use for setting success flash messages.
      'flashErrorKey'=>'RightsError', // Key to use for setting error flash messages.
      'baseUrl'=>'/rights', // Base URL for Rights. Change if module is nested.
      'layout'=>'rights.views.layouts.main',  // Layout to use for displaying Rights.
      'appLayout'=>'application.views.layouts.main', // Application layout.
      'cssFile'=>'rights.css', // Style sheet file to use for Rights.
      'install'=>false,  // Whether to enable installer.
      'debug'=>false,
    ),

  ),

  // application components
  'components' => array(

    'user' => array(
      // enable cookie-based authentication
      'class' => 'WebUser',
      'allowAutoLogin' => TRUE,
      'loginUrl' => array('/user/login')
    ),
    'authManager'=>array(
      'class'=>'RDbAuthManager',
      'connectionID'=>'db',
      'itemTable'=>'authitem',
      'itemChildTable'=>'authitemchild',
      'assignmentTable'=>'AuthAssignment',
      'rightsTable'=>'rights',
      'defaultRoles' => array('guest'),
    ),
    // uncomment the following to enable URLs in path-format

    'urlManager' => array(
      'showScriptName' => FALSE,
      'urlFormat' => 'path',
      'rules' => array(
        '' => 'site/index',
        '<action:(login|logout)>' => 'site/<action>',
        '<controller:\w+>/<id:\d+>' => '<controller>/view',
        '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
      ),
    ),
    'clientScript'   => array(
      'class' => 'system.web.CClientScript'
    ),

    // database settings are configured in database.php
    'db' => require(dirname(__FILE__) . '/database.php'),

    'errorHandler' => array(
      // use 'site/error' action to display errors
      'errorAction' => YII_DEBUG ? NULL : 'site/error',
    ),

    'log' => array(
      'class' => 'CLogRouter',
      'routes' => array(
        array(
          'class' => 'CFileLogRoute',
          'levels' => 'error, warning',
        ),
        // uncomment the following to show log messages on web pages
        /*
        array(
          'class'=>'CWebLogRoute',
        ),
        */
      ),
    ),

  ),

  // application-level parameters that can be accessed
  // using Yii::app()->params['paramName']
  'params' => array(
    // this is used in contact page
    'adminEmail' => 'webmaster@example.com',
  ),
);
