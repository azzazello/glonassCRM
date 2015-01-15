<?php

class ExportController extends ControlerCPanel
{

    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionLoad() {

      Payments::model()->deleteAll();
      Trucks::model()->deleteAll();
      ZReport::model()->deleteAll();

      $this->render("load");
    }


}