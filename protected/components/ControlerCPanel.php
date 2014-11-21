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

    public $true = '//ajaxOk';
    public $false = '//ajaxERROR';
    public $pagination;
    const PAGE_SIZE = 4;
    public $criteria;


    public function filters()
    {
        return array(
            'checkAccess'
        );
    }

    public  function  filterCheckAccess($filterChain){
        if (Yii::app()->user->isGuest){
            $this->redirect($this->createUrl( "../login" ));
        }

        $filterChain->run();
        return true;
    }

    public  function getPagination(){		//Pagination
        $count = CActiveRecord::model($this->model)->count($this->criteria);
        $this->pagination = new CPagination($count);
        $this->pagination->pageSize = self::PAGE_SIZE;
        $this->pagination->applyLimit($this->criteria);
    }
}
