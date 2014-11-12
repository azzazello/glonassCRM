<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PC
 * Date: 27.11.12
 * Time: 3:57
 * To change this template use File | Settings | File Templates.
 */
class MYMail
{

    public static function MailerTo($email,$subject,$data,$render = '//clearRender'){

        $__smtp=Yii::app()->params['smtp'];

        Yii::app()->mailer->Host = $__smtp['host'];
        Yii::app()->mailer->Port = $__smtp['port'];
        Yii::app()->mailer->IsSMTP();
        Yii::app()->mailer->SMTPAuth = $__smtp['auth'];
        Yii::app()->mailer->Username = $__smtp['username'];
        Yii::app()->mailer->Password = $__smtp['password'];
        Yii::app()->mailer->SMTPDebug = $__smtp['debug'];
        Yii::app()->mailer->From = $__smtp['from'];
        Yii::app()->mailer->FromName = iconv("windows-1251","UTF-8",$__smtp['fromname']);

        Yii::app()->mailer->AddAddress($email); //bablgum@mail.ru
        Yii::app()->mailer->Subject = iconv("windows-1251","UTF-8",$subject);

        Yii::app()->mailer->MsgHTML( Yii::app()->controller->renderPartial( $render, array('data'=> $data),true) );
        Yii::app()->mailer->CharSet = "UTF-8";
        if(Yii::app()->mailer->send())	return true;
        else return false;
    }
}
