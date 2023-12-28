<?php
session_start();
include_once 'dbconfig.php'; // 데이터베이스 설정 파일 포함

if (isset($_SESSION["user_name"])) {
    // 사용자가 로그인 상태인 경우
    $name = $_SESSION["user_name"];

    // 데이터베이스에서 사용자 ID 가져오기
    $sql = "SELECT user_id FROM user WHERE name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $name); // 's'는 변수 타입이 문자열임을 의미
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row["user_id"];
        

        // 사용자 ID를 세션에 저장---------------
        $_SESSION["user_id"] = $user_id;


        // 사용자 ID와 이름을 이용하여 원하는 작업 수행
        // echo "<br><br><br><br><br>안녕하세요, $name ($user_id) 님!";
    } else {
        echo "사용자 ID를 찾을 수 없습니다.";
    }
} else {
    // 사용자가 로그인하지 않은 경우
    echo "로그인이 필요합니다.";
}$conn->close();
?>



<!DOCTYPE html>
<html>

<head>
  <title>Game</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style3.css">

  <!-- <script src="javascript.js"></script> -->
  <script src="loginsignup.js"></script>
  <script src="showGameDetail.js"></script>
  <script src="closeModal.js"></script>
</head>

<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="javascript:location.reload();" class="w3-bar-item w3-button w3-wide">COMPUTER</a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <a href="#home" class="w3-bar-item w3-button">HOME</a>
      <a href="#estimate" class="w3-bar-item w3-button">ESTIMATE</a>
      <a href="#recommend" class="w3-bar-item w3-button">RECOMMEND</a>
      <a href="#compare" class="w3-bar-item w3-button">COMPARE</a>
      <!-- <a href="compare.php" class="w3-bar-item w3-button">COMPARE</a> -->

      <!-- 로그아웃 버튼 -->
      <a href="logout.php" style="margin-left:400px;" class="w3-bar-item w3-button">LOGOUT</a>
      </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>


<div class="w3-container" style="display:flex; flex-wrap:wrap; padding:128px 16px" id="home">

<h3 class="w3-center" style="flex:auto;" >Click to Check The Game's Specifications</h3>

  <div class='game-container'>
      <?php include "game_list.php"; ?>
      <?php include 'modal.php'; ?>
  </div>
</div>


<div class="w3-container w3-light-grey" style="padding:128px 16px" id="estimate">
    <h3 class="w3-center">Estimate</h3>
    <?php include 'estimate.php'; ?>
</div>




<div class="w3-container w3-row w3-center w3-dark-grey w3-padding-64" id="recommend">
  <h3 class="w3-center">Recommend</h3>
  <?php include 'recommend.php';?>
</div>

<div  id="compare">
  <h3 class="w3-center">Compare</h3>
  <?php include 'compare.php';?>
</div>

 

</body>
</html>