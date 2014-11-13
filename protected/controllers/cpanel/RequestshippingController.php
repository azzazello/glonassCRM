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

        If ($_GET["select"] == 1) {

           $result = $this->createRequest();
            if ($result["result"] == "noerror") {
                $object = $result["object"];
              //  $object = new RequestShipping();
                $notification = array(
                'Id' =>$object->id,
                'Culture'=>$object->culure->culture,
                'Price'=>$object->price,
                'From'=>$object->region_load_text,
                'To'=>$object->regionUnload->name.", ".$object->stevedore->name
            );
                //print_r($notification);
                $notification_result = Forwebservices::newRequestShipping($notification);
                if ($notification_result != "true")
                 echo iconv("UTF-8","windows-1251",$notification_result);
                 /// ���������� ������ ����
            }

        }

        $all_region = Kladr::getRegions(true);

        $this->render('create',array("all_region"=>$all_region,"select"=>(int)$_GET["select"],"result"=>$result));
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