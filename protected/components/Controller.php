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
	public $layout='//layouts/main';
    public $criteria;
    public $message;
    public $true = '//ajaxOk';
    public $false = '//ajaxERROR';

    public function isGuest(){
        if (Yii::app()->user->isGuest) $this->redirectToMain();
    }

    public function redirectToMain(){
        $this->redirect($this->createUrl("/main"));
    }

    public function renderFalse(){
        $this->renderPartial($this->false); die;
    }
    public function ajaxMessages($str){
        echo MYChtml::toUTF8($str);
        die;
    }
}