<?php
session_start();
?>
<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>PHP</title>
  </head>
  <body>
    <?php
      if (isset($_SESSION['id_num'])) {
        session_destroy();
        ?>
            <script> alert('로그아웃이 완료되었습니다.'); location.href="./index.php"; </script>
        <?php
      } else {
        ?>
            <script> alert('로그인 상태가 아닙니다.'); location.href="./signin-up.php"; </script>
        <?php
      }
    ?>
  </body>
</html>
