<?php
/**
 * Created by PhpStorm.
 * User: kunal
 * Date: 8/28/2019
 * Time: 3:20 PM
 */

class Curl
{
    private static $instance;
    public function __construct()
    {
        set_time_limit(0);
        self::$instance = new self();
    }


    /**
     * @param $url
     * @param $type
     * @param $parameters
     * @return array|mixed|object
     * HOW TO MAKE THE CALL::
     *
     * require_once get_template_directory() . "/framework/Curl.php";
     * $output =  Curl::httpPost($url, "POST", $params);
     * var_dump($output);
     */
    public static function httpPost($url, $type, $parameters)
    {

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $type);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                    'App-Key: ' . 'YOUR AUTH KEY GOES HERE')
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($parameters));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);


        if($httpcode>=200 && $httpcode<300) {
            $result = ($output);
        }else {

            $result=[
                "code" 		=>1,
                "response"  => 'Error',
                "errors"	=> ['Unable to load data!'],
                "warnings"	=> [],
                "data" 	    => [$httpcode],
            ];

        }
        return $result;
    }

    public static function httpGet($url,$type,$params){
        $url = rtrim($url,"?") . "?" . http_build_query($params);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'App-Key: ' . 'YOUR AUTH KEY GOES HERE')
        );
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SAFE_UPLOAD, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $type);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }


}
