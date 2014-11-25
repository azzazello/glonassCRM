<?
class Forwebservices
{

    public  static function  newRequestShipping($data, $url = "192.168.0.224:1079"){

        $url = "http://".$url."/json/reply/NewShippingRequest";
        $params = $data;
        return $result = file_get_contents($url, false, stream_context_create(array(
            'http' => array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query($params)
            )
        )));
    }

    public static function confirmAccount($phone,$code){
        $url =  Yii::app()->params['service']['url'].'/json/reply/ActivateAccountRequest';
        $params = array(
            'Phone' => AccessoryFunctions::clearTel($phone),
            'Code' => $code
        );
        return self::getContents($params,$url);
    }

    public static function getContents($params,$url){
        return file_get_contents($url, false, stream_context_create(array(
            'http' => array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query($params)
            )
        )));
    }

    public static function SendCodeRequest($phone){
        $url = Yii::app()->params['service']['url'].'/json/reply/SendCodeRequest';
        $params = array(
            'Phone' => AccessoryFunctions::clearTel($phone)
        );
        return self::getContents($params,$url);
    }

    private  static function ReplyStatusChanged($data, $url) {
        $url = "http://".$url."/json/reply/ReplyStatusChanged";
        $params = $data;

        return $result = file_get_contents($url, false, stream_context_create(array(
            'http' => array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query($params)
            )
        )));

    }


    public static function Confirmreply($id,$phone, $url = "192.168.0.224:1079"){

        $data = array(
                "RequestId"=>$id,
                "Phones"=>$phone,
                "IsConfirmed"=>1
                );

        return self::ReplyStatusChanged($data,$url);
    }


    public static function Unconfirmreply($id,$phone, $url = "192.168.0.224:1079"){

        $data = array(
            "RequestId"=>$id,
            "Phones"=>$phone,
            "IsConfirmed"=>0
        );

        return self::ReplyStatusChanged($data,$url);
    }

    public static function DeleteReply($id,$phone, $url = "192.168.0.224:1079"){

        $data = array(
            "RequestId"=>$id,
            "Phones"=>$phone,
            "IsConfirmed"=>2
        );
        return self::ReplyStatusChanged($data,$url);
    }

    public static function SignUpRequestV1($post){

        $url = Yii::app()->params['service']['url'].'/json/reply/SignUpRequestV1';
        $params = array(
            'Phone' =>  AccessoryFunctions::clearTel($post['login']),
            'Password' => $post['password'],
            'Name' => $post['name'],
            'Occupation' => 3,
            'Company' => $post['company'],
            'Email' => $post['email'],
            'Skype' => $post['skype']
        );
        $result = file_get_contents($url, false, stream_context_create(array(
            'http' => array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query($params)
            )
        )));
        $date = json_decode($result);
        return $date->Status;
    }

}