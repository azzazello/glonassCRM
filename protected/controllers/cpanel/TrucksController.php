<?php

class      TrucksController extends ControlerCPanel
{

    public $type = array("0"=>"Наш", "1"=>"Переход", "2"=>"Ретрансляция");
    public  function actionList() {

        $criteria=new CDbCriteria();
        $criteria->order = "id desc";

        if ($_GET["search"]==1) {
            $plates = explode(",",$_POST["plate"]);
            foreach ($plates as $plate){
            $criteria->addSearchCondition("plate", trim(MYChtml::check_num($plate)), true, "OR");

            }
        }
        $count=Trucks::model()->count($criteria);
        $pages=new CPagination($count);

        // results per page
        $pages->pageSize=30;
        $pages->applyLimit($criteria);
        $trucks=Trucks::model()->findAll($criteria);




    $this->render("list", array("trucks"=>$trucks,  'pages' => $pages));

    }

    public  function actionIndex() {

        $this->actionList();

    }


    function actionCheckBeforeSendAccess() {

        $accounts = BncomplexAccount::model()->findAll(array("order"=>"user"));

        $this->render("checkbeforesendaccess",array("plates"=>$_POST['plate'], "accounts"=>$accounts));


    }

    function actionCreateAndSendAccess() {
          if ($_POST['accounts'] == 0) {
        $account = new BncomplexAccount();
        $account->date_create = new CDbExpression("now()");
        //$account->forsearch
        $account->user = BNComplex::generateUserLogin();
        $account->forsearch = $account->user;
        $account->pass = BNComplex::generatePass();
        $account->phone = $_POST["phone"];
        $result =  $account->save();
        } else {
              $account = BncomplexAccount::model()->find("user=:user",array(":user"=>$_POST["accounts"]));
              $result = $account;
          }

        if ($result) {
            foreach ($_POST["plates"] as $plate) {
                if (strlen(str_replace(" ","",$plate))>0) {
                    if (BncomplexSubscription::model()->count("plate=:plate and id_account=:account",array(":plate"=>$plate,":account"=>$account->id))==0){
                $subs = new BncomplexSubscription();
                $subs->id_account = $account->id;
                $subs->plate = MYChtml::check_num($plate);
                if (!$subs->save())
                    print_r($subs->getErrors());
                }}
            }
        } else echo "Пиздец".$_POST["accounts"];
        if ($account)  {

            $BNLogin = BNComplex::createAccount($account);
            if ($BNLogin) {

            } else echo "Опять пиздец";
        }


        $this->render("createandsend",array("account"=>$account,"isNew"=>($_POST['accounts'] == 0)?"Новый":"Старый"));


    }
}

