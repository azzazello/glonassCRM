<?php

class General extends CActiveRecord
{
    public static function findAllByCriteria($table,$criteria = null){
        $criteria = $criteria?$criteria:new CDbCriteria;
        return CActiveRecord::model($table)->findAll($criteria);
    }

    public static function getMyUserId(){
        return  Yii::app()->user->getId();
    }
}










