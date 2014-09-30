<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';

    public $name;
    public $message;
    public $false = '/ajaxERROR';
    public $true = '/ajaxOK';
    public $activeMenu = "none";
    public $criteria;
    public $userNotification = array();


	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();


    public function filters()
    {
        return array(
            'AccessControl'
        );
    }




    public function notfound(){
            $this->renderPartial("application.views.404");
        die;
    }

    protected function message(){
        if(isset($_GET['save'])) {
            $this->message = AccessoryFunctions::save($_GET['save']);       //($_GET['save']=='ok')?'Сохранено успешно':'Ошибка сохранения';
            unset($_GET['save']);
        }
    }
	public $breadcrumbs=array();
	
			public function MailerTo($email,$message,$partial,$link){
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
	                Yii::app()->mailer->Subject = $message;
	                Yii::app()->mailer->MsgHTML($this->renderPartial($partial, array('link'=>$link),true));
	                Yii::app()->mailer->CharSet = "UTF-8";
		                if(Yii::app()->mailer->send())	return true;
							else return false;
		    }



}