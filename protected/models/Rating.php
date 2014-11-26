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

    public function relations()
    {
        return array(
            'Users'=>array(self::HAS_ONE, 'Users', array('id'=>'user_id_create'))
        );
    }


    /*  public function getDbConnection(){      //ÓÁÐÀÒÜ ÏÎÒÎÌ Ê ÕÓßÌ ÑÎÁÀ×ÈÌ
        return Yii::app()->igor;
    }*/

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

    public static function editRating($post){
        if(!$rating = self::checkUser($post['id'])) return false;
        $rating->rating = $post['rating'];
        $rating->description = iconv("UTF-8","windows-1251",$post['description']);
        return $rating->save(false);
    }

    public static function checkUser($id){
        $rating = Rating::model()->findByPk($id);
        return ($rating->user_id_create!=General::getMyUserId())?false:$rating;
    }

    public static function deleteRating($id){
       if(!$rating = self::checkUser($id)) return false;
               $rating->delete = 1;
        return $rating->save();
    }

    public static function deleteAllRating($post){
        return Rating::model()->updateByPk($post['id'],array('delete'=>1));
    }

    public static function criteriaForGetMyRating(){
        $criteria = new CDbCriteria;
        $criteria->condition = "user_id_create=:user_id_create";
        $criteria->params = array(":user_id_create"=>General::getMyUserId());
        return $criteria;
    }

    public static function getMyRatings($criteria){
        return Rating::model()->findAll($criteria);
    }
}