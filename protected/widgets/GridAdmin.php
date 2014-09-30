<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Администратор
 * Date: 13.12.12
 * Time: 18:53
 * To change this template use File | Settings | File Templates.
 */
class GridAdmin extends CWidget
{
    public $base_route;
    public $columns = Array();      //Колонки
    public $data = Array();         //Данные
    public $model;                  //Имя модели
    public $criteria = false;               //Критерия
    public $renderData;             //имя файла для отображения #data
    public $renderOptions;
    const PAGE_SIZE=10;
    public $controller;             //имя родительского контроллера
    public $action;                 //имя метода
    public $searchField = Array();  //поля по которым будет производиться поиск
    public $sortField = Array();    //поля по которым будет производиться сортировка
    public $sortReverse = array("ASC"=>"DESC","DESC"=>"ASC","BOTH"=>"DESC");
    public $excel = false;
    public $search = true;
    public $pages;
    public $get = false;



    public function mode(){
        switch ($this->get){
            case 'clear': $this->clearList(); break;
            case 'excel':  Yii::app()->end( $this->excel() ); break;
            case 'count': $this->countList(); break;
            case 'sort': $this->sortList(); break;
            default: $this->render('gridAdmin', array('sortField'=>$this->sortField));  break;
        }
    }

    public function init()
    {
        if(Yii::app()->request->isPostRequest) Yii::app()->session['search'] = $_POST['search'];
        $this->get = $_GET['mode'];
        $this->criteria = ($this->criteria)? $this->criteria: new CDbCriteria;
        $this->base_route = Yii::app()->request->baseUrl;
        $this->controller = Yii::app()->controller->id;
        $this->action = Yii::app()->controller->action->id;
        $this->addSearch();
        $this->addSort();

    }

    public function run(){

        $this->pages = $this->getPagination();

        $this->data = CActiveRecord::model($this->model)->findAll($this->criteria);
        $this->mode();
    }


    private function getPagination (){		//Pagination
        $count = CActiveRecord::model($this->model)->count($this->criteria);

        $pages=new CPagination($count);
        $pages->pageSize = (isset(Yii::app()->session['c']))? Yii::app()->session['c'] : self::PAGE_SIZE;
        $pages->applyLimit($this->criteria);
        return $pages;
    }

    private function addSearch(){
        if(isset( Yii::app()->session['search'] )) {
            foreach($this->searchField as $val){
                $this->criteria->addSearchCondition($val, Yii::app()->session['search'], true,"OR");
                $this->criteria->addSearchCondition($val, MYChtml::check_num(Yii::app()->session['search']), true,"OR");
            }
        }
    }

    private function addSort(){
        foreach($this->sortField as $v){
            if(isset(Yii::app()->session['field'][$v])){
                $this->criteria->order = $v." ".Yii::app()->session['field'][$v];
            }
        }
    }

    private function excel(){
        $this->criteria->limit = (isset(Yii::app()->session['c']))? Yii::app()->session['c'] : self::PAGE_SIZE;
        $this->data = CActiveRecord::model($this->model)->findAll($this->criteria);
        for($level=ob_get_level();$level>0;--$level){
            @ob_end_clean();
        }
        Yii::app()->request->sendFile("excel.xls", $this->render('excel',array("excel"=>true),true));
    }

    public function countList(){
        Yii::app()->session['c'] = (int)$_GET['c'];
        Yii::app()->controller->redirect(Yii::app()->controller->createUrl($this->action));
    }


    public function clearList(){    //$_GET['c']
        unset(Yii::app()->session['search']);
        unset(Yii::app()->session['field']);
        Yii::app()->controller->redirect(Yii::app()->controller->createUrl($this->action));
    }

    public function sortList(){
        unset(Yii::app()->session['field']);
        Yii::app()->session['field'] = array($_GET['field']=>$_GET['sort']);
        Yii::app()->controller->redirect(Yii::app()->controller->createUrl($this->action));
    }
}

/*
 *
 *
 * */