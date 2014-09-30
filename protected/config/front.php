<?php

return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    array(
'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

    'mailer' => array(
        'class' => 'application.extensions.mailer.EMailer',
        'pathViews' => 'application.views.front.mail.sendmail.index',
        'pathLayouts' => 'application.views.front.mail.sendmail.layouts'
    ),



		// uncomment the following to enable URLs in path-format

        'urlManager'=>array(
            'urlFormat'=>'path',
            'showScriptName'=>false,
            'rules'=>array(
                           'pattern1'=>'route1',
                           'pattern2'=>'route2',
                           'pattern3'=>'route3',
						   '/<page>.php'=>'site/view',
                       ),
        ))

    )
);
?>