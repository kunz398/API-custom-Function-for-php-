in order to use this
include the *curl.php* file in your  project and then all you have to do is 
*require the file* 
Example:
**index.php**

    require_once  "Curl.php";
    $url = 'http://URLOF/API/callme';

> Making a POST API Call

    $params = array(
    'param_1' => 'ONE'
    'param_2' => ' TWO',
    );
    
    $output = Curl::httpPost($url, "POST", $params);
    var_dump($output);

>  Making a GET API Call


  

      $params = array(
        'param_1' => 'ONE'
        'param_2' => ' TWO',
        );
        
      $output = Curl::httpPost($url, "POST", $params);
      var_dump($output);
