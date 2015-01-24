<?php
class BNComplex {

    static function createAccount($data) {

        //$data = new BncomplexAccount();
        if (Login::model()->count("[User]='".$data->user."'") == 0)
       $command  = Yii::app()->BNComplex->createCommand("INSERT INTO [dbo].[Login] ([State], [Type], [Param],[AddTime], [SendInt], [AppType], [AreaAdmin], [PersistCon], [MaxSessions],[User], [Pass], [AreaID], [Comment], [TechComment], [LastTime], [Version],[AppVer], [UpdTime], [LangID], [Email]) VALUES ".
                  "(1, 1, 0, getutcdate(),0, 0, 0, 1, 10, '".$data->user."', '".$data->pass."', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)")->execute();

        foreach ($data->bncomplexSubscriptions as $plate) {

        $glonass = Glonass::model()->find("num_auto=:plate and deleted = 0",array(":plate"=>$plate->plate));
                if ($glonass) {

                   if (!self::checkDeviceId($glonass->device_id)) {
                       self::createObjectAndDevice($glonass, $data);
                   }

                    self::createOnlySubsc($glonass, $data);
                }
        }
        return Login::model()->find("[User]='".$data->user."'");
       }



        public static  function checkDeviceId($DevNum){       //Проверка на существование DevNum в Devices
            return (Yii::app()->BNComplex->createCommand("select count(DevNum) from [BNComplex].[dbo].[Devices] where DevNum='".AccessoryFunctions::addZeroTodeviceId($DevNum)."'")->queryScalar() > 0) ? true : false ;
        }


        public static function checkConnect($DevID) {

          return Yii::app()->BNComplex->createCommand("EXEC [BNComplex].[dbo].[GetLastCoordByDeviceId]".$DevID)->queryScalar();


        }



      static function createOnlySubsc($glonass, $user) {
        $ObjectID = self::GetObjectIdByNum($glonass);
        $LoginID = self::getLoginIdByUserName($user);
        try { Yii::app()->BNComplex->createCommand("EXEC [BNComplex].[dbo].[prcCreateUVDSubscrToObject]".$LoginID->LoginID.",".$ObjectID["ObjectID"])->execute();}
        catch(Exception  $e) {

        };
      }

    static function getLoginIdByUserName($user) {

        return Login::model()->find("[User]='".$user->user."'");

    }

    static function createObjectAndDevice($glonass, $user=false) {
        try{
            if ($user) $phone = $user->phone; else $phone = "+7";
            Yii::app()->BNComplex->createCommand("EXEC [BNComplex].[dbo].[prcCreateDeviceAndObjectByDevice]'".AccessoryFunctions::addZeroTodeviceId($glonass->device_id)."',13,1,1,5,'".$glonass->num_auto."','".$glonass->num_auto."','".$phone."',1")->execute();
        }catch (Exception $e) {

            echo "EXEC [BNComplex].[dbo].[prcCreateDeviceAndObjectByDevice]'".AccessoryFunctions::addZeroTodeviceId($glonass->device_id)."',13,1,1,5,'".$glonass->num_auto."','".$glonass->num_auto."','".$phone."',1";
            return false;  }
    }


    static function GetDeviceIdByNum($glonass){        //Дай ID device по номеру прибора
        return Yii::app()->BNComplex->createCommand("SELECT [BNComplex].[dbo].[fnGetDeviceIdByNum]('".$glonass->device_id."')")->queryRow();
    }

    static function GetObjectIdByNum($glonass){
        $DevId = self::GetDeviceIdByNum($glonass);
        if ($DevId)
        {
            $DevId = self::getFirst($DevId);
           return Yii::app()->BNComplex->createCommand("SELECT ObjectID from [BNComplex].[dbo].[DevicesOnObjects] where DeviceID=".$DevId."")->queryRow();

        }

    }

    static function getFirst ($array) {
        foreach ($array as $devId) {
            return $devId;
        }
    }


    static function changeIdDevice($from, $to) {

        if (self::checkDeviceId($from) && !self::checkDeviceId($to)) {

            $from = Yii::app()->BNComplex->createCommand("SELECT DeviceID from [BNComplex].[dbo].[Devices] where DevNum='".AccessoryFunctions::addZeroTodeviceId($from)."'")->queryRow() ;
             Yii::app()->BNComplex->createCommand("UPDATE  [BNComplex].[dbo].[Devices] set DevNum='".AccessoryFunctions::addZeroTodeviceId($to)."'  where DeviceID='".$from["DeviceID"]."'")->query() ;
        }

        if (!self::checkDeviceId($to)) {
            $glonass = Glonass::model()->find("device_id=:device_id and deleted = 0",array(":device_id"=>$to));

            self::createObjectAndDevice($glonass);
        }

    }

    static function generatePass() {

        $arr = array('a','b','c','d','e','f',
            'g','h','i','j','k','l',
            'm','n','o','p','r','s',
            't','u','v','x','y','z',
            'A','B','C','D','E','F',
            'G','H','I','J','K','L',
            'M','N','O','P','R','S',
            'T','U','V','X','Y','Z',
            '1','2','3','4','5','6',
            '7','8','9','0');
        // Генерируем пароль
        $pass = "";
        for($i = 0; $i < 8; $i++)
        {
            // Вычисляем случайный индекс массива
            $index = rand(0, count($arr) - 1);
            $pass .= $arr[$index];
        }
        return $pass;
    }

    static function generateUserLogin() {

        $count = BncomplexAccount::model()->count("date_create=:date",array(":date"=>date("Y-m-d")));
        return date("dmy").($count+1);

    }


}