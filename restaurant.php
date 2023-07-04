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
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/restaurant.css" rel="stylesheet" />
        <!-- Google map api javascript -->
        <!-- <script type="module" src="./js/testmap.js"></script> -->

        <?php
        session_start();

        if(!isset($_SESSION['id_num'])) { // 회원만 열람 가능하게 설정
          ?>
            <script> alert('회원만 접근가능합니다.'); location.href="./signin-up.php"; </script>;
            <?php
        }
        if(isset($_GET['lat']) && isset($_GET['lng'])) {
          ?>
        <script>
            function search_restaurant() {
              let restaurant = "";
              //XMLHttpRequest 객체 생성
              var xhr = new XMLHttpRequest();
              xhr.open('GET', 'https://cors-anywhere.herokuapp.com/https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=<?php echo $_GET['lat'] ?>%2C<?php echo $_GET['lng'] ?>&radius=1500&type=restaurant&key=AIzaSyDd13axO_8bPiN__RaGtt488FOHME0pZ0Y', true);
              xhr.send();

              xhr.onload = () => {
                  if (xhr.status == 200) {
                    const obj = JSON.parse(xhr.response);

                    document.getElementById(`restaurant_name0`).innerHTML = obj.results[0]['name']+"<br/>";
                    document.getElementById(`add0`).innerHTML = "(주소 : "+obj.results[0]['vicinity']+" )";

                    document.getElementById(`restaurant_name1`).innerHTML = obj.results[1]['name']+"<br/>";
                    document.getElementById(`add1`).innerHTML = "(주소 : "+obj.results[1]['vicinity']+" )";

                    document.getElementById(`restaurant_name2`).innerHTML = obj.results[2]['name']+"<br/>";
                    document.getElementById(`add2`).innerHTML = "(주소 : "+obj.results[2]['vicinity']+" )";
                  } else {
                      console.log("통신 실패");
                  }
              }
            }
            search_restaurant();
        </script>
          <?php
        } else {
          ?>
          <script type="text/javascript">
          const searchParams = new URLSearchParams(location.search);

          if(searchParams == '') {

            function success({ coords, timestamp }) {
              const latitude  = coords.latitude;
              const longitude = coords.longitude;

              location.href = `./restaurant.php?lat=${latitude}&lng=${longitude}`;
            }

            function getUserLocation() {
                navigator.geolocation.getCurrentPosition(success);
            }

            getUserLocation();
          }
          </script>
          <?php
        }
         ?>

    </head>
    <body>
      <?php
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
                <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-1 row-cols-xl-1 justify-content-center">
                <h5 class="fw-bolder">주변음식점 추천</h5>
                    <div class="col mb-5 google_map" id="recommend_box">
                      <ul class="a">
                        <li> <span id="restaurant_name0" class="restaurant_name"><img src="./assets/Loading_icon.gif" alt=""></span> <span id="add0"class="add"></span> </li>
                        <li> <span id="restaurant_name1" class="restaurant_name"></span> <span id="add1"class="add"></span> </li>
                        <li> <span id="restaurant_name2" class="restaurant_name"></span> <span id="add2"class="add"></span> </li>
                      </ul>
                    </div>
                </div>
            </div>
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-1 row-cols-xl-1 justify-content-center">
                <h5 class="fw-bolder">주변음식점 위치보기</h5>
                    <div class="col mb-5 google_map">
                    <iframe
                      height="400"
                      style="border:0"
                      loading="lazy"
                      allowfullscreen
                      referrerpolicy="no-referrer-when-downgrade"
                      class="map_card"
                      src="https://www.google.com/maps/embed/v1/search?key=AIzaSyDd13axO_8bPiN__RaGtt488FOHME0pZ0Y
                        &q=음식점+in+Korea
                        &zoom=16
                        &center=<?php echo $_GET['lat'] ?>,<?php echo $_GET['lng'] ?>">
                      </iframe>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-warning bg-gradien py-4 bg-opacity-50">
            <div class="container"><p class="m-0 text-center text-secondary">Copyright &copy; todaymenu</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Google Map api JS-->
        <script
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDd13axO_8bPiN__RaGtt488FOHME0pZ0Y&callback=initMap&v=weekly"
          defer
        ></script>

        <!-- KaKao Map api JS-->
        <!-- <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=3cdeca9d049fc73ff2e4513c34bf790a"></script>
        <script>
        var container = document.getElementById('map');
        var options = {
          center: new kakao.maps.LatLng(33.450701, 126.570667),
          level: 3
        };

        var map = new kakao.maps.Map(container, options);
        </script> -->
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
    </body>
</html>
