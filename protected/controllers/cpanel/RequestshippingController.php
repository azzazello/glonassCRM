<?php

class RequestshippingController extends ControlerCPanel
{
    public $errorSave = array(
        1=>"������� ������� ���� ������ ��������",
        2=>"������� ������� ���� ��������� ������ ������",
        3=>"������� ������ ������ ��������",
        4=>"������� ������ ���������� ����� ��������",
        5=>"������� ������� ����� ��������",
        6=>"������� ������� ����������",
        7=>"������� ������� ��������",
        8=>"������� ������ �������",
        9=>"������� ������� ����",
        10=>"������� ������� ��������� ����� �� ��������",
        11=>"������� ������ ��� ��������",
        12=>"������� ������ ����� ���������",
        13=>"������� ������� ����� �������",
        14=>"������� ������ ��������",
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