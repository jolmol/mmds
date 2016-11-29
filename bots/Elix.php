<?php
define('API_KEY','293548592:AAHACGV1VT4FkWssZ9cOcfUFUPgiO07dmXw');
//----######------
function makereq($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($datas));
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
//##############=--API_REQ
function apiRequest($method, $parameters) {
  if (!is_string($method)) {
    error_log("Method name must be a string\n");
    return false;
  }
  if (!$parameters) {
    $parameters = array();
  } else if (!is_array($parameters)) {
    error_log("Parameters must be an array\n");
    return false;
  }
  foreach ($parameters as $key => &$val) {
    // encoding to JSON array parameters, for example reply_markup
    if (!is_numeric($val) && !is_string($val)) {
      $val = json_encode($val);
    }
  }
  $url = "https://api.telegram.org/bot".API_KEY."/".$method.'?'.http_build_query($parameters);
  $handle = curl_init($url);
  curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt($handle, CURLOPT_TIMEOUT, 60);
  return exec_curl_request($handle);
}
$update = json_decode(file_get_contents('php://input'));
var_dump($update);
$message_id = $update->message->message_id;
$from_id = $update->message->from->id;
$name = $update->message->from->first_name;
$username = $update->message->from->username;
$textmessage = isset($update->message->text)?$update->message->text:'';
$id = $update->message->from->id;
$chat_id = $update->message->chat->id;
$Dev = 193930120;
//----
$boolean = file_get_contents('booleans.txt');
  $booleans= explode("\n",$boolean);
//--
if($textmessage == '/start')
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"Hi $name \n\nWelcome To ElixBot ",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
              [
                ['text'=>"bold"],['text'=>"italic"]
              ],
        [
                ['text'=>"Time"]
              ],  
        [
                ['text'=>"rank"]
              ]
        
            ]
        ])
    ]));  
else if ($textmessage == "rank") {{$rk == "";
if ($id == $Dev)
{
$rk = "Develope";
}
else
{ $rk = "ÇÞÇí $name \n\nÈÇ ÇíÏí : @$username \n\nÔãÇ í˜ ˜ÇÑÈÑ ÚÇÏí åÓÊíÏ"; }}
  else if($textmessage == 'áíÓÊ ÇÚÖÇ' && $chat_id == $Dev)
{
$txtt = file_get_contents('member.txt');
$membersidd= explode("\n",$txtt);
$mmemcount = count($membersidd) -1;
{
sendmessage($chat_id,"áíÓÊ ÇÚÖÇí ÑÈÇÊ : $mmemcount");
}
}
else if ($textmessage == "bold"){
var_dump(httpt('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>'áØÝÇ ãÊä ÎæÏÑÇ ÈÝÑÓÊíÏ',
$text = str_replace($update->message->text);
var_dump(httpt('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>'<b>' . ($text) . '</b>',
'parse_mode'=>'HTML'
]));
?>