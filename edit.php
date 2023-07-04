<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>공지사항</title>
    <link rel="stylesheet" href="css/css.css">
</head>
<body>
  <?php
    session_start();
    if(!isset($_SESSION['id_num'])) { //관리자만 접속가능하도록 설정
      ?>
        <script> alert('관리자만 접근가능합니다.'); location.href="./signin-up.php"; </script>;
        <?php
    } else if($_SESSION['role'] != 2) {
      ?>
        <script> alert('관리자만 접근가능합니다.'); location.href="./index.php"; </script>;
        <?php
    }
    $id_num = $_GET['id_num'];

    // 글정보 select로 불러오기
    $con = mysqli_connect("localhost","root","","todaymenu") or die ("Can't access DB");
    $query = "select * from notice where id_num=".$id_num;
    $result = $con->query($query);

    while($board = $result->fetch_array()) {
      ?>
    <div class="board_wrap">
        <div class="board_title">
            <strong>공지사항</strong>
            <p>공지사항을 빠르고 정확하게 안내해드립니다.</p>
        </div>
        <div class="board_write_wrap">
          <form action="editSetup.php" method="post">
            <div class="board_write">
                <div class="title">
                    <dl>
                        <dt>제목</dt>
                        <dd><input type="text" name="title" placeholder="제목 입력" value="<?php echo $board['title']; ?>"></dd>
                    </dl>
                </div>
                <div class="info">
                    <dl>
                        <dt>글쓴이</dt>
                        <dd><input type="text" name="writer" placeholder="글쓴이 입력" value="<?php echo $board['writer']; ?>"></dd>
                    </dl>
                    <dl>
                        <dt>비밀번호</dt>
                        <dd><input type="password" name="password" placeholder="관리자 비밀번호"></dd>
                    </dl>
                </div>
                <div class="cont">
                    <textarea placeholder="내용 입력" name="description"><?php echo $board['description']; ?></textarea>
                </div>
                <input type="hidden" name="id_num" value="<?php echo $id_num; ?>">
            </div>
            <div class="bt_wrap">
                <button href="view.php" class="on">수정</button>
                <a href="#" onClick="history.go(-1)" >취소
                </a>
            </div>
          </form>
        </div>
    </div>
  <?php } ?>
</body>
</html>
