<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8" />
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
    if(!isset($_SESSION['id_num'])) {
      ?>
        <script> alert('회원만 접근가능합니다.'); location.href="./signin-up.php"; </script>;
        <?php
    }
    $con = mysqli_connect("localhost","root","","todaymenu") or die ("Can't access DB");
    $query = "select * from notice";
    $result = $con->query($query);
    $num = mysqli_num_rows($result);  // DB의 공지글 select값이 총 몇개인지 확인
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
        <div class="board_list_wrap">
            <div class="board_list">
                <div class="top">
                    <div class="num">번호</div>
                    <div class="title">제목</div>
                    <div class="writer">글쓴이</div>
                    <div class="date">작성일</div>
                    <div class="count">조회</div>
                </div>
                <?php
                if(isset($_GET['q'])) {   // q값을 GET method로 보내주어, 공지사항 목록의 페이징을 구현한다. (q값이 없을땐 초기화면이므로 q값은 1로 진행)
                  $q=$_GET['q'];
                } else {
                  $q=1;
                }
                $limit = ($q - 1) * 5;
                $con = mysqli_connect("localhost","root","","todaymenu") or die ("Can't access DB");
                $query = "select * from notice order by id_num desc limit ".$limit.", 5";
                $result = $con->query($query);
                while($board = $result->fetch_array()) {
                 ?>
                <div>
                    <div class="num"><?php echo $board['id_num']; ?></div>
                    <div class="title"><a href="view.php?id_num=<?php echo $board['id_num']; ?>"><?php echo $board['title']; ?></a></div>
                    <div class="writer"><?php echo $board['writer']; ?></div>
                    <div class="date"><?php echo substr($board['createdAt'], 0, 10); ?></div>
                    <div class="count"><?php echo $board['views']; ?></div>
                </div>
                <?php
                }
                 ?>
            </div>
            <div class="board_page">
              <?php
              // 계산해뒀던 $num으로 페이징 수를 정하고 $q값을 이용해 페이징 링크와 숫자를 지정
              $page = $num / 5;
              $prev = $q > 1 ? $q-1 : $q;
              $next = $q < $page ? $q+1 : $q;
               ?>
                <a href="./list.php?q=1" class="bt first"><<</a>
                <a href="./list.php?q=<?php echo $prev; ?>" class="bt prev"><</a>
                <?php
                for($i = 0 ; $i < $page; $i++) {
                  ?>
                 <a href="./list.php?q=<?php echo $i+1; ?>" class="num <?php if($q==$i+1) {echo "on";} ?>"><?php echo $i+1; ?></a>
                  <?php
                }
                 ?>
                <a href="./list.php?q=<?php echo $next; ?>" class="bt next">></a>
                <a href="./list.php?q=5" class="bt last">>></a>
            </div>
            <?php
            if($_SESSION['role'] == 2) {  //공지사항 등록은 관리자만 가능하도록 설정
             ?>
            <div class="bt_wrap">
                <a href="write.php" class="on">등록</a>
                <!--<a href="#">수정</a>-->
            </div>
              <?php
            }
            ?>
        </div>
    </div>
    <!-- Footer-->
    <footer class="bg-warning bg-gradien py-4 bg-opacity-50">
        <div class="container"><p class="m-0 text-center text-secondary">Copyright &copy; todaymenu </p></div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>
</html>
