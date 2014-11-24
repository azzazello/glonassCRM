<?php

class AjaxController extends ControlerCPanel
{
	public function actionIndex()
	{
		$this->render('index');
	}

    public  function  actionLocality($code,$name)
    {
        if(Yii::app()->request->isAjaxRequest){

            header('Content-Type: application/json; charset=utf-8');
            //echo json_encode(  MYChtml::toArrayAndToUtf8(,array("text"=>"NAME","id"=>"CODE")));
            echo json_encode(  Kladr::getLocalityInRegionArrayForSelect2($code,$name));

        }
    }


    public  function  actionRegions()
    {
        if(Yii::app()->request->isAjaxRequest){
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(Kladr::getRegions(true));
        }
    }

    public function actionStevedore() {
        if(Yii::app()->request->isAjaxRequest){
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(Stevedore::getAll($_POST['id'],true));
        }
    }

    public  function actionDeleteonerequestshipping($id){

        if (RequestShipping::model()->deleteByPK($id)) echo "true"; else echo "error";
    }

    private  function confirmreply($requestId,$phone, $ids) {

       Forwebservices::Confirmreply($requestId,$phone);
        if (ReplyShipping::model()->updateByPK($ids,array("confirm"=>1))) echo json_encode(array("ids"=>$_GET["ids"],"result"=>"true")); else echo json_encode(array("result"=>"error"));
    }

    private  function unconfirmreply($requestId,$phone, $ids) {



        Forwebservices::Unconfirmreply($requestId,$phone);
        if (ReplyShipping::model()->updateByPK($ids,array("confirm"=>0))) echo json_encode(array("ids"=>$_GET["ids"],"result"=>"true")); else echo json_encode(array("result"=>"error"));
    }

    private function delconfirmreply($requestId, $phones, $ids) {

        Forwebservices::DeleteReply($requestId,$phones);
        if (ReplyShipping::model()->updateByPK($ids,array("confirm"=>2))) echo json_encode(array("ids"=>$_GET["ids"],"result"=>"true")); else echo json_encode(array("result"=>"error"));
    }


    public function actionChangestatusreply(){
        $phones = $this->arrayToString($_GET['phones']);
        $requestId =  $_GET['requestId'];
        $ids = $_GET['ids'];
        if ($_GET['status'] == 1) $this->confirmreply($requestId,$phones,$ids);
        if ($_GET['status'] == 2) $this->delconfirmreply($requestId,$phones,$ids);
        if ($_GET['status'] == 3) $this->unconfirmreply($requestId,$phones,$ids);

    }

    private function arrayToString($array){
        $string = "";
        foreach ($array as $val) {
            $string.=$val.",";
        }
        return substr($string,0,strlen($string)-1);
    }

    public function actionAddlastviewreply($id) {
        $lastReply =  ReplyShipping::model()->find(array("condition"=>"request_id=:id","params"=>array(":id"=>$id),"order"=>"id desc"));
        if ($lastReply) {
            OperationWithRequests::model()->deleteAll("idRequest=".(int)$id);
            $operation = new OperationWithRequests();
            $operation->idRequest = $id;
            $operation->userId = Users::getCurrUser();
            $operation->lastIdView = $lastReply->id;
            $operation->save();
            print_r($operation->getErrors());

        }
        echo "true";
        //

    }


}