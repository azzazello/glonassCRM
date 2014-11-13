<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PC
 * Date: 27.11.12
 * Time: 1:30
 * To change this template use File | Settings | File Templates.
 */
class ControlerCPanel extends CController
{
    public $layout='//layouts/main';

    public function filters()
    {
        return array(
            'checkAccess'
        );
    }

    public  function  filterCheckAccess($filterChain) {
        if (Yii::app()->user->isGuest) {
            $this->redirect($this->createUrl( "../login" ));
        }

        $filterChain->run();
        return true;
    }

}
