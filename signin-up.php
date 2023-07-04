<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <title>로그인/회원가입</title>
  <link href="css/signin-up.css" rel="stylesheet" />
</head>
<body>

  <h2>로그인 / 회원가입</h2>
<div class="container" id="container">
  <div class="form-container sign-up-container">
    <form action="./signup.php" method="post">
      <h1>회원가입</h1>
      <input type="text" name="name" required placeholder="이름" />
      <input type="email" name="email" required placeholder="이메일" />
      <input type="password" name="password" required placeholder="비밀번호" />

      <fieldset>
        <label>
          <input type="radio" name="contact" value="woman" checked />
          <span>여자</span>
        </label>

        <label>
          <input type="radio" name="contact" value="man" />
          <span>남자</span>
        </label>
      </fieldset>

    <div class="area">
      <select id="area" name="age">
          <option selected disabled>나이대를 선택해주세요</option>
          <option value="10">10대</option>
          <option value="20">20대</option>
          <option value="30">30대</option>
          <option value="40">40대</option>
          <option value="50">50대</option>
          <option value="60">60대</option>
          <option value="70">70대</option>
      </select>
      <div id="areaError" class="error"></div>
  </div>
  <a></a>
      <button>회원가입</button>
    </form>
  </div>
  <div class="form-container sign-in-container">
    <form action="./signin.php" method="post">
      <h1>로그인</h1>
      <!-- <div class="social-container">
        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
      </div>
      <span>or use your account</span> -->
      <input type="email" name="email" required placeholder="이메일" />
      <input type="password" name="password" required placeholder="비밀번호" />
      <!-- <a href="#">비밀번호를 잊어버리셨나요?</a> -->
      <a></a>
      <button>로그인</button>
    </form>
  </div>
  <div class="overlay-container">
    <div class="overlay">
      <div class="overlay-panel overlay-left">
        <h1>회원이신가요?</h1>
        <p></p>
        <button class="ghost" id="signIn">로그인하러가기</button>
      </div>
      <div class="overlay-panel overlay-right">
        <h1>처음이신가요?</h1>
        <p></p>
        <button class="ghost" id="signUp">회원가입하러가기</button>
      </div>
    </div>
  </div>
</div>
<script src="js/signin-up.js"></script>
</body>
</html>
