<?php
$content= file_get_contents("php://input");
$update = json_decode($content);
define("API_KEY","293548592:AAFYpmpCEQey-zk41tpV4vQfMEZwZasZKlo");
function sendMessage($datas){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POST, 1);
    $datas["api_key"]=API_KEY;
    curl_setopt($ch, CURLOPT_POSTFIELDS,
        http_build_query($datas));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec ($ch);
    curl_close ($ch);
    return json_decode($server_output);
}
$update = json_decode(file_get_contents('php://input'));
var_dump($update);
$message_id = $update->message->message_id;
$from_id = $update->message->from->id;
$name = $update->message->from->first_name;
$username = $update->message->from->username;
$textmessage = isset($update->message->text)?$update->message->text:'';
$id = $update->message->from->id;
//----
if($textmessage == '/start')
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"Hi `$name` \n\nWelcome To ElixBot ",
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
              ,"resize_keyboard"=>true
        
            ]
        ])
    ]));	
    
if($textmessage == 'info')
    $s = httpt('getUserProfilePhotos',['user_id'=>$id]);
    if($s->result->photos[0][3]->file_id or $s->result->photos[0][2]->file_id or $s->result->photos[0][1]->file_id){
      $telegram->sendChatAction(array('chat_id'=>$chat_id,'action'=>'upload_photo'));
      $send = $s->result->photos[0][3]->file_id;
      httpt('sendPhoto',[
        'chat_id'=>$chat_id,
        'photo'=>$send,
        'caption'=>"Your ID : $id\n\nYour Username : @$username",
?>
