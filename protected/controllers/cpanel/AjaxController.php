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

    public function actionConfirmreply($id,$phone) {

        Forwebservices::Confirmreply($id,$phone);
        if (ReplyShipping::model()->updateByPK($id,array("confirm"=>1))) echo "true"; else echo "error";
    }

    public function actionUnconfirmreply($id,$phone) {

        Forwebservices::Unconfirmreply($id,$phone);
        if (ReplyShipping::model()->updateByPK($id,array("confirm"=>0))) echo "true"; else echo "error";
    }

    public function actionDelconfirmreply($id,$phone) {
        Forwebservices::DeleteReply($id,$phone);
        if (ReplyShipping::model()->updateByPK($id,array("confirm"=>2))) echo "true"; else echo "error";
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