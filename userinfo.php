<!DOCTYPE html>
<html lang="kr">
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
        <!-- Jquery Ajax -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/custom.css" rel="stylesheet" />
    </head>
    <body>
      <?php
      session_start();

      if(!isset($_SESSION['id_num'])) { // 회원만 열람 가능하게 설정
        ?>
          <script> alert('회원만 접근가능합니다.'); location.href="./signin-up.php"; </script>;
          <?php
      }
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

        <!-- <div class = "g-warning bg-gradien py-4 bg-opacity-75">
            <ui id="nav-li">
                <li>
                    <a herf="#" class="active">인기식단</a>
                </li>
                <li>
                    <a herf="#" class="active">분류</a>
                </li>
                <li>
                    <a herf="#" class="active">주변배달</a>
                </li>
                <li>
                    <a herf="#" class="active">마이페이지</a>
                </li>
            </ui>
        </div> -->

        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                  <?php
                  if(!isset($_SESSION['id_num'])) { // 회원만 열람 가능하게 설정
                    ?>
                      <script> alert('회원만 접근가능합니다.'); location.href="./signin-up.php"; </script>;
                      <?php
                  }
                  $id_num = $_SESSION['id_num'];

                  $query = "select * from users where id_num='".$id_num."'";
                  $result = $con->query($query);
                  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

                  if ($row['height'] != null && $row['weight'] != null) {
                    ?>
                    <div class="col mb-5 height-weight">
                        <div class="card h-100" style="border: none;">
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                  <h5 class="fw-bolder bolder">개인정보수정</h5>
                                  <h6 class="fw-bolder bolder-title explain">(더욱 정확한 맞춤반찬을 위해 키와 몸무게를 수정해주세요)</h6>
                                  <form action="./customModify.php" method="post">
                                  <div class="info">
                                    <dl>
                                        <dt>키(cm)</dt>
                                        <dd><input type="text" name="height" placeholder="단위(cm)" value="<?php echo $row['height']; ?>"></dd>
                                    </dl>
                                    <br/>

                                    <dl>
                                        <dt>몸무게(kg)</dt>
                                        <dd><input type="text" name="weight" placeholder="단위(kg)" value="<?php echo $row['weight']; ?>"></dd>
                                    </dl>
                                    <br/>

                                    <dl>
                                        <dt>나이대</dt>
                                        <dd>
                                          <select id="area" name="age">
                                              <option disabled>나이대를 선택해주세요</option>
                                              <option value="10" <?php if($row['age'] == '10') echo "selected"; ?>>10대</option>
                                              <option value="20" <?php if($row['age'] == '20') echo "selected"; ?>>20대</option>
                                              <option value="30" <?php if($row['age'] == '30') echo "selected"; ?>>30대</option>
                                              <option value="40" <?php if($row['age'] == '40') echo "selected"; ?>>40대</option>
                                              <option value="50" <?php if($row['age'] == '50') echo "selected"; ?>>50대</option>
                                              <option value="60" <?php if($row['age'] == '60') echo "selected"; ?>>60대</option>
                                              <option value="70" <?php if($row['age'] == '70') echo "selected"; ?>>70대</option>
                                          </select>
                                        </dd>
                                    </dl>
                                    <br/>

                                    <dl>
                                        <dt>성별</dt>
                                        <dd>
                                          <select id="area" name="contact">
                                              <option disabled>성별을 선택해주세요</option>
                                              <option value="man" <?php if($row['contact'] == 'man') echo "selected"; ?>>남성</option>
                                              <option value="woman" <?php if($row['contact'] == 'woman') echo "selected"; ?>>여성</option>
                                          </select>
                                        </dd>
                                    </dl>
                                    <br/>
                                    <dl>
                                      <button type="submit">수정</button>
                                    </dl>
                                </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  <?php
                  }
                  ?>

                </div>
            </div>
        </section>
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
