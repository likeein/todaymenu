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

        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                  <?php
                  $id_num = $_SESSION['id_num'];

                  $query = "select * from users where id_num='".$id_num."'";
                  $result = $con->query($query);
                  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

                  if ($row['height'] == null && $row['weight'] == null) {
                     // 키, 몸무게 정보가 없을경우 임의의 기초대사량을 구해, 맞춤반찬 리스트를 구성한다.
                    if($row['contact'] == 'man') { // 남성의 임의의 기초대사량
                      $kcal = 1700;
                    } else {                      // 여성의 임의의 기초대사량
                      $kcal = 1300;
                    }
                    ?>
                    <div class="col mb-5 height-weight">
                        <div class="card h-100" style="border: none;">
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                  <h5 class="fw-bolder bolder">기초대사량계산</h5>
                                  <h6 class="fw-bolder bolder-title explain">(더욱 정확한 맞춤반찬을 위해 키와 몸무게를 입력해주세요)</h6>
                                  <form action="./customSetup.php" method="post">
                                  <div class="info">
                                    <dl>
                                        <dt>키(cm)</dt>
                                        <dd><input type="text" name="height" placeholder="단위(cm)"></dd>
                                    </dl>
                                    <br/>
                                    <dl>
                                        <dt>몸무게(kg)</dt>
                                        <dd><input type="text" name="weight" placeholder="단위(kg)"></dd>
                                    </dl>
                                    <br/>
                                    <dl>
                                      <button type="submit">계산</button>
                                    </dl>
                                </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  <?php
                  } else {
                    if($row['contact'] == 'man') { // 남성기준 기초대사량
                      $kcal = round(88.4 + (13.4 * $row['weight']) + (4.8 * $row['height']) - (5.68 * ($row['age']+5)));
                    } else {                      // 여성기준 기초대사량
                      $kcal = round(447.6 + (9.25 * $row['weight']) + (3.1 * $row['height']) - (4.33 * ($row['age']+5)));
                    }
                   }
                   ?>


                  <div class="col mb-5">
                      <div class="card h-100" style="border: none;">
                          <!-- Product details-->
                          <div class="card-body p-4">
                              <div class="text-center">
                                  <h5 class="fw-bolder">맞춤반찬추천</h5>
                              </div>
                          </div>
                      </div>
                  </div>

                  <?php
                  for ($i = 0; $i < 5; $i++) {
                    $max_kcal = ($kcal / 3) * 1.25 - 200;
                    $min_kcal = ($kcal / 3) * 0.75 - 200;
                    $recom_kcal = 0;

                    $query_dish = "select * from dish order by rand()";
                    $result_dish = $con->query($query_dish);
                    $dish_num = mysqli_num_rows($result_dish);

                    $recom_list = [
                      0 => [
                        'id_num' => 0,
                        'name' => NULL,
                        'kcal' => 0,
                        'link' => NULL,
                      ],
                      1 => [
                        'id_num' => 0,
                        'name' => NULL,
                        'kcal' => 0,
                        'link' => NULL,
                      ],
                      2 => [
                        'id_num' => 0,
                        'name' => NULL,
                        'kcal' => 0,
                        'link' => NULL,
                      ]
                    ];

                    while ($dish = $result_dish->fetch_array()) {
                      if($recom_list[0]['name'] == NULL) {
                        $recom_list[0]['id_num'] = $dish['id_num'];
                        $recom_list[0]['name'] = $dish['name'];
                        $recom_list[0]['kcal'] = $dish['kcal'];
                        $recom_list[0]['link'] = $dish['link'];
                        $recom_kcal += $dish['kcal'];
                      } else if($recom_list[1]['name'] == NULL){
                        if($recom_kcal + $dish['kcal'] <= $max_kcal && $recom_kcal + $dish['kcal'] >= $min_kcal) {
                          $recom_list[1]['id_num'] = $dish['id_num'];
                          $recom_list[1]['name'] = $dish['name'];
                          $recom_list[1]['kcal'] = $dish['kcal'];
                          $recom_list[1]['link'] = $dish['link'];
                          $recom_kcal += $dish['kcal'];
                        }
                      } else {
                        if($recom_kcal + $dish['kcal'] <= $max_kcal && $recom_kcal + $dish['kcal'] >= $min_kcal) {
                          $recom_list[2]['id_num'] = $dish['id_num'];
                          $recom_list[2]['name'] = $dish['name'];
                          $recom_list[2]['kcal'] = $dish['kcal'];
                          $recom_list[2]['link'] = $dish['link'];
                          $recom_kcal += $dish['kcal'];
                        }
                      }
                    }
                    ?>

                   <div class="col mb-5">
                       <div class="card h-100">
                           <!-- Sale badge-->
                           <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">인기</div>
                           <!-- Product details-->
                           <div class="card-body p-4">
                               <div class="text-center">
                                   <!-- Product name-->
                                   <h5 class="fw-bolder bolder-title">맞춤반찬</h5>
                                   <h6 class="fw-bolder bolder-margin0" ><?php echo $recom_list[0]['name']."(".$recom_list[0]['kcal']."kcal)" ?></h6>
                                   <?php if($recom_list[0]['link'] != NULL) {?> <h6 class="fw-bolder"><a href="<?php echo $recom_list[0]['link']; ?>" class="recipe"><?php echo $recom_list[0]['name']; ?> 레시피</a> </h6> <?php } ?>
                                   <?php
                                   if($recom_list[1]['name'] != NULL) {
                                     ?>
                                     <h6 class="fw-bolder bolder-margin0" ><?php echo $recom_list[1]['name']."(".$recom_list[1]['kcal']."kcal)" ?></h6>
                                     <?php if($recom_list[1]['link'] != NULL) {?> <h6 class="fw-bolder"><a href="<?php echo $recom_list[1]['link']; ?>" class="recipe"><?php echo $recom_list[1]['name']; ?> 레시피</a> </h6> <?php } ?>
                                     <?php
                                   }

                                   if($recom_list[2]['name'] != NULL) {
                                     ?>
                                     <h6 class="fw-bolder bolder-margin0" ><?php echo $recom_list[2]['name']."(".$recom_list[2]['kcal']."kcal)" ?></h6>
                                     <?php if($recom_list[2]['link'] != NULL) {?> <h6 class="fw-bolder"><a href="<?php echo $recom_list[2]['link']; ?>" class="recipe"><?php echo $recom_list[2]['name']; ?> 레시피</a> </h6> <?php } ?>
                                     <?php
                                   }
                                    ?>
                               </div>
                           </div>
                           <!-- Product actions 개발 예정 -->
                           <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                               <div class="text-center"><a class="btn btn-outline-dark mt-auto" onclick="like(<?php echo $recom_list[0]['id_num'] ?>, <?php echo $recom_list[1]['id_num'] ?>, <?php echo $recom_list[2]['id_num'] ?>)">찜하기</a></div>
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

        <!-- Ajax JS-->
        <script>
            function like(a, b, c) {
              $.ajax({
                url: './likeSetup.php',
                type: "POST",
                data: {
                  'a': a,
                  'b': b,
                  'c': c,
                  'user': <?php echo $_SESSION['id_num']; ?>
                }
              }).done(function(data) {
      					alert('찜한 반찬에 추가되었습니다.')
      				});
            }
        </script>
    </body>
</html>
