<?php

//all rights reserved iAldazActivator
//bot telegram
// note => to make the bot pull, you must put this link => https://api.telegram.org/bot$youtoken/setWebhook?url=https://you_domain.com/check/bot/ialdaz_bot_check.php
$token = 'youtoken_bot';
$website = 'https://api.telegram.org/bot'.$token;

$input = file_get_contents('php://input');
$update = json_decode($input, TRUE);

$chatId = $update['message']['chat']['id'];

$message = $update['message']['text'];

  
$mystring = $message;
$findme   = '/check ';
$pos = strpos($mystring, $findme);

if ($pos === false) {
}else{
    $text1 = "<code>processing...</code>";
    sendMessage1($text1, $chatId);
    $text = check($message);
    sendMessage($text, $chatId);
}


$mystring1 = $message;
$findme1   = '/iccid';
$pos1 = strpos($mystring1, $findme1);

if ($pos1 === false) {
}else{
    $text1 = "<code>processing...</code>";
    sendMessage1($text1, $chatId);
    $text = iccid($message1);
    sendMessage($text, $chatId);
}


$mystring2 = $message;
$findme2   = '/check_device ';
$pos2 = strpos($mystring2, $findme2);

if ($pos2 === false) {
}else{
    $text1 = "<code>processing...</code>";
    sendMessage1($text1, $chatId);
    $text = checkmac($message);
    sendMessage($text, $chatId);
}


    function check($message1)
    {
        $message1 = str_replace("/check ", "", $message1);
        $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://iservices-dev.us/check/Nhteam.php?imei=$message1",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
));
$curlResponse = curl_exec($curl);
curl_close($curl);
$response = json_decode($curlResponse);
if($response->ERROR == 'Invalid IMEI/Serial Number'){
    return "<code>IMEI / SERIAL INVALID ❌</code>";
}
elseif($response->ERROR == 'Invalid IMEI/Serial Number'){
    return "<code>IMEI / SERIAL INVALID! ❌</code>";
}
elseif(!empty($response->type))
{
    if($response->FindMyiDevice == "ON")
    {
        return "✅  𝐢𝐀𝐥𝐝𝐚𝐳 𝐂𝐡𝐞𝐜𝐤 𝐁𝐨𝐭 ✅   \n========================= \n\n<code>SERIAL => </code><u>".$response->Serial.

            "</u><code>\nMODEL => </code><u>".$response->Modelo.
            "</u><code>\nActivation => </code><u>".$response->Activation.
            "</u><code>\niCloud Lock => </code><u>".$response->FindMyiDevice."</u> ❌\n<code>   \n=========================== \n\n𝑻𝒉𝒂𝒏𝒌𝒔 𝒀𝒐𝒖. ✅   \niALDAZ </code>";
    }
    else{
        return "✅  𝐢𝐀𝐥𝐝𝐚𝐳 𝐂𝐡𝐞𝐜𝐤 𝐁𝐨𝐭 ✅   \n========================= \n\n<code>SERIAL => </code><u>".$response->Serial.

            "</u><code>\nMODEL => </code><u>".$response->Modelo.
            "</u><code>\nActivation => </code><u>".$response->Activation.
            "</u><code>\niCloud Lock => </code><u>".$response->FindMyiDevice."</u> 🍎✅ \n<code>   \n=========================== \n\n𝑻𝒉𝒂𝒏𝒌𝒔 𝒀𝒐𝒖. ✅ \niALDAZ </code>";
    }
}
else
        {
            if($response->FindMyiDevice == "ON")
            {
        return "✅  𝐢𝐀𝐥𝐝𝐚𝐳 𝐂𝐡𝐞𝐜𝐤 𝐁𝐨𝐭 ✅   \n========================= \n\n<code>SERIAL => </code><u>".$response->Serial.
            "</u><code>\nMODEL => </code><u>".$response->Modelo.
            "</u><code>\nActivation => </code><u>".$response->Activation.
            "</u><code>\niCloud Lock => </code><u>".$response->FindMyiDevice."</u> ❌\n<code>   \n=========================== \n\n𝑻𝒉𝒂𝒏𝒌𝒔 𝒀𝒐𝒖. ✅   \niALDAZ </code>";
            }
            else{
        return "✅  𝐢𝐀𝐥𝐝𝐚𝐳 𝐂𝐡𝐞𝐜𝐤 𝐁𝐨𝐭 ✅   \n========================= \n\n<code>SERIAL => </code><u>".$response->Serial.
            "</u><code>\nMODEL => </code><u>".$response->Modelo.
            "</u><code>\nActivation => </code><u>".$response->Activation.
            "</u><code>\niCloud Lock => </code><u>".$response->FindMyiDevice."</u> 🍎✅ \n<code>   \n=========================== \n\n𝑻𝒉𝒂𝒏𝒌𝒔 𝒀𝒐𝒖. ✅ \niALDAZ </code>";
            }
        }
}



function checkmac($message)
{
        $serial = str_replace("/check_device ", "", $message);
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://iservices-dev.us/check/",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
    ));
    $curlResponse = curl_exec($curl);
    curl_close($curl);
    return $curlResponse;
}

   function iccid($message1)
    {
        $message1 = str_replace("/iccid ", "", $message1);
        $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://iservices-dev.us/check/iccid.php",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
));
$curlResponse = curl_exec($curl);
curl_close($curl);
$response = json_decode($curlResponse);
if($response->ERROR == 'Invalid IMEI/Serial Number'){
    return "<code>NO ICCID /code>";
}
elseif($response->ERROR == 'Invalid IMEI/Serial Number'){
   return "<code>NO ICCID /code>";
}
elseif(!empty($response->type))
{
    if($response)
    {
        return "✅  iCCID ACTIVE ✅   \n========================= \n\n<code>Active date  => </code><u>".$response->fecha.
        "</u><code>\nBUILD => </code><u>".$response->build.
            "</u><code>\niccid => </code><u>".$response->iccid."</u> 🍎✅ \n<code>   \n=========================== \n\n𝑻𝒉𝒂𝒏𝒌𝒔 𝒀𝒐𝒖. ✅ \niALDAZ </code>";
    }
    else{
        return "✅  iCCID ACTIVE ✅   \n========================= \n\n<code>Active date  => </code><u>".$response->fecha.
        "</u><code>\nBUILD => </code><u>".$response->build.
            "</u><code>\niccid Active => </code><u>".$response->iccid."</u> 🍎✅ \n<code>   \n=========================== \n\n𝑻𝒉𝒂𝒏𝒌𝒔 𝒀𝒐𝒖. ✅ \niALDAZ </code>";
    }
}
else
        {
            if($response)
            {
        return "✅  iCCID ACTIVE ✅   \n========================= \n\n<code>Active date  => </code><u>".$response->fecha.
        "</u><code>\nBUILD => </code><u>".$response->build.
            "</u><code>\niccid Active => </code><u>".$response->iccid."</u> 🍎✅ \n<code>   \n=========================== \n\n𝑻𝒉𝒂𝒏𝒌𝒔 𝒀𝒐𝒖. ✅ \niALDAZ </code>";
            }
            else{
        return "✅  iCCID ACTIVE ✅   \n========================= \n\n<code>Active date  => </code><u>".$response->fecha.
        "</u><code>\nBUILD => </code><u>".$response->build.
            "</u><code>\niccid Active => </code><u>".$response->iccid."</u> 🍎✅ \n<code>   \n=========================== \n\n𝑻𝒉𝒂𝒏𝒌𝒔 𝒀𝒐𝒖. ✅ \niALDAZ </code>";
            }
        }
}

    function sendMessage($text, $chatId)
    {
        $url = $GLOBALS['website'].'/sendMessage';
        $data = array('chat_id' => $chatId, 'text' => $text, 'parse_mode' => 'HTML');
        $options = array('http' => array('method' => 'POST', 'header' => "Content-Type:application/x-www-form-urlencoded\r\n", 'content' => http_build_query($data),),);
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return $result;
    }

    function sendMessage1($text, $chatId)
    {
        $url = $GLOBALS['website'].'/sendMessage';
        $data = array('chat_id' => $chatId, 'text' => $text, 'parse_mode' => 'HTML');
        $options = array('http' => array('method' => 'POST', 'header' => "Content-Type:application/x-www-form-urlencoded\r\n", 'content' => http_build_query($data),),);
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return $result;
    }
?>POST https://p108-fmfmobile.icloud.com/fmipservice/friends/10947559981/00008030-00162521227B402E/first/initClient HTTP/1.1
Host: p108-fmfmobile.icloud.com
User-Agent: Find%20My/259.4.17 CFNetwork/1331.0.7 Darwin/21.4.0
X-Apple-Realm-Support: 1.0
X-MME-CLIENT-INFO: <iPhone12,1> <iPhone OS;15.4.1;19E258> <com.apple.AuthKit/1 (com.apple.findmy/259.4.17)>
Content-Length: 517
X-Apple-AuthScheme: Forever
Connection: keep-alive
X-Apple-I-Client-Time: 2023-03-11T01:02:53Z
X-Apple-Find-API-Ver: 2.0
X-FMF-Model-Version: 1
Authorization: Basic MTA5NDc1NTk5ODE6SUFBQUFBQUFCTHdJQUFBQUFHSlVuVTBSRG1kekxtbGpiRzkxWkM1aGRYUm92UUJQRU9MaENuVzEtYklTUmVMY1U2TERreWhkZ2lISUduSmljN1RGNV8xTjlaOVJEdEVBYk1aV3R0ajlSZjNDeHR4TktDREVEOU12SmhabW5wTGI5bnV1ckw3Ym9tRk1VN2RFWWQ3Y0UtYUxWM21NY3VLM0lZdVN0VmNDNVVEdDVNaS1VZEZQYzcxUE94UTRTWVBWTTMycUJtYlpWUX5+
Accept-Language: en-US,en;q=0.9
X-Apple-I-TimeZone: GMT+3:30
X-Apple-I-MD-RINFO: 84215040
Accept: application/json
Content-Type: application/json
Accept-Encoding: gzip, deflate, br
X-Apple-I-MD-M: 6749cXeWAjbhxZrCNtsNkXuBYOWL/Wu6pHDYhtD1DN+jv6q4Pb+DTo4J0UsXwBoRQLhjbGJ2AdOlgj5m
X-Apple-I-Locale: en_IR@calendar=gregorian
X-Apple-I-MD: AAAABQAAABD9LTiYhS1Vql3yUsc57Y/OAAAAAw==

{"dataContext":{},"clientContext":{"countryCode":"IR","appPushModeAllowed":true,"deviceUDID":"00008030-00162521227B402E","osVersion":"15.4.1","productType":"iPhone12,1","apsToken":"139BF830BD09BEB14398EFACC488565619DB25F023E7EB7228842C823533F923","currentTime":700189373584.68298,"deviceClass":"iPhone","regionCode":"IR","osBuild":"19E258","deviceSKU":"ZA","limitedPrecision":true,"appVersion":"7.0","liveSessionStatistics":{},"legacyFallbackData":{},"userInactivityTimeInMS":5000,"pushMode":true},"serverContext":{}}
