<?php
session_start();
include('php/form.php');
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

  <main class="p-contact confirmpage">
    <h2 class="p-title">入力内容の確認</h2>
    <div class="l-container">
      <section class="p-contact__wrap">
        <?php if(empty($errtext)){ ?>
          <form action="form-thanks.php" method="post">

            <dl class="p-contact__list">
              <dt class="p-contact__list-title">
                  <span class="p-contact__list-title-main">氏名</span>
              </dt>
              <dd class="p-contact__list-text confirm-page">
                  <?php if(!empty($_POST['onamae'])){echo $_POST['onamae'];} ?>
              </dd>
            </dl>

            <dl class="p-contact__list">
              <dt class="p-contact__list-title">
                  <span class="p-contact__list-title-main">ふりがな</span>
              </dt>
              <dd class="p-contact__list-text confirm-page">
                  <?php if(!empty($_POST['kana'])){echo $_POST['kana'];} ?>
              </dd>
            </dl>

            <dl class="p-contact__list">
              <dt class="p-contact__list-title">
                  <span class="p-contact__list-title-main">生年月日</span>
              </dt>
              <dd class="p-contact__list-text confirm-page">
                <?php if(!empty($_POST['calendar'])){echo $_POST['calendar'];} ?>年
                <?php if(!empty($_POST['month'])){echo $_POST['month'];} ?>月
                <?php if(!empty($_POST['day'])){echo $_POST['day'];} ?>日
              </dd>
            </dl>

            <dl class="p-contact__list">
              <dt class="p-contact__list-title">
                  <span class="p-contact__list-title-main">メールアドレス</span>
              </dt>
              <dd class="p-contact__list-text confirm-page">
                  <?php if(!empty($_POST['mail'])){echo $_POST['mail'];} ?>
              </dd>
            </dl>

            <dl class="p-contact__list">
              <dt class="p-contact__list-title">
                  <span class="p-contact__list-title-main">携帯番号</span>
              </dt>
              <dd class="p-contact__list-text confirm-page">
                  <?php if(!empty($_POST['tel'])){echo $_POST['tel'];} ?>
              </dd>
            </dl>

            <dl class="p-contact__list">
              <dt class="p-contact__list-title">
                  <span class="p-contact__list-title-main">正社員・アルバイトどちらを希望ですか？</span>
              </dt>
              <dd class="p-contact__list-text confirm-page">
                <?php if(!empty($_POST['working'])){echo $_POST['working'];} ?>
              </dd>
            </dl>

            <dl class="p-contact__list">
              <dt class="p-contact__list-title">
                  <span class="p-contact__list-title-main">どのようにパウワウサロンの求人を知りましたか？</span>
              </dt>
              <dd class="p-contact__list-text confirm-page">
                <?php if(!empty($_POST['channel'])){echo $_POST['channel'];} ?>
              </dd>
            </dl>

            <dl class="p-contact__list">
              <dt class="p-contact__list-title">
                  <span class="p-contact__list-title-main">経験のある職種は何ですか？</span>
              </dt>
              <dd class="p-contact__list-text confirm-page">
                <?php if(!empty($_POST['occupation'])){echo $_POST['occupation'];} ?>
              </dd>
            </dl>

            <dl class="p-contact__list">
              <dt class="p-contact__list-title">
                  <span class="p-contact__list-title-main">経験は何年ですか？</span>
              </dt>
              <dd class="p-contact__list-text confirm-page">
                <?php if(!empty($_POST['experience'])){echo $_POST['experience'];} ?>
              </dd>
            </dl>

            <dl class="p-contact__list">
              <dt class="p-contact__list-title">
                <span class="p-contact__list-title-main">その他</span>
              </dt>
              <dd class="p-contact__list-text confirm-page">
                <?php if(!empty($_POST['other'])){echo $_POST['other'];} ?>
              </dd>
            </dl>

            <div class="p-contact__btn">
                <span><input type="button" name="backBtn" id="backBtn" value="修正する"></span>
            </div>
            <div class="p-contact__btn">
                <span><input type="submit" name="submitBtn" id="submitBtn" value="送信する"></span>
            </div>
            <?php posthidden($_POST); ?>
            <input type="hidden" name="token" value="<?php echo h($_SESSION['token']); ?>">
            <input type="hidden" name="mode" value="to_thanks">
          </form>
        <?php } ?>

        <!-- ローカル用 -->
        <!-- <form action="/#recruit-form" method="post" id="backform"> -->
        <!-- 本番用 -->
        <form action="/recruit/bull/#recruit-form" method="post" id="backform">
          <?php posthidden($_POST); ?>
          <input type="hidden" name="token" value="<?php echo h($_SESSION['token']); ?>">
          <input type="hidden" name="mode" value="to_input">
          <?php if(!empty($errtext)){ ?>
            <div class="errtext"><?php echo $errtext; ?></div>
            <div class="p-contact__btn">
              <span><input type="submit" name="submitBtn" id="submitBtn" value="入力画面へ戻る"></span>
            </div>
          <?php } ?>
        </form>

        
      </div>
    </section>
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

  <?php echo $js; ?>

</body>
</html>

