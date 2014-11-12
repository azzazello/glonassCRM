<?
class Forwebservices
{

    public  static  function  newRequestShipping($data, $url = "192.168.0.224:1079") {

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

}