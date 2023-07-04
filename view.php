<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>오늘의 식단은? </title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="css/css.css">
    <link href="css/board.css" rel="stylesheet" />
    <title>공지사항</title>
</head>
<body>
  <?php
    session_start();
    if(!isset($_SESSION['id_num'])) { // 회원만 열람 가능하게 설정
      ?>
        <script> alert('회원만 접근가능합니다.'); location.href="./signin-up.php"; </script>;
        <?php
    }
    $id_num = $_GET['id_num'];

    // 조회수 증가
    $con = mysqli_connect("localhost","root","","todaymenu") or die ("Can't access DB");
    $query = "update notice set views=views+1 where id_num=".$id_num;
    $result = $con->query($query);

    // 글정보 select로 불러오기
    $query = "select * from notice where id_num=".$id_num;
    $result = $con->query($query);

    while($board = $result->fetch_array()) {
    ?>
      <!-- Navigation-->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container px-4 px-lg-5">
              <a class="navbar-brand" href="./index.php">오늘의 메뉴는?</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                      <li class="nav-item"><a class="nav-link active" aria-current="page" href="./index.php">메인페이지</a></li>
                      <li class="nav-item"><a class="nav-link" href="./list.php">공지사항</a></li>
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">마이페이지</a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="./userinfo.php">개인정보관리</a></li>  <!-- 개발예정 -->
                              <li><a class="dropdown-item" href="./like.php">찜한 반찬</a></li>
                          </ul>
                      </li>
                  </ul>
                  <form class="d-flex">
                    <?php
                    if(isset($_SESSION['id_num'])) {
                     ?>
                    <a class="nav-link sign" href="logout.php" style="color: rgba(0, 0, 0, 0.7) !important;">로그아웃</a>
                    <?php
                    } else {
                     ?>
                    <a class="nav-link" href="signin-up.php" style="color: rgba(0, 0, 0, 0.7) !important;">로그인/회원가입</a>
                    <?php
                    }
                     ?>
                  </form>
              </div>
          </div>
      </nav>
      <!-- Header-->
      <header class="bg-warning bg-gradien py-4 bg-opacity-75">
          <div class="container px-4 px-lg-5 my-5">
              <div class="text-center text-white">
                  <h1 class="display-4 fw-bolder">오늘의 메뉴는?</h1>
                  <p class="lead fw-normal ttext-secondary-50 mb-0">What's today's menu?</p>
              </div>
          </div>
      </header>
      <!-- menu -->
      <a herf="#" id="btnGogoTop" class="rmenu_top" style="display:none;">
          <span class="glyphicon glyphiconmenu-up"></span>
      </a> <!-- 위로 올라가게 하는 버튼 나중에 디테일 잡아보기-->

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container px-4 px-lg-5">
              <a class="navbar-brand">인기식단</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent_sec" aria-controls="navbarSupportedContent_sec" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent_sec">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                      <li class="nav-item"><a class="nav-link" href="custom.php">맞춤반찬</a></li>
                      <li class="nav-item"><a class="nav-link" href="restaurant.php">주변음식점</a></li>
                  </ul>
                  <div class="d-flex">
                      <button class="btn btn-outline-dark" type="submit" onclick="location.href='./like.php';">
                          <i class="bi-cart-fill me-1"></i>
                          추천식단
                          <?php
                          $con = mysqli_connect("localhost","root","","todaymenu") or die ("Can't access DB");
                          $query_recom = "select * from recommend where user_id=".$_SESSION['id_num']."";
                          $result_recom = $con->query($query_recom);
                          $recom_num = mysqli_num_rows($result_recom);
                           ?>
                          <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo $recom_num; ?></span>
                      </button>
                  </div>
              </div>
          </div>
      </nav>
    <div class="board_wrap">
        <div class="board_title">
            <strong>공지사항</strong>
            <p>공지사항을 빠르고 정확하게 안내해드립니다.</p>
        </div>
        <div class="board_view_wrap">
            <div class="board_view">
                <div class="title">
                    <?php echo $board['title']; ?>
                </div>
                <div class="info">
                    <dl>
                        <dt>번호</dt>
                        <dd><?php echo $board['id_num']; ?></dd>
                    </dl>
                    <dl>
                        <dt>글쓴이</dt>
                        <dd><?php echo $board['writer']; ?></dd>
                    </dl>
                    <dl>
                        <dt>작성일</dt>
                        <dd><?php echo $board['createdAt']; ?></dd>
                    </dl>
                    <dl>
                        <dt>조회</dt>
                        <dd><?php echo $board['views']; ?></dd>
                    </dl>
                </div>
                <div class="cont">
                  <?php echo $board['description']; ?>
                </div>
            </div>
            <div class="bt_wrap">
                <a href="./list.php?q=1" class="on">목록</a>
                <?php
                if($_SESSION['role'] == 2) {  //공지사항 등록은 관리자만 가능하도록 설정
                 ?>
                 <a href="edit.php?id_num=<?php echo $id_num; ?>">수정</a>
                  <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
  }
     ?>
     <!-- Footer-->
     <footer class="bg-warning bg-gradien py-4 bg-opacity-50">
         <div class="container"><p class="m-0 text-center text-secondary">Copyright &copy; todaymenu </p></div>
     </footer>
</body>
</html>
