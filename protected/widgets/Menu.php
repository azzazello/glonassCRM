<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Администратор
 * Date: 13.12.12
 * Time: 18:53
 * To change this template use File | Settings | File Templates.
 */
class Menu extends CWidget
{
    public $text;
    public $active;
    public function run() {

        ///$roleName = Yii::app()->authManager->getAuthAssignments(Yii::app()->user->id);


        Yii::app()->controller->renderPartial("application.widgets.views.menu",array("active"=>$this->active));
       /* foreach ($roleName as $role) {

            $operations = $authExtend->getArrayOperationForRole($role->getItemName());
            foreach ($operations as $val) {
                array_push($arrMenu, $val);
            }
        }*/

    }

}