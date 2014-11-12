<?php

Yii::import('application.models._base.BaseOperationWithRequests');

class OperationWithRequests extends BaseOperationWithRequests
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

    public static function getCountOfNewReply($id) {
            $oper = OperationWithRequests::model()->findAll("idRequest = :id and userId = :user",array(":id"=>$id,":user"=>Users::getCurrUser()));
            if ($oper)
            return ReplyShipping::model()->count("request_id = :id and id > :oper", array(":id"=>$id, ":oper"=>$oper->lastIdView));
            else
            return ReplyShipping::model()->count("request_id = :id", array(":id"=>$id));
    }

    public static function getCountOfReply($id) {
        return ReplyShipping::model()->count("request_id = :id and confirm in (0,1)", array(":id"=>$id));

    }

    public static function getCountOfConfirmReply($id) {
        return ReplyShipping::model()->count("request_id = :id and confirm = 1", array(":id"=>$id));
    }
}