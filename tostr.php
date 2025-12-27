<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ウェブページをテキストに変換 | beyondS</title>
  <meta name="description" content="指定URLのHTMLを取得し、タグを除去してテキストだけを抜き出します。メール送信オプション付き。">
  <link rel="stylesheet" href="./main.css">
  <link rel="icon" href="./images/yoko_blue_mini.png">
</head>
<body>
  <header class="site-header">
    <div class="container inner">
      <a class="brand" href="./index.html">
        <img src="./images/yoko_blue_mini.png" alt="beyondS ロゴ">
        <span>beyondS ツール</span>
      </a>
      <nav class="site-nav" aria-label="主要メニュー">
        <a href="./index.html#util">便利ツール</a>
        <a href="./index.html#dev">プログラミング</a>
        <a href="./index.html#web">ウェブ制作</a>
      </nav>
    </div>
  </header>

  <main class="page">
    <div class="container">
      <section class="hero">
        <h1>ウェブページをテキストに変換</h1>
        <p><span class="pill">PHP</span></p>
        <p>URLを指定してHTMLタグを除去し、テキストだけを抽出します。携帯へのメール送信も可能。</p>
      </section>

      <section class="section surface">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET" class="tool-panel">
          <div class="stack">
            <label for="pageUri">ページのURL</label>
            <input type="url" id="pageUri" name="pageUri" placeholder="https://example.com" value="<?php if(!empty($_GET['pageUri'])) echo htmlspecialchars($_GET['pageUri']); ?>">
          </div>

          <div class="inline-controls">
            <label><input type="radio" name="mojicode" value="auto" <?php echo (empty($_GET['mojicode']) || $_GET['mojicode']=='auto') ? 'checked' : ''; ?>> 自動判別</label>
            <label><input type="radio" name="mojicode" value="UTF-8" <?php echo (isset($_GET['mojicode']) && $_GET['mojicode']=='UTF-8') ? 'checked' : ''; ?>> UTF-8</label>
            <label><input type="radio" name="mojicode" value="SJIS" <?php echo (isset($_GET['mojicode']) && $_GET['mojicode']=='SJIS') ? 'checked' : ''; ?>> Shift JIS</label>
            <label><input type="radio" name="mojicode" value="EUC-JP" <?php echo (isset($_GET['mojicode']) && $_GET['mojicode']=='EUC-JP') ? 'checked' : ''; ?>> EUC-JP</label>
          </div>

          <div class="stack">
            <label for="mailaddress">メールで送信（任意）</label>
            <input type="email" id="mailaddress" name="mailaddress" placeholder="your@email.com" value="<?php if(!empty($_GET['mailaddress'])) echo htmlspecialchars($_GET['mailaddress']); ?>">
            <p class="note">メール送信時は info@beyonds.co.jp から送信します。</p>
          </div>

          <div class="inline-controls">
            <button type="submit" class="btn btn-primary" name="mode" value="get">取得して変換</button>
            <button type="button" class="btn btn-ghost" onclick="resetFields()">リセット</button>
          </div>
        </form>

        <?php
        function sendMail($uri, $str, $mailaddress) {
          mb_language("japanese");
          mb_internal_encoding("UTF-8");
          $subject = "";
          $body = $uri . \" のテキストです。\\n\" . $str;
          $from = \"info@beyonds.co.jp\";
          return mb_send_mail($mailaddress, $subject, $body, \"From:\".$from);
        }

        if (isset($_GET['mode']) && $_GET['mode'] === 'get') {
          $pageUri = $_GET['pageUri'] ?? '';
          $mojicode = $_GET['mojicode'] ?? 'auto';
          $mailaddress = $_GET['mailaddress'] ?? '';
          if (!$pageUri) {
            echo '<p style=\"color:#C00000;\">URLを入力してください。</p>';
          } else {
            $result = @file_get_contents($pageUri);
            if ($result === false) {
              echo '<p style=\"color:#C00000;\">データを取得できませんでした。URLをご確認ください。</p>';
            } else {
              $str = mb_convert_encoding($result, 'UTF-8', $mojicode);
              $str = strip_tags($str);
              $str = str_replace([\"\\r\\n\", \"\\n\", \"\\r\"], \" \", $str);
              echo '<div class=\"stack\" style=\"margin-top:16px;\"><label>抽出結果</label>';
              echo '<textarea rows=\"8\">' . htmlspecialchars($str) . '</textarea></div>';
              if ($mailaddress) {
                $ok = sendMail($pageUri, $str, $mailaddress);
                echo $ok ? '<p>メール送信しました。</p>' : '<p style=\"color:#C00000;\">メール送信に失敗しました。</p>';
              }
            }
          }
        }
        ?>
      </section>
    </div>
  </main>

  <footer class="site-footer" id="site-footer"></footer>
  <script>
    function resetFields() {
      document.getElementById('pageUri').value = '';
      document.getElementById('mailaddress').value = '';
    }
  </script>
  <script src="./js/footer.js"></script>
</body>
</html>
