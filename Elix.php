<?php
define('API_KEY','298990906:AAH0gu5vLEU3uPS2uAS9irOvnkUIt6rC3_Y');
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
$bolds =
file_get_contents('bold.txt');
  $bold= explode("\n",$bolds);


//—
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
{ $rk = "اقاي $name \n\nبا ايدي : @$username \n\nشما يک کاربر عادي هستيد"; }}
}  
else if ($textmessage =="ارسال پيام به همه"  && $chat_id == $Dev | $booleans[0]=="false") {
{
sendmessage($chat_id,"لطفا پيام خودرا ارسال کنيد");
}
$boolean = file_get_contents('booleans.txt');
$booleans= explode("\n",$boolean);
$addd = file_get_contents('banlist.txt');
$addd = "true";
file_put_contents('booleans.txt',$addd);

}
else if($chat_id == $Dev && $booleans[0] == "true") {
$texttoall = $textmessage;
$ttxtt = file_get_contents('member.txt');
$membersidd= explode("\n",$ttxtt);
for($y=0;$y<count($membersidd);$y++){
sendmessage($membersidd[$y],"$texttoall");

}
$memcout = count($membersidd)-1;
{
Sendmessage($chat_id,"پيغام شما به $memcout مخاطب ارسال شد.");
}
$addd = "false";
file_put_contents('booleans.txt',$addd);
}
}
else if($textmessage == 'ليست اعضا' && $chat_id == $Dev)
{
$txtt = file_get_contents('member.txt');
$membersidd= explode("\n",$txtt);
$mmemcount = count($membersidd) -1;
{
sendmessage($chat_id,"ليست اعضاي ربات : $mmemcount");
}
}
else if ($textmessage == "bold" && $bold[0] == 'false'){
file_put_contents('bold.txt',"true");
var_dump(httpt('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>'لطفا متن خودرا بفرستيد',
else if ($bold[0] == 'true'){
var_dump(httpt('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>'<b>' .$textmessage. '</b>',
'parse_mode'=>'HTML'
]));
}
?>
