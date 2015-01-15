<?php

class      TrucksController extends ControlerCPanel
{

    public  function actionList() {

        $criteria=new CDbCriteria();
        $count=Trucks::model()->count($criteria);
        $pages=new CPagination($count);

        // results per page
        $pages->pageSize=100;
        $pages->applyLimit($criteria);
        $trucks=Trucks::model()->findAll($criteria);




    $this->render("list", array("trucks"=>$trucks,  'pages' => $pages));

    }
}

