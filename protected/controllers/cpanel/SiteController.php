<?php

class  SiteController extends ControlerCPanel
{

    public function filterAccessControl($filterChain){

        $filterChain->run();
    }

    public function actionIndex()
    {
        $this->render('index');
    }

}