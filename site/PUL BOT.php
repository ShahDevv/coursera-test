<?php
ob_start();
define('API_KEY','1746664255:AAHGM2WVRShSk6VmQ1jp8ids4hzv3NvOx6w');
$admin = "1359653710";
$arays = array($arays,$admin);
$rasmiy_kanal = "@Shahruz_Norimmatov";
$channel = "@python_darslarr";

function addstat($id){
    $check = file_get_contents("oyatillo.db");
    $rd = explode("\n",$check);
    if(!in_array($id,$rd)){
        file_put_contents("oyatillo.db","\n".$id,FILE_APPEND);
    }
}
//Uzfoxning maxsus kodi
//@Uz_Coderlar da tarqatildi
function fromstat($id){
    $check = file_get_contents("$id.stat");
    $rd = explode("\n",$check);
    if(!in_array($id,$rd)){
        file_put_contents("$id.stat","\n".$id,FILE_APPEND);
    }
}

 function joinchat($from){
     global $message_id;
     global $channel;
     $ret = bot('getChatMember',[
         'chat_id'=>$channel,
         'user_id'=>$from
         ]);
         $stat = $ret->result->status;
         if($stat=="creator" or $stat=="administrator" or $stat=="member"){
      return true;
         }else{
     bot('sendmessage',[
         'chat_id'=>$from,
         'text'=>"<b>Botda pul ishlashni boshlash uchun kanalimizga qo'shilishingiz kerak. Kanalga qo'shiling va tekshirish tugmasini bosing.</b>

$channel <b>kanaliga qo'shilmaguningizcha pul ishlay olmaysiz.</b>

<b>Har bitta do'stingiz uchun 200 so'mni qo'lga kiriting.</b>",
         'parse_mode'=>'html',
         'reply_to_message_id'=>$message_id,
'reply_markup'=>json_encode(
['inline_keyboard' => [
 [['text'=>'➕ Аъзо бӯлиш','url'=>'https://t.me/Uz_Coderlar'],],
[['text'=>'✅  Тасдиклаш','callback_data'=>"result"],],
]
]),
]);  
return false;
}
}

function ty($ch){ 
return bot('sendChatAction', [
'chat_id' => $ch,
'action' => 'typing',
]);
}

function reyting(){
$text = "top reyting \n";
$daten =[];
$fayllar = glob('./coin/*.*');
foreach($fayllar as $file){
  $value = file_get_contest($file);
  $id = str_replace(['./coin/','.dat'],['',''],$file);
 $daten[$value] = $id;
}
asort($daten);
foreach($daten as $son=>$id){
$text.=$id.' | '.$son."\n";
}
return $text;
}

function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$data = $update->callback_query->data;
$chat_id = $message->chat->id;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $message->message_id;
$callback = $update->callback_query->id;
$id = $message->reply_to_message->from->id;
$reply_text = $message->reply_to_message->text;
$fadmin = $message->from->id;
$name = $message->from->first_name;
$last_name = $message->from->last_name;
$userlar = file_get_contents("stat/user.list");
$message_id = $callback->from->id;
$text = $message->text;
$bstart  = file_get_contents("contact/$chat_id.number");
$message_id2 = $update->callback_query->message->message_id;
$cqid = $update->callback_query->id;
$message_reply = $message->reply_to_message->message_id;
$fadmin_id = $update->callback_query->from->id;
$contact = $message->contact;
$number = $contact->phone_number;
$bulim = file_get_contents("stat/$chat_id.bstep");
$bdat = file_get_contents("stat/$cid2.bstep");
mkdir("xabar");
mkdir("coin");
$step = file_get_contents("message/$chat_id.step");
mkdir("message");
$bali = file_get_contents("coin/659030842.dat");
$balia = file_get_contents("coin/954264941.dat");
$bali2 = file_get_contents("coin/711210513.dat");
$ball = file_get_contetns("coin/$cid.dat");
mkdir("contact");
mkdir("ref");
$step = file_get_contents("contact/$chat_id.step");
$chpost = $update->channel_post;
$chuser = $chpost->chat->username;
$chpmesid = $chpost->message_id;
$chcaption = $chpost->caption;

$menu = json_encode([
'resize_keyboard'=>true,
    'keyboard'=>[
[['text'=>"💰 Хисоб"],['text'=>"💰 Пул ишлаш"]],
[['text'=>"📊 Статистика"],['text'=>"🏆 Рейтинг"]],[['text'=>"Коидалар 📮"],['text'=>"Қандай пул ишласа бўлади ❓"]]]
]);

$info = json_encode([
'resize_keyboard'=>true,
    'keyboard'=>[
[['text'=>"🤖 Admin"],['text'=>"💰 Kurslarimiz"],],
[['text'=>"🔙 Бош сахифага"],],
]
]);
 
$share = json_encode([
'resize_keyboard'=>true,
    'keyboard'=>[
[['text'=>"Raqamni yuborish","request_contact"=>true],],
]
]);

$ads = json_encode([
'resize_keyboard'=>true,
    'keyboard'=>[
[['text'=>"🗣 Userlarga xabar yuborish"],],
[['text'=>"🤖 Botlarga xabar yuborish"],],
[['text'=>"🔙 Бош сахифага"],],
]
]);

$panel = json_encode([
'resize_keyboard'=>true,
    'keyboard'=>[
[['text'=>"🗣 Userlarga xabar yuborish"],],
[['text'=>"↩️ Ortga qaytish"],],
]
]);

$back = json_encode([
 'one_time_keyboard'=>true,
'resize_keyboard'=>true,
    'keyboard'=>[
[['text'=>"↩️ Ortga qaytish"],],
]
]);

if($text=="/admin" and $chat_id == $admin){
ty($chat_id);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"<b>Salom, Siz bot administratorisiz. Kerakli boʻlimni tanlang:</b>",
'parse_mode'=>"html",
'reply_markup'=>$panel,
]);
}

if($data=="result"){
if(joinchat($chat_id2)=="true"){
bot("answerCallbackQuery",[
"callback_query_id"=>$cqid,
"text"=>"👏 Табриклаймиз! Обунангиз муваффакиятли тасдикланди ✅",
"show_alert"=>false,
]);
bot("sendMessage",[
"chat_id"=>$chat_id2,
"text"=>"<b>☝ Botdan to‘liq foydalanishni davom ettirish uchun raqamingizni kiriting:
📲 Raqamni kiritish qiyinmas shunchaki pastdagi tugmani bosib OK ni bosing va raqamingizni muvaffaqiyatli kiriting</b>
<i>📌 Eslatma</i>
<b>☝ O‘zbekiston hudida faoliyat ko‘rsatishga yaroqsiz bo‘lgan raqamlardan ro‘yxatdan o‘tish imkonsiz ✅</b>",
"parse_mode"=>"html",
"reply_markup"=>$share,
]);
file_put_contents("contact/$chat_id2.step","result_number");
}else{
bot("answerCallbackQuery",[
"callback_query_id"=>$cqid,
"text"=>"😕 Siz hali kanalga aʼzo boʻlmadingiz!",
"show_alert"=>false,
]);
}
}

if($step=="result_number"){
file_put_contents("contact/$chat_id.number",$text);
if(stripos($text,"998")!==false){
if(strlen($text)==12){
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"😊 <b>Tabriklaymiz siz botdan muvaffaqiyatli ro‘yxatdan o‘tdingiz endi botdan foydalanishingiz mumkin !</b>",
"parse_mode"=>"html",
"reply_markup"=>$menu,
]);
}
}
unlink("contact/$chat_id.step");
}
if(stripos($number,"998")!==false){
if(stripos($contact,"+998")!==false){
file_put_contents("contact/$chat_id.numbers",$number);
file_put_contents("contact/$chat_id.contact",$contact);
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"😊 <b>Tabriklaymiz siz botdan muvaffaqiyatli ro‘yxatdan o‘tdingiz endi botdan foydalanishingiz mumkin !</b>",
"parse_mode"=>"html",
"reply_markup"=>$menu,
]);
}
}else{
if(stripos($number,"1")!==false){
if(stripos($contact,"+1")!==false){
bot("sendMessage",[
"chat_id"=>$chat_id,
'parse_mode'=>"html",
"text"=>"<b>😡 Sizning raqamingiz O‘zbekiston Respublikasi hudida faoliyat ko‘rsatmas ekan iltimos botdan faqatgina O‘zbekiston Respublikasi hudida faoliyat olib boruvchi raqamlardan foydalaning ✅</b>",
]);
}
}
}

if($text=="/start" or  $text=="🔙 Бош сахифага"){
if(joinchat($fadmin)=="true"){
addstat($chat_id);
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"<b>Ассалому алейкум!

Бу бот орқали дўстларингизни реферал ҳавола орқали таклиф қилиб пул ишлашингиз мумкин. Ҳар битта таклиф қилинган дўстингиз учун 300 сўм тўланади.

Ишланган пуллар 10.000 сўмга етгач кликк ёки пайнет орқали ҳисобингизга ўтказиб берилади.

Админ билан боғланиш: </b>@Yusufiy",
"parse_mode"=>"html",
"reply_markup"=>$menu,
]);
}
}

if($data=="/start"){
if(joinchat($chat_id2)=="true"){
bot("deleteMessage",[
"chat_id"=>$chat_id2,
"message_id"=>$message_id2,
]);
bot("sendMessage",[
"chat_id"=>$chat_id2,
"text"=>"<b>😊 Bizning kamtarona botimizga xush kelibsiz $name</b>",
"parse_mode"=>"html",
"reply_markup"=>$menu,
]);
}
}

$uid = $message->from->id;
$text = $message->text;
$cid = $message->chat->id;
$data = $update->callback_query->data;
$cid2 = $update->callback_query->message->chat->id;
$qida = $update->callback_query->id;
$uid2 = $update->callback_query->from->id;
$fromid = $message->from->id;
$mid2 = $update->callback_query->message->message_id;
$sum = file_get_contents("coin/$cid2.sum");
$karta = file_get_contents("coin/$cid2.nomers");
$balans = file_get_contents("coin/$cid.dat");
if(file_get_contents("coin/$cid.dat")){
}else{
    file_put_contents("coin/$cid.dat","0");
}
//start ssilka
if(mb_stripos($text,"/start")!==false) {
if(joinchat($fadmin)=="true"){
if($bstart=="true"){
bot("sendmessage",[
"chat_id"=>$cid,
"text"=>"<b>",
"parse_mode"=>"html",
"reply_markup"=>$menu,
]);
}elseif(!$bstart=="true"){
bot("sendMessage",[
"chat_id"=>$cid,
"text"=>"<b> Botdan to‘liq foydalanishni davom ettirish uchun ro‘yxatdan o‘ting</b>
<b>☝ Eslatib o‘tamiz botdan ro‘yxatdan o‘tish faqatgina O‘zbekiston Respublikasi hududidagi raqamlar uchun ishlaydi boshqa davlatga tegishli bo‘lgan raqamlar orqali botdan ro‘yxtdan o‘taolmaysiz ✅</b>",
"parse_mode"=>"html",
"reply_markup"=>$share,
]);
file_put_contents("contact/$cid.step","result_number");
  $public = explode("*",$text);
  $refid = explode(" ",$text);
  $refid = $refid[1];
 if(strlen($refid) >0){
     $idref = "coin/$refid.id";
    $idref2 = file_get_contents($idref);
if($refid==$cid){
            bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"👩‍💼 Haliyam yosh bolasizde $name
---------------
<b>Siz o'zingizga o'zingiz referal bo'la olmasligingizni bilmasmidingiz?
Iltimos halol ishlashni o'rganing! </b>😊",
      "parse_mode"=>"html",
      ]);
        }else{
    if(mb_stripos($idref2,"$cid") !== false ){
        $first_name = $message->from->first_name;
            bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"😏 <a href='tg://user?id=$refid'>Фойдаланувчи</a> <b> аввал ботимизда мавжуд еди!</b>",
      "parse_mode"=>"html"
      ]);
        
    } else {

       $id = "$cid\n";
      $handle = fopen($idref, 'a+');
      fwrite($handle, $id);
      fclose($handle);

       $usr = file_get_contents("coin/$refid.dat");
       $usr = $usr + 300;
       file_put_contents("coin/$refid.dat", "$usr");
       $user = file_get_contents("coin/$cid.dat");
       $user = $user + 50;
       file_put_contents("coin/$cid.dat", "$user");
   
      $first_name = $message->from->first_name;
      $familya = $message->from->last_name;
      $yser = $message->from->username;
fromstat($uid);
      bot('sendMessage',[
      'chat_id'=>$refid,
'text'=>"<b>👏 Табриклаймиз, сиз дӯстингиз </b> <a href='tg:user?id=$cid'>$first_name</a> <b>ни ботимизга таклиф етдингиз\n ва 300 сӯмга ега бӯлдингиз бонус сифатида рефералингизга хам 50 сӯм йозилди!</b>",
"parse_mode"=>"html"
      ]);
bot("sendmessage",[
"chat_id"=>$channel2,
"text"=>"*📝 Botga yangi a‘zo taklif qilindi:*
_📝 A‘zo haqida ma‘lumotlar :_
*◾ Ismi : * [$first_name](tg://user?id=$cid]
*◾ Familyasi :* [$familya](tg://user?id=$cid]
*◾ Yuzeri :* @$yser",
"parse_mode"=>"markdown",
]);
  }
}
}
}
}
}
  //end ssilka
  //tugmalar
  if($text=="/clean"){
      file_put_contents("coin/$uid.dat","0");
  }
  if(in_array($cid,$arays)==$cid and stripos($text,"/coin_") !==false){
      $ex = explode("_",$text);
      $id = $ex[1];
      $summa = $ex[2];
      $bal  =  file_get_contents("coin/$id.dat");
      $sa = $bal + $summa;
      $ism = bot("sendmessage",[
          
          "chat_id"=>$id,
          "text"=>"💰 Ҳисобингиз: $summa сӯмга тӯлдирилди!\Ҳозирги ҳисобингиз: $sa"])->result->chat->first_name;

          if($ism){
      file_put_contents("coin/$id.dat","$sa");
      bot("sendmessage",[
          "chat_id"=>$cid,
          "text"=>"💰 [$ism](tg://user?id=$id) хисоби $summa сӯмга тӯлдирилди!\nҲозирги баланс: $sa",
          "parse_mode"=>"markdown"]);
          }else{
              bot("sendmessage",[
          "chat_id"=>$cid,
          "text"=>"😕 Ботда бундай фойдаланувчи йӯк: $id"]);
          
          }
  }
  if($text=="💰 Пул ишлаш"){
      if(joinchat($fadmin)=="true"){
 bot('sendMessage', [
    'chat_id'=>$cid,
          "text"=>"<b>Телеграмда ўтириб пул ишлашни хоҳлайсизми?
Унда сизга ушбу ботни таклиф қиламан. Жуда осон пул ишласа бўлади!
Ҳар битта дўст учун 300 сўмдан тўлаяпти!

Эслатма эндиликда Фақат шу ботнинг хаволаси орқали пул ишлашингиз мумкун!

Сизнинг реклама учун ҳаволангиз 👇</b>",
          "parse_mode"=>"html",
          "reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"♻ Ҳаволани тарқатиш","switch_inline_query"=>"$cid"],],
]
]),
]);
}
}

  if($data=="vivod"){
      $bal = file_get_contents("coin/$cid2.dat");
      if($bal>=10000){
          bot("deletemessage",[
    "chat_id"=>$cid2,
    "message_id"=>$mid2]); 
 bot('sendmessage', [
    'chat_id'=>$cid2,
          "text"=>"*💳 Хисобингизда : $bal сўм мавжуд!\nПулингизни ечиб олиш турини танланг:!*",
          "parse_mode"=>"markdown",
          "reply_markup"=>json_encode([
              "inline_keyboard"=>[
                  [["text"=>"💳 Click","callback_data"=>"click"],["text"=>"™️ Paynet","callback_data"=>"yes"],],
                  [["text"=>"🔙 Оркагa","callback_data"=>"/start"],],
                  ]
                  ])
                  ]);
      }else{
          $som = 10000 - $bal;
          bot("answerCallbackquery",[
              "callback_query_id"=>$qida,
              "text"=>"🔔 Сизнинг хисобингизда ечиб олиш учун етарли маблағ мавжуд емас !
☝ Сизга яня : $som етмаябди илтимос хисобингизни тулдиринг ✅",
              "show_alert"=>true]);
      }
  }
    if($data=="yes"){
      if(file_get_contents("coin/$cid2.dat")>=5000){
          bot("deletemessage",[
    "chat_id"=>$cid2,
    "message_id"=>$mid2]);
 bot('sendMessage',[
    'chat_id'=>$cid2,
              "text"=>"❗️ Пайнет килиниши керак бӯлган ракамни йозинг\nНамуна: 998912345678",
          "reply_markup"=>json_encode([
              "one_time_keyboard"=>true,
'resize_keyboard'=>true,
    'keyboard'=>[
                  [["text"=>"🔙 Бош сахифа"],],
                  ]
                  ])
                  ]);
                  
                  file_put_contents("coin/$cid2.db","nomer");
          
      }else{
          $som = 10000 - $bal;
          bot("answerCallbackquery",[
              "callback_query_id"=>$qida,
              "text"=>"🔔 Сизнинг хисобингизда ечиб олиш учун етарли маблағ мавжуд емас !
☝ Сизга яня : $som етмаябди илтимос хисобингизни тулдиринг ✅",
              "show_alert"=>true]);
      }
  }
  
  if(file_get_contents("coin/$cid.db")=="nomer"){
      if(strlen($text)== 12 ){
          if(file_get_contents("coin/$cid.dat") >= 5000){
              $hisob = file_get_contents("coin/$cid.dat");
               file_put_contents("coin/$cid.db","summa");
              bot("sendmessage",[
                  "chat_id"=>$cid,
                  "text"=>"💳 Тӯлов микдорини киритинг...\n💰 Сизнинг ҳисобингизда: $hisob сӯм мавжуд"]);
                  file_put_contents("coin/$cid.nomer","$text");
                         }
      }else{
          bot("sendmessage",[
              "chat_id"=>$cid,
              "text"=>"❗️ Пайнет килиниши керак бӯлган ракамни йозинг\nНамуна: 998912345678️ ",
              ]);
      }
  }
  //estep 9
  if(file_get_contents("coin/$cid.db")=="summa" and file_get_contents("coin/$cid.dat")>=5000 and file_get_contents("coin/$cid.db")!="nomer"){
    if($text=="🔙 Бош сахифага"){
        unlink("coin/$cid.db");
    } else{
        if(stripos($text,"+")!==false){}else{
        $hisob = file_get_contents("coin/$cid.dat");
      if($text >= 5000 and $hisob>=$text){
           $puts = $hisob - $text;
       $som = file_get_contents("coin/$cid.dat");
       $nums = file_get_contents("coin/$cid.nomer");
       file_put_contents("coin/$cid.dat","$puts");
       $first_name = $message->from->first_name;
       $first_name = str_replace(["[","]","|"],["","",""],$first_name);
       bot("sendmessage",[
           "chat_id"=>"$cid",
           "text"=>"⏰ Тӯловга берган сӯровингиз кабул килинди !\nТӯлов 24 соат ичида админимиз: @Yusufiy томонидан бажарилади!\nУнгача бемалол яня ишлаб туришингиз мумкин ✅",
"reply_markup"=>$menu,
]);
        $vip = "💳 Foydalanuvchi pul yechib olmoqchi!\nKimdan: [$first_name](tg://user?id=$cid)\nRaqami: $nums\nTo'lov miqdori: $text so'm";
          bot("sendmessage",[
              "chat_id"=>$admin,
              "text"=>"$vip",
              "parse_mode"=>"markdown",
              "reply_markup"=>json_encode([
                  "inline_keyboard"=>[
                      [["callback_data"=>"send|$cid|$first_name","text"=>"💳 Тулов кабул килинди!"]],
[["callback_data"=>"no|$cid|$first_name","text"=>"💳 Тулов бекор килинди!"]],
                        ]
                       ])
                      ]);                   unlink("coin/$cid.db");
    unlink("coin/$cid.nomer");
                      
    }else{
        bot("sendmessage",[
            "chat_id"=>$cid,
            "text"=>"😐 Сизнинг хисобингизда ечиб олиш учун етарли маблаг мавжуд емас"]);
            
    }
    }
    }
  }
   if($data=="click"){
      if(file_get_contents("coin/$cid2.dat")>=10000){
          bot("deletemessage",[
    "chat_id"=>$cid2,
    "message_id"=>$mid2]);
 bot('sendMessage',[
    'chat_id'=>$cid2,
              "text"=>"❗️ CLICK - ракамингизни тӯғри киритинг!\nНамуна: 8600060218955053",
          "reply_markup"=>json_encode([
             "one_time_keyboard"=>true,
'resize_keyboard'=>true,
    'keyboard'=>[
                  [["text"=>"🔙 Бош сахифа"],],
                  ]
                  ])
                  ]);
   file_put_contents("coin/$cid2.db","clicknomer");
          

      }else{
          $som = 10000 - $bal;
          bot("answerCallbackquery",[
              "callback_query_id"=>$qida,
              "text"=>"🔔 Сизнинг хисобингизда ечиб олиш учун етарли маблағ мавжуд емас !
☝ Сизга яня : $som етмаябди илтимос хисобингизни тулдиринг ✅",
              "show_alert"=>true]);
      }
  }
  
  if(file_get_contents("coin/$cid.db")=="clicknomer"){
      if(strlen($text)== 16 ){
          if(file_get_contents("coin/$cid.dat") >= 5000){
              $hisob = file_get_contents("coin/$cid.dat");
       
 file_put_contents("coin/$cid.nomers","$text");       file_put_contents("coin/$cid.db","clicksumma");
              bot("sendmessage",[
                  "chat_id"=>$cid,
                  "text"=>"💳 Тӯлов микдорини киритинг...\n💰 Сизнинг ҳисобингизда: $hisob сӯм мавжуд"]);
                  file_put_contents("coin/$cid.nomer","$text");
                         }
      }else{
          bot("sendmessage",[
              "chat_id"=>$cid,
              "text"=>"❗️ Пайнет килиниши керак бӯлган ракамни йозинг\nНамуна: 998912345678️",
              ]);
      }
  }
  //estep 9
  if(file_get_contents("coin/$cid.db")=="clicksumma" and file_get_contents("coin/$cid.dat")>=10000 and file_get_contents("coin/$cid.db")!="clicknomer"){
    if($text=="🔙 Бош сахифага"){
        unlink("coin/$cid.db");
    }else{
        if(stripos($text,"8600")!==false){}else{
        $hisob = file_get_contents("coin/$cid.dat");
      if($text >= 10000 and $hisob>=$text){
           $puts = $hisob - $text;
file_put_contents("coin/$cid.sum",$text);
       $som = file_get_contents("coin/$cid.db");
       $nums = file_get_contents("coin/$cid.nomer");
       file_put_contents("coin/$cid.dat","$puts");
       $first_name = $message->from->first_name;
       $first_name = str_replace(["[","]","|"],["","",""],$first_name);
       bot("sendmessage",[
           "chat_id"=>"$cid",
           "text"=>"⏰ Тӯловга берган сӯровингиз кабул килинди !\nТӯлов 24 соат ичида админимиз: @Yusufiy томонидан бажарилади!\nУнгача бемалол яня ишлаб туришингиз мумкин ✅",
"reply_markup"=>$menu,
]);
        $vip = "💳 Foydalanuvchi plastik - kartasiga pul yechib olmoqchi!\nKimdan: [$first_name](tg://user?id=$cid)\nKarta - raqami: $nums\nTo'lov miqdori: $text so'm";
          bot("sendmessage",[
              "chat_id"=>$admin,
              "text"=>"$vip",
              "parse_mode"=>"markdown",
              "reply_markup"=>json_encode([
                  "inline_keyboard"=>[
                      [["callback_data"=>"send|$cid|$first_name","text"=>"💳 To'lov Qabul Qilindi!"]],
[["callback_data"=>"no|$cid|$first_name","text"=>"💳 To'lov Bekor Qilindi!"]],
                        ]
                       ])
                      ]);
                       unlink("coin/$cid.db");
    unlink("coin/$cid.nomer");
                      
    }else{
        bot("sendmessage",[
            "chat_id"=>$cid,
            "text"=>"😐 Сизнинг хисобингизда ечиб олиш учун етарли маблаг мавжуд емас"]);
            
    }
    }
    }
 }

   if(stripos($data,"send|") !==false){
        bot("deletemessage",[
    "chat_id"=>$cid2,
    "message_id"=>$message_id2]); 
       $ex=explode("|",$data);
       $id = $ex[1];
       $name = $ex[2];
       bot("sendmessage",[
              "chat_id"=>$id,
              "text"=>"*Ассалому-алайкум, $name!\nСизнинг пулингиз тулаб берилди!\nИлтимос ӯз фикрингизни колдиринг!*",
              "parse_mode"=>"markdown",
               "reply_markup"=>json_encode([   
   'inline_keyboard'=>[
[['text'=>'👨‍💻  Админ', 'url'=> "https://telegram.me/Buyuk_Coder"],['text'=>'👥 Гурухимиз', 'url' => "https://telegram.me/BMG_CHAt"],],
]
]),
]);
   bot("sendmessage",[
              "chat_id"=>$cid2,
              "text"=>"Pul to'landi!\nTo'langan summa: $text\n[$name](tg://user?id=$id)",
              "parse_mode"=>"markdown",
   ]);
$userlar = file_get_contents("$id.stat");
$count = substr_count($userlar,"\n");
$count_member = count(file("$id.stat"))-1;   bot("sendmessage",[             "chat_id"=>$channel,
              "text"=>"Yangi buyurtma mavjud

ID: [$name](tg://user?id=$id)

💳 Botga $count_member odam taklif qilgan",
              "parse_mode"=>"markdown",
                        ]);
bot("sendmessage",[             "chat_id"=>$channel,
              "text"=>"Yangi buyurtma mavjud

ID: [$name](tg://user?id=$id)

💳 UZCARD

💰 $sum soʻm

💳 Karta raqami: $karta",
              "parse_mode"=>"markdown",
                       
   ]);
   }
if(stripos($data,"no|") !==false){
        bot("deletemessage",[
    "chat_id"=>$cid2,
    "message_id"=>$message_id2]); 
       $ex=explode("|",$data);
       $id = $ex[1];
       $name = $ex[2];
       bot("sendmessage",[
              "chat_id"=>$id,
              "text"=>"*Ассалому алайкум $name!\nСизнинг ботдан ечиб олган пулингиз бекор килинди\nСабаби : Коидаларини бузгансиз!*",
              "parse_mode"=>"markdown",
               "reply_markup"=>$menu,
]);
}
   if("$text"=="/rmdir"){
       rmdir("coin");
   }

$myid = $update->inline_query->from->id;
$query = $update->inline_query->query;
if(mb_stripos($query,"$myid")!==false){
bot('answerInlineQuery', [
'inline_query_id'=>$update->inline_query->id,
'cache_time'=>1,
'results'=>json_encode([[
'type'=>'article',
'id'=>base64_encode(1),
'title' => 'Нажмите здесь',
'description'=>"Таклиф хаволангизни юбориш учун шу ерга босинг",
'thumb_url'=>"https://yearling-truck.000webhostapp.com/demo/download.png",
'input_message_content'=>[
'disable_web_page_preview'=>true,
'parse_mode' => 'html',
  'message_text'=>"<b>Салом мобил телефонингизга пул утказишдан чарчадингизми унда хозирок куйидаги ссылка оркали руйхатдан утиб биз берган вазифаларни бажаринг   ва мобил телефонингизни хисобини бепул тулдиринг!</b>"],
'reply_markup'=>[
'inline_keyboard'=>[
[['text'=>'🤖 Ташриф буюриш', 'url'=> "https://telegram.me/Mega_Moneysbot?start=$myid"],],
]]
],
])
]);
}
if($text=="💰 Хисоб"){
$bal = file_get_contents("coin/$cid.dat");
  if(joinchat($fadmin)=="true"){
    bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"💳 <b>Сизнинг балансингиз:</b> $bal
📲 <b>Пул ечиб олиш учун минимал сумма: 10000 сўм</b>",
"parse_mode"=>"html",
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[["text"=>"📲 Пулни ечиш","callback_data"=>"vivod"],],
[["text"=>"$number","callback_data"=>"vivod"],],
]
]),
]);
}
}
 if($text=="Коидалар 📮"){
  if(joinchat($fadmin)=="true"){
    bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"<b>Қоидалар ‼️</b>

<code>1. Бот ҳар битта таклиф қилган дўстингиз учун пул тўлайди!
2. Сохта профиллар ва сохта номерлар орқали таклиф қилинган дўстларингиз аниқланса бот сизни блоклайди ва пулингиз тўланмайди.
3. Пулингиз 48 соат давомида тўлаб берилади.
4. Бот TSCG фирмаси орқали молиялаштирилади
5. Бот орқали пул ишлаш миқдори чекланмаган, асосийси қоидаларни бузмасангиз бўлди.
6. Реферал ҳаволангиз икки хил тартибда булади:
Тулов учун орқали дўстингиз рўйхатдан ўтса 50 сўм, у ҳам пул ишлаш учун каналга аъзо бўлиб, ўз балансини яратса 250 сўм ва умумий ҳисобда 300 сўм берилади.
7. Умумий ҳисобда 300 сўм ишласангиз ва сиз таклиф қилган дўстингиздан биттаси каналда чиқиб кетса сиздан 1000 сўм минус қилинади.
8. Админи хақорат килганлар Ботимиз томонидан Чеклов қоилади</code>",
"parse_mode"=>"html",
"reply_markup"=>$iinfo,
]);
}
}
 if($text=="Қандай пул ишласа бўлади ❓"){
  if(joinchat($fadmin)=="true"){
    bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"<b>Бунинг учун </b>
<code>1. Ботимизнинг Пул ишлаш булимига кириб, кайси турдаги баланс учун пул ишлашингизни танлайсиз ва таркатиш тугмасини босасиз.
2. Таркатилган хаволанинг устига босиб дустингиз кириши ва ботга старт босиши шунингдек каналимизга аъзо булиши керак.
3. Сохта аккаунтлардан пул ишлаб булмайди! Ишланса хам ТУЛАНМАЙДИ!
4. Ишлаган пулингизни ечиб олсангиз ёки тренинг учун сарфласангиз</code>",
"parse_mode"=>"html",
"reply_markup"=>$menu,
]);
}
}
if($text=="🏆 Рейтинг"){
if(joinchat($fadmin)=="true"){
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"*🏆 Топ 5 талик рейтинг *",
"parse_mode"=>"markdown",
"reply_markup"=>$menua,
]);
}
}
if($text=="📊 Статистика"){
if(joinchat($fadmin)=="true"){
$userlar = file_get_contents("oyatillo.db");
$count = substr_count($userlar,"\n");
$count_member = count(file("oyatillo.db"))-1;
$ref = file_get_contents("$id.stat");
$refcount = substr_count($ref,"\n");
$refmember = count(file("$id.stat"))-1;
    bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"<b>📊 Статистика:\n\nБотимиз аъзолар сони:</b> $count_member\n<b>Сиз ботга таклиф қилган аъзолар сони: $refmember</b>",
"parse_mode"=>"html",
"reply_markup"=>$menu,
]);
}
}
