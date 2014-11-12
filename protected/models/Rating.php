<?php

Yii::import('application.models._base.BaseRating');

class Rating extends BaseRating
{
    public $Model;
    public $data;

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

    public function defaultScope()
    {
        return array(
            'condition'=> "`delete`=0"
        );
    }

    public function getDbConnection(){      //ÓÁĞÀÒÜ ÏÎÒÎÌ Ê ÕÓßÌ ÑÎÁÀ×ÈÌ
        return Yii::app()->igor;
    }

    public static function add($data){
        $model = new Rating;
        $model->attributes = $data;
        $model->user_id_create = General::getMyUserId();
        $model->user_type_create = 1;
        $model->user_type_for = 1;
        $model->date_create = new CDbExpression("now()");
        return $model->save()?'ok':$model->getErrors();
    }

    public static function getMyComments(){
        $criteria = new CDbCriteria;
        $criteria->condition = "`user_id_create`=:user_id_create";
        $criteria->params = array(":user_id_create"=>General::getMyUserId());
        return General::findAllByCriteria('Rating',$criteria);
    }

    public static function getRecordForEdit($id){
        return (!$rating = self::checkUser($id))?false:$rating;
    }

    public static function editComment($post){
        if(!$rating = self::checkUser($post['id'])) return false;
        $rating->rating = $post['rating'];
        $rating->description = iconv("UTF-8","windows-1251",$post['description']);
        return $rating->save(false);
    }

    public static function checkUser($id){
        $rating = Rating::model()->findByPk($id);
        return ($rating->user_id_create!=General::getMyUserId())?false:$rating;
    }

    public static function deleteComment($id){
       if(!$rating = self::checkUser($id)) return false;
               $rating->delete = 1;
        return $rating->save();
    }
}