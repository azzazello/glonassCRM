<?php
return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
        'components'=>array(
            'user'=>array(
                // enable cookie-based authentication
                'allowAutoLogin'=>true,
				'loginUrl'=>array('login'),
            ),
            // uncomment the following to enable URLs in path-format

            'errorHandler'=>array(
                'errorAction'=>'error',
            ),
			
			    'mailer' => array(
			        'class' => 'application.extensions.mailer.EMailer',
			        'pathViews' => 'application.views.front.mail.sendmail.index',
			        'pathLayouts' => 'application.views.front.mail.sendmail.layouts'
			    ),
	
            'authManager'=>array(
                'class'=>'CDbAuthManager',
                'connectionID'=>'db',
                'itemTable'          => 'AuthItem',
                'itemChildTable'    => 'AuthItemChild',
                'assignmentTable' => 'AuthAssignment',
                'defaultRoles'       =>  array('Guest')
            ),

            'urlManager'=>array(
                'urlFormat'=>'path',
                'showScriptName'=>false,
                'rules'=>array(
                    'cpanel'=>'site/index',
                    'cpanel/<_c>'=>'<_c>',
                    'cpanel/<_c>/<_a>'=>'<_c>/<_a>',
                ),
           ) )
    )
);