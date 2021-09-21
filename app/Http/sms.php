<?php
namespace App\Http;

/**
* class MSG91 to send SMS on Mobile Numbers.
* @author Shashank Tiwari
*/
class SMS {

    function __construct() {

    }

    private $API_KEY = 'API_KEY';
    private $SENDER_ID = "VERIFY";
    private $ROUTE_NO = 4;
    private $RESPONSE_TYPE = 'json';

    public function sendSMS($OTP, $mobileNumber){
        $isError = 0;
        $errorMessage = true;

        //Your message to send, Adding URL encoding.
        $message = urlencode("Welcome to ".config('app.name')." , Your OPT is : $OTP");
     

        //Preparing post parameters
        // $postData = array(
        //     'authkey' => $this->API_KEY,
        //     'mobiles' => $mobileNumber,
        //     'message' => $message,
        //     'sender' => $this->SENDER_ID,
        //     // 'route' => $this->ROUTE_NO,
        //     'response' => $this->RESPONSE_TYPE
        // );
      $postData = array(
            'to' => $mobileNumber,
            'p' => 'RooCziiwB6yrGEGHDitEZQmtmIh1ojDv17PWqsM7MDY8uj4RqHolSDBcdWTtEzNj',
            'text' => $message
        );
        // $url = "https://control.msg91.com/sendhttp.php";
         $url = "https://d7sms.p.rapidapi.com/secure/send";


        


$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://rest-api.d7networks.com/secure/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\n\t\"to\":\"+918903494297\",\n\t\"content\":\"Welcome to D7 sms , we will help you to talk with your customer effectively\",\n\t\"from\":\"SMSINFO\",\n\t\"dlr\":\"yes\",\n\t\"dlr-method\":\"GET\", \n\t\"dlr-level\":\"2\", \n\t\"dlr-url\":\"http://yourcustompostbackurl.com\"\n}",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/x-www-form-urlencoded",
    "Authorization: Basic b3J1djcwMDE6MjZqZzdzWjk="
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);


//Print error if any
        if ($err) {
        // if (curl_errno($curl)) {
            $isError = true;
            $errorMessage = curl_error($curl);
        }
        curl_close($curl);


        if($isError){
            return array('error' => 1 , 'message' => $errorMessage);
        }else{
            return array('error' => 0 );
        } 
    }
}
?>