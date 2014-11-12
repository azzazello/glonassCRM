<?php

class  SiteController extends Controller
{

    public function filterAccessControl($filterChain){

        $filterChain->run();
    }

    public function actionIndex()
    {
        $this->render('index');
    }



}