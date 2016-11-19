<?php

define('API_KEY','293548592:AAFeXizQ58EuqbOJNwvfCCUpueG3AIkO2K0');
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
                ['text'=>"code"]
              ],  
        [
                ['text'=>"info"]
              ]
        
            ]
        ])
    ]));  
    
else($textmessage == 'info')
    $s = httpt('getUserProfilePhotos',['user_id'=>$id]);
    if($s->result->photos[0][3]->file_id or $s->result->photos[0][2]->file_id or $s->result->photos[0][1]->file_id){
      $telegram->sendChatAction(array('chat_id'=>$chat_id,'action'=>'upload_photo'));
      $send = $s->result->photos[0][3]->file_id;
      httpt('sendPhoto',[
        'chat_id'=>$chat_id,
        'photo'=>$send,
        'caption'=>"Your ID : $id\n\nYour Username : @$username",
?>
