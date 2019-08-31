<?php 
  require_once "Curl.php";
  $url = 'http://URLOF/API/callme';

/*POST*/
    $params = array(
        'param_1' => 'ONE'
        'param_2' => ' TWO',
    );

    $output =  Curl::httpPost($url, "POST", $params);
    var_dump($output);
    
    /*GET*/
    $params = array(
        'param_1' => 'ONE'
        'param_2' => ' TWO',
    );

    $output =  Curl::httpPost($url, "POST", $params);
    var_dump($output);
?>
