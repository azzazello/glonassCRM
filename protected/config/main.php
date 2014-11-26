<?php

// uncomment the following to define a path alias
Yii::setPathOfAlias('local',dirname(__FILE__).DIRECTORY_SEPARATOR);


// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'Main ',

    // preloading 'log' component
    'preload'=>array('log'),

    'charset'=>'windows-1251',
    'sourceLanguage'=>'ru',
    'language'=>'ru',

    'defaultController' => 'main',

    // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.components.*',
        'application.helpers.*',
        'ext.giix-components.*',
       /* 'application.modules.user.models.*',
        'application.modules.user.components.*',*/
    ),

    /*'controllerMap'=>array(
        'Cabinet'=>array(
            'class'=>'application.controllers.cpanel.Cabinet'
        )
    ),*/
    'modules'=>array(
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'1111',
             'ipFilters'=>array("127.0.0.1","192.168.0.89"),
            'generatorPaths' => array(
                'ext.giix-core', // giix generators
            ),
            // 'newFileMode'=>0666,
            // 'newDirMode'=>0777,
        ),

       /* 'user'=>array(
            # encrypting method (php hash function)
            'hash' => 'md5',

            # send activation email
            'sendActivationMail' => true,

            # allow access for non-activated users
            'loginNotActiv' => false,

            # activate user on registration (only sendActivationMail = false)
            'activeAfterRegister' => false,

            # automatically login from registration
            'autoLogin' => true,

            # registration path
            'registrationUrl' => array('/user/registration'),

            # recovery password path
            'recoveryUrl' => array('/user/recovery'),

            # login form path
            'loginUrl' => array('/user/login'),

            # page after login
            'returnUrl' => array('/user/profile'),

            # page after logout
            'returnLogoutUrl' => array('/'),
        ),*/

    ),

    'behaviors'=>array(
        'runEnd'=>array(
            'class'=>'application.components.WebApplicationEndBehavior',
        ),
    ),
    // application components
    'components'=>array(

        /*'image'=>array(
            'class'=>'application.extensions.image.CImageComponent',
            'driver'=>'GD',
        ),*/

        'user'=>array(
            // enable cookie-based authentication
          //  'class' => 'WebUser',
            'allowAutoLogin'=>true,
          //  'loginUrl' => array('/user/login'),
        ),
        // uncomment the following to enable URLs in path-format



        /*'db'=>array(
            'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
        ),
        // uncomment the following to use a MySQL database
        */


        'errorHandler'=>array(
            // use 'front/error' action to display errors
            'errorAction'=>'/site/error',
        ),

        'db'=>array(
            'connectionString' => 'mysql:host=192.168.0.89;dbname=zernovoz',
           // 'connectionString' => 'mysql:host=192.168.0.224;dbname=glonass',
            'emulatePrepare' => true,
         //   'username' => 'misha',
            'username' => 'root',
            'password' => '1111',
            'charset' => 'cp1251',
        ),

        'igor'=>array(
            'class' => 'system.db.CDBConnection',
            'connectionString' => 'mysql:host=192.168.0.89;dbname=zernovoz',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '1111',
            'charset' => 'cp1251',
        )

    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>array(
        // this is used in contact page
        'adminEmail'=>'webmaster@example.com',
        'smtp' => array(
            "host" => "smtp.spaceweb.ru", //smtp сервер
            "debug" => 1, //отображение информации дебаггера (0 - нет вообще)
            "auth" => true, //сервер требует авторизации
            "port" => 25, //порт (по-умолчанию - 25)
            "username" => "robot@bp-sever.ru", //имя пользователя на сервере
            "password" => "Hj,,fn", //пароль
            "addreply" => "robot@bp-sever.ru", //ваш е-mail
            "replyto" => "", //e-mail ответа
            "fromname" => "Письмо с сайта", //имя
            "from" => "robot@bp-sever.ru", //от кого info@osb-plywood.ru
            "charset" => "UTF-8", //от кого
        ),
        'service'=>array('url'=>'http://192.168.2.4:9994')
    )
);