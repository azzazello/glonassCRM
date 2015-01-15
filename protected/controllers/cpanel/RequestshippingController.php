<?php

class RequestshippingController extends ControlerCPanel
{
    public $errorSave = array(
        1=>"Неверно указана дата начала погрузки",
        2=>"Неверно указана дата окончания приема заявок",
        3=>"Неверно указан регион погрузки",
        4=>"Неверно указан населенный пункт погрузки",
        5=>"Неверно указано место выгрузки",
        6=>"Неверно указано расстояние",
        7=>"Неверно указана культура",
        8=>"Неверно указан трейдер",
        9=>"Неверно указана цена",
        10=>"Неверно указана номинация весов на погрузке",
        11=>"Неверно указан тип загрузки",
        12=>"Неверно указан объем перевозки",
        13=>"Неверно указано место расчета",
        14=>"Неверно указан стивидор",
    );



	public function actionIndex()
	{
		$this->render('index');
	}




    public function actionCreate()
    {




        $this->render('create');
    }

    public function actionList() {

        $result = RequestShipping::model()->findAll();
        $this->render("list",array("result"=>$result));

    }

	public  function  createRequest() {
        $request = New RequestShipping();
        $result = RequestShipping::add($_POST,$request);

        return $result;
    }






}