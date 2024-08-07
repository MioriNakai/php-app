<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>新規作成</title>
</head>
<body>
  <form action="store.php" method="post">
    <!-- ブラウザからNEWPHPリクエストしレスポンスを返す関係。storeに -->
    <input type="text" name="content"><!-- name属性に当てられているkeyであるcontentに対して連想配列が作られている -->
    <input type="submit" value="作成">
  </form>
  <!-- 入力フォームをつくっている。入力フォームが作られているのはformタグの中です -->
  <div>
    <a href="index.html">一覧へもどる</a>
  </div>
</body>
</html>