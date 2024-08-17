<?php 

  // UA
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

  mb_language("Japanese");
  mb_internal_encoding("UTF-8");

  $to = $_POST['mail'];

  $brand_name = mb_encode_mimeheader('ウィメンズヘルスケア パウワウ');
  
  $headers = "MIME-Version: 1.0\n";
  $headers .= "From: " . $brand_name . "<noreply@smile-create.co.jp>\n" ;
  $headers .= "Reply-To:" . $brand_name . "<noreply@smile-create.co.jp>\n";
  
  // =====================================================================
  // 以下、ユーザーに送信
  // =====================================================================
  $title = '【パウワウ採用サイト】エントリーありがとうございます';
  
  $message = 'パウワウ採用サイトからエントリーいただき、誠にありがとうございます' . "\n\n";
  $message .= '下記の内容でご応募を受け付けました。' . "\n\n";
  $message .= '------------------------------' . "\n";
  $message .= '氏名：' . $_POST['onamae'] . "\n";
  $message .= 'ふりがな：' . $_POST['kana'] . "\n";
  $message .= '生年月日：' . $_POST['calendar'] . '年' . $_POST['month'] . '月' . $_POST['day'] . '日' .  "\n";
  $message .= 'メールアドレス：' . $_POST['mail'] . "\n";
  $message .= '電話番号：' . $_POST['tel'] . "\n";
  $message .= '正社員・アルバイトどちらを希望ですか？：'.$_POST['working']."\n";
	$message .= 'どのようにパウワウホームの求人を知りましたか？：'.$_POST['channel']."\n";
	$message .= '経験のある職種は何ですか？：'.$_POST['occupation']."\n";
	$message .= '経験は何年ですか？：'.$_POST['experience']."\n";
	$message .= 'その他：' . "\n" . $_POST['other']."\n";
  $message .= '------------------------------' . "\n\n";
  $message .= 'ご返信に1〜2営業日いただく場合がございます。' . "\n\n";
  $message .= '==============================' . "\n";
  $message .= 'ウィメンズヘルスケア パウワウ 採用サイト' . "\n";
  $message .= 'HP： https://powwow-ginza.com/recruit/' . "\n";
  $message .= '==============================' . "\n";
  
  mb_send_mail($to, $title, $message, $headers);
  
  
  // =====================================================================
  // 以下、運営側に送信
  // =====================================================================
  // 本番用
  $admin_to = "contact@powwow-ginza.com";
  // ローカルテスト用
  // $admin_to = "monami.sudo@smile-create.co.jp";
  
  $admin_title = ' （' . $device . '）' . 'パウワウ採用サイトよりエントリーが届きました' . "\n";
  
  $admin_message = '------------------------------' . "\n";
  $admin_message .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n\n";
  $admin_message .= '氏名：' . $_POST['onamae'] . "\n";
  $admin_message .= 'ふりがな：' . $_POST['kana'] . "\n";
  $admin_message .= '生年月日：' . $_POST['calendar'] . '年' . $_POST['month'] . '月' . $_POST['day'] . '日' .  "\n";
  $admin_message .= 'メールアドレス：' . $_POST['mail'] . "\n";
  $admin_message .= '電話番号：' . $_POST['tel'] . "\n";
  $admin_message .= '正社員・アルバイトどちらを希望ですか？：'.$_POST['working']."\n";
	$admin_message .= 'どのようにパウワウホームの求人を知りましたか？：'.$_POST['channel']."\n";
	$admin_message .= '経験のある職種は何ですか？：'.$_POST['occupation']."\n";
	$admin_message .= '経験は何年ですか？：'.$_POST['experience']."\n";
	$admin_message .= 'その他：' . "\n" . $_POST['other']."\n";
  $admin_message .= '------------------------------' . "\n\n";
  
  mb_send_mail( $admin_to, $admin_title, $admin_message, $headers );
?>

<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns#">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>女性のための整体サロンで一緒に働きませんか？ウィメンズヘルスケアサロン パウワウ</title>
  <meta name="description" content="ウィメンズヘルスケアサロンは、整体師が全員女性、駅近な店舗、百貨店にも多く出店し、女性が働きやすいサロンです。20年以上の歴史があり、充実した研修制度を受けることで、どんな方でも高い技術力を習得できます。気になる方は、LINEから簡単に応募できます。">

  <!-- ogp 共通設定 -->
  <meta property="og:title" content="女性のための整体サロンで一緒に働きませんか？ウィメンズヘルスケアサロン パウワウ">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://powwow-ginza.com/recruit/">
  <meta property="og:image" content="https://powwow-ginza.com/recruit/img/ogp.jpg?ver=20240515">
  <!-- 以下省略可能ですが、site_name, description, localeは載せたほうがいいです。 -->
  <meta property="og:site_name" content="女性のための整体サロンで一緒に働きませんか？ウィメンズヘルスケアサロン パウワウ">
  <meta property="og:description" content="ウィメンズヘルスケアサロンは、整体師が全員女性、駅近な店舗、百貨店にも多く出店し、女性が働きやすいサロンです。20年以上の歴史があり、充実した研修制度を受けることで、どんな方でも高い技術力を習得できます。気になる方は、LINEから簡単に応募できます。">
  <meta property="og:locale" content="ja_JP">
  <!-- <meta property="og:audio" content="音声ファイルのURL（絶対パス）">
  <meta property="og:video" content="動画ファイルのURL（絶対パス）"> -->
  <!-- / ogp 共通設定 -->

  <!-- ogp Twitterの設定 -->
  <meta name="twitter:card" content="summary_large_image">

  <!-- CSS -->
  <link rel="stylesheet" href="./style.css?ver=20240401">

  <!-- no index -->
  <meta name="robots" content="noindex">
  
  <!-- <link rel="shortcut icon" href="/img/share/favicon.ico"> -->
  <link rel="shortcut icon" href="./img/full-white.png">

  <!-- Meta Pixel Code -->
  <script>
    !function (f, b, e, v, n, t, s) {
      if (f.fbq) return; n = f.fbq = function () {
        n.callMethod ?
        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n; n.push = n; n.loaded = !0; n.version = '2.0';
      n.queue = []; t = b.createElement(e); t.async = !0;
      t.src = v; s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
      'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1946029592242777');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=1946029592242777&ev=PageView&noscript=1" /></noscript>
  <!-- End Meta Pixel Code -->
  
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-22521619-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'UA-22521619-1');
    gtag('config', 'G-22VE61VPCD');
  </script>
  
  <!-- Begin Mieruca Embed Code -->
  <script type="text/javascript" id="mierucajs">
    window.__fid = window.__fid || []; __fid.push([964865195]);
    (function () {
      function mieruca() { if (typeof window.__fjsld != "undefined") return; window.__fjsld = 1; var fjs = document.createElement('script'); fjs.type = 'text/javascript'; fjs.async = true; fjs.id = "fjssync"; var timestamp = new Date; fjs.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://hm.mieru-ca.com/service/js/mieruca-hm.js?v=' + timestamp.getTime(); var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(fjs, x); };
      setTimeout(mieruca, 500); document.readyState != "complete" ? (window.attachEvent ? window.attachEvent("onload", mieruca) : window.addEventListener("load", mieruca, false)) : mieruca();
    })();
  </script>
  <!-- End Mieruca Embed Code -->
</head>

<body>
  <header class="l-header p-header">
    <div class="p-header__inner">
      <h1 class="p-header__logo">
        <a class="p-header__logo-link" href="/recruit/bull/"><img src="img/logo-powwow.png" alt="POWWOW"></a>
      </h1>
    </div>
  </header>

  <main class="p-contact thankspage">
    <h2 class="p-title">お問い合わせ完了</h2>
    <div class="l-container">
      <p class="p-contact-thanks-text">エントリーありがとうございます。<br>内容を確認の上、担当者より折り返しご連絡させていただきます。</p>
      <p><a href="https://powwow-ginza.com/recruit/">パウワウ採用サイト トップページへ戻る</a></p>
    </div>
  </main>

  <footer class="p-footer">
    <div class="p-footer__inner l-container">
      <img src="img/footer-logo.png" alt="Powwow" class="p-footer__logo">
      <ul class="p-footer__list">
        <li class="p-footer__link">
          <a href="https://powwow-ginza.com/" target="_blank">パウワウ公式ページ</a>
        </li>
        <li class="p-footer__link"><a href="https://smile-create.co.jp/" target="_blank">運営会社</a></li>
      </ul>
    </div>
    <p class="p-footer__copy"><small>&copy; 2023 SMILE CREATE GROUP.</small></p>
  </footer>
    
</body>
</html>
