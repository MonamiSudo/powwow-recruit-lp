<?php

function setToken(){
	$token = sha1(uniqid(mt_rand(), true));
	$_SESSION['token'] = $token;
}

function checkToken(){
	if(empty($_SESSION['token']) || ($_SESSION['token']!=$_POST['token'])){
		echo 'Invalid Access!';
		if(empty($_SESSION['token'])){echo ' Empty';}
		if($_SESSION['token']!=$_POST['token']){echo ' Different';}
		exit;
	}
}

function h($s){
	return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

if($_SERVER['REQUEST_METHOD']!='POST'){
	setToken();
}else{
	checkToken();
}

mb_language('Japanese');
mb_internal_encoding('utf8');
date_default_timezone_set('Asia/Tokyo');

foreach($_POST as $k=>$v){
	$v = mb_convert_kana($v, 'KV', 'utf8');
	$v = stripslashes($v);
	$_POST[$k] = htmlspecialchars(strip_tags($v));
}


// // セレクトボックス用配列

$workings = array('正社員', 'アルバイト');

$channels = array('検索', 'インスタ', 'メールマガジン', '紹介', '店内pop', 'その他');

$occupations = array('未経験', '整体', 'リラクゼーション', 'もみほぐし', 'アロマオイル', 'ストレッチ', 'リフレクソロジー', 'マッサージ', '国家資格（鍼灸・指圧・あんま・柔整）', 'その他');

$experiences = array('スクール既卒・在学中', '1年から3年', '3年以上', '未経験（スクール在学なし）');

$calendars = array('年');
for ($i = 1944; $i <= 2024; $i++) {
  $calendars[] = (string)$i;
}

$months = array('月');
for ($i = 1; $i <= 12; $i++) {
  $months[] = (string)$i;
}

$days = array('日');
for ($i = 1; $i <= 31; $i++) {
  $days[] = (string)$i;
}


// /* 設定 ----------------------*/
$ua = $_SERVER['HTTP_USER_AGENT'];
if (
		(strpos($ua, 'Android') !== false && strpos($ua, 'Mobile') !== false) ||
		(strpos($ua, 'iPhone') !== false) ||
		(strpos($ua, 'iPod') !== false) ||
		(strpos($ua, 'Windows Phone') !== false)
	) {
		$device = 'SP';
	}else{
		$device = 'PC';
	}
$site = '';

// if(isset($_GET['referral'])) {
// 	$thanks = home_url().'/assessment-thanks/?referral=' . $_GET['referral'];
// } else {
// 	$thanks = home_url().'/assessment-thanks/';
// }

// コメント
// $thanks = '../form-thanks.php/';

// //送信先
// if(!empty($_POST['mail']) && isset($_GET['a']) && $_GET['a']=='test'){
// 	$sendto = $_POST['mail'];
// }else{
// 	$sendto = 'monami.sudo@smile-create.co.jp';
// }
// //送信元
// $from = mb_encode_mimeheader('パウワウ ').'<monami.sudo@smile-create.co.jp>';
// $param = '-f monami.sudo@smile-create.co.jp';
// //件名
// $subject_guest = '【パウワウ採用サイト】エントリーありがとうございます';
// $subject_admin = $subject_guest.' （'.$device.'）';
// //本文前半
// $doc  = "※本メールは自動返信です。\n";
// $doc .= "エントリーありがとうございます。\n";
// $doc .= "以下の内容で受付が完了しました。\n";
// $doc .= "------------------\n";
// //本文後半
// $signature  = "------------------\n\n";
// $signature .= "内容を確認後、折り返しご連絡いたします。\n";
// $signature .= "今しばらく、お待ちくださいませ。\n";
// $signature .= "----------------------------------\n";
// $signature .= "パウワウ\n";
// $signature .= "〒123-2312\n";
// $signature .= "東京都千代田区\n";
// $signature .= "Tel : 03-1111-1111\n";
// $signature .= "----------------------------------\n";

// コメント終わり

if(isset($_POST['mode']) && $_POST['mode']=='to_confirm'){
	$errtext = validate($_POST);
}
if(isset($_POST['mode']) && $_POST['mode']=='to_thanks'){
	// echo "check text";
  // $errtext = validate($_POST);

	// if(empty($errtext)){

    // コメント
		// foreach($_POST as $k=>$v){
		// 	$_POST[$k] = htmlspecialchars_decode($v);
		// }

		// //本文に内容追加
		// $doc .= '氏名：'.$_POST['onamae']."\n";
		// $doc .= 'ふりがな：'.$_POST['kana']."\n";
		// $doc .= '生年月日：'.$_POST['calendar'].'年'.$_POST['month'].'月'.$_POST['day'].'日'."\n";
		// $doc .= 'メールアドレス：'.$_POST['mail']."\n";
		// $doc .= '電話番号：'.$_POST['tel']."\n";
		// $doc .= '正社員・アルバイトどちらを希望ですか？：'.$_POST['working']."\n";
		// $doc .= 'どのようにパウワウホームの求人を知りましたか？：'.$_POST['channel']."\n";
		// $doc .= '経験のある職種は何ですか？：'.$_POST['occupation']."\n";
		// $doc .= '経験は何年ですか？：'.$_POST['experience']."\n";
		// $doc .= 'その他：'."\n".nl1000($_POST['other'])."\n";
		// $doc .= $signature;
		// //エンコード（環境依存文字対応）
		// $doc = mb_convert_encoding($doc, 'ISO-2022-JP-ms', 'UTF-8');
		// //管理者宛送信
		// // $adminMailSend = mb_send_mail($sendto,$subject_admin,$doc,'From:'.$from, $param);
		// mb_send_mail($sendto,$subject_admin,$doc,'From:'.$from, $param);
		// //入力者宛送信
		// // $guestMailSend = mb_send_mail($_POST['mail'],$subject_guest,$doc,'From:'.$from, $param);
		// mb_send_mail($_POST['mail'],$subject_guest,$doc,'From:'.$from, $param);

		// header('Location: '.$thanks);
    // コメント終わり
	}
// }

function validate($data){
	$errtext = '';
	if(!isset($data['onamae']) || $data['onamae']==''){
		$errtext .= '・氏名を入力してください<br>';
	} else {
		if (preg_match("/https?:\/\//", $data['onamae'])) {
			$errtext .= '・氏名にURLを含めることは出来ません<br>';
		}
	}

	if(!isset($data['mail']) || $data['mail']==''){
		$errtext .= '・メールアドレスを入力してください<br>';
	}

	if(!isset($data['tel']) || $data['tel']==''){
		$errtext .= '・電話番号を入力してください<br>';
	}

	/*if(!isset($data['message']) || $data['message']==''){
		$errtext .= '・お問い合わせ内容を入力してください<br>';
	}elseif (preg_match("/https?:\/\//", $data['message'])) {
		$errtext .= '・お問い合わせ内容にURLを含めることは出来ません<br>';
	}*/
	return $errtext;
}

/* javascript --------------------------------------------*/
$js = '
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
// =============================================
// blurの処理
// =============================================
$(function(){
	$(".validate").blur(function(){
		if($(this).attr("id")=="name"){
			name_check();
		}else if($(this).attr("id")=="tel"){
			tel_check();
		}else if($(this).attr("id")=="mail"){
			mail_check();
		}else if($(this).attr("type")=="radio"){
			radio_check($(this).attr("name"));
		}else if($(this).attr("id")=="naiyo"){
			naiyo_check();
		}else{
			if($(this).val()==""){
				$(this).parent("dd").children(".error").addClass("show");
			}else{
				$(this).parent("dd").children(".error").removeClass("show");
			}
		}
	});
  // =============================================
  // エラーのポップアップクリック時の処理
  // =============================================
	$(".error").on("click", function(){
		$(this).removeClass("show");
	});
  // =============================================
  // 確認ボタンのクリック時の処理
  // =============================================
	$("#confirmBtn").on("click", function(){
		$(".validate").each(function(){
			if($(this).attr("id")=="name"){
				name_check();
      }else if($(this).attr("id")=="kana"){
				kana_check();
			}else if($(this).attr("id")=="tel"){
				tel_check();
			}else if($(this).attr("id")=="mail"){
				mail_check();
			}else if( $("[name=calendar]").val()=="年" ){
				calendar_check();
			}else if( $("[name=month]").val()=="月" ){
				month_check();
			}else if( $("[name=day]").val()=="日" ){
				day_check();
			}else if($(this).attr("type")=="radio"){
				radio_check($(this).attr("name"));
			}else if($(this).attr("id")=="naiyo"){
				naiyo_check();
			}else{
				if($(this).val()==""){
					$(this).parent("dd").children(".error").addClass("show");
				}
			}
		});
		position = $(".error.show").first().offset().top;
		if(position!=""){
			$("body,html").animate({scrollTop:position - 200}, 500, "swing");
			return false;
		}else{
			return true;
		}
	});
  // =============================================
  // 確認ページで戻るボタンが押された時の処理
  // =============================================
	$("#backBtn").on("click", function(){
		$("#backform").submit();
		return false;
	});

  // =============================================
  // フォーム各項目のバリデーションチェックの関数
  // =============================================
  function name_check(){
		if($("#name").val() == ""){
			$("#name").parent("dd").children(".error").text("* 氏名をご入力ください").addClass("show");
		}else{
			if($("#name").val().match("http://|https://")){
				$("#name").parent("dd").children(".error").text("* 氏名にURLを含めることは出来ません").addClass("show");
			}else{
				$("#name").parent("dd").children(".error").removeClass("show");
			}
		}
	}
  function kana_check(){
		if($("#kana").val() == ""){
			$("#kana").parent("dd").children(".error").text("* ふりがなをご入力ください").addClass("show");
		}else{
			if($("#kana").val().match("http://|https://")){
				$("#kana").parent("dd").children(".error").text("* ふりがなにURLを含めることは出来ません").addClass("show");
			}else{
				$("#kana").parent("dd").children(".error").removeClass("show");
			}
		}
	}
  function calendar_check(){
    if($("[name=calendar]").val() == "年")
			$("#calendar").parent("dd").children(".error").text("* 生年月日をご入力ください").addClass("show");
  }
  function month_check(){
    if($("[name=calendar]").val() == "月")
			$("#month").parent("dd").children(".error").text("* 生年月日をご入力ください").addClass("show");
  }
  function day_check(){
    if($("[name=calendar]").val() == "日")
			$("#day").parent("dd").children(".error").text("* 生年月日をご入力ください").addClass("show");
  }
	function mail_check(){
		var flg = false;
		var han_mail = $("#mail").val().replace(/[Ａ-Ｚａ-ｚ０-９．＿＠]/g, function(s){return String.fromCharCode(s.charCodeAt(0) - 65248);});
		$("#mail").val(han_mail);
		var han_tel = $("#tel").val().replace(/[━.*‐.*―.*－.*\-.*ー.*\-]/gi,"");
		han_tel = han_tel.replace(/[０-９]/g, function(s){return String.fromCharCode(s.charCodeAt(0) - 65248);});
		$("#tel").val(han_tel);
		if($("#mail").val()==""){
			$("#mail").parent("dd").children(".error").text("* メールアドレスをご入力ください").addClass("show");
			flg = true;
		}else if($("#mail").val()!="" && !$("#mail").val().match(/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i)){
			$("#mail").parent("dd").children(".error").text("* メールアドレスの形式が正しくありません").addClass("show");
			flg = true;
		}else{
			$("#mail").parent("dd").children(".error").removeClass("show");
		}
	}
	function tel_check(){
		var flg = false;
		var han_tel = $("#tel").val().replace(/[━.*‐.*―.*－.*\-.*ー.*\-]/gi,"");
		han_tel = han_tel.replace(/[０-９]/g, function(s){return String.fromCharCode(s.charCodeAt(0) - 65248);});
		$("#tel").val(han_tel);
		if($("#tel").val()==""){
			$("#tel").parent("dd").children(".error").text("* 電話番号をご入力ください").addClass("show");
			flg = true;
		}else if($("#tel").val()!="" && !$("#tel").val().match(/^(0[5-9]0[0-9]{8}|0[1-9][1-9][0-9]{7})$/)){
			$("#tel").parent("dd").children(".error").text("* 電話番号の形式が正しくありません").addClass("show");
			flg = true;
		}else{
			$("#tel").parent("dd").children(".error").removeClass("show");
		}
	}
	function radio_check(elem_name){
		if($("[name="+elem_name+"]:checked").length===0){
			$("[name="+elem_name+"]").parent("span").parent("dd").children(".error").addClass("show");
		}
	}
	function naiyo_check(){
		/*if($("#naiyo").val() == ""){
			$("#naiyo").parent("dd").children(".error").text("* お問い合わせ内容をご入力ください").addClass("show");
		}else */if($("#naiyo").val().length > 500){
			$("#naiyo").parent("dd").children(".error").text("* お問い合わせ内容は500文字以内で入力して下さい").addClass("show");
		}else if($("#naiyo").val().match("http://|https://")){
			$("#naiyo").parent("dd").children(".error").text("* お問い合わせ内容にURLを含めることは出来ません").addClass("show");
		}else{
			$("#naiyo").parent("dd").children(".error").removeClass("show");
		}
	}
});
</script>

';



// 配列から input type="hidden" を作成
function posthidden($var){
	foreach($var as $key1 => $val1){
		if(is_array($val1)){
			foreach($val1 as $key2 => $val2){
				echo "<input type=\"hidden\" name=\"{$key1}[{$key2}]\" value=\"{$val2}\">";
			}
		}else{
			if($key1 != 'mode' && $key1 != 'submit'){
				echo "<input type=\"hidden\" name=\"{$key1}\" value=\"{$val1}\">";
			}
		}
	}
}

/* 改行チェック -----------------------------------------*/
function nl1000($text){
	$text = str_replace(array('\r\n','\r','\n'), '\r\n', $text);
	$array = explode("\r\n", $text);
	foreach($array as $key => $str){
		if(mb_strlen($str, "utf8") > 460){
			while(mb_strlen($str, "utf8") - mb_strrpos($str,"\r\n") > 460){
				$str = mb_substr($str, 0, (mb_strrpos($str,"\r\n") + 460))."\r\n".mb_substr($str, (mb_strrpos($str,"\r\n") + 460));
			}
		}
		$array[$key] = $str;
	}
	$text = implode("\r\n", $array);
	return $text;
}

?>