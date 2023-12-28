<?php
include_once 'dbconfig.php';

session_start();

if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $pw = $_POST['pw'];
    
    // 사용자 인증
    $sql = "SELECT * FROM user WHERE name=? AND pw=?";

    // 준비된 명령문 사용
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $pw); // 'ss'는 두 변수 모두 문자열임을 의미
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // 사용자 ID와 이름을 세션에 저장
        $_SESSION["user_id"] = $row['user_id'];
        $_SESSION["user_name"] = $name;

        // 로그인 성공 메시지를 스크립트로 전달
        echo "<script>
                alert('로그인 성공');
                window.location.href='main.php';
              </script>";
    } else {
        echo "<script>
                alert('아이디 또는 비밀번호가 잘못되었습니다.');
                window.location.href='login.php'; // 로그인 페이지나 이전 페이지로 리디렉션
              </script>";
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>로그인</title>
    <link rel="stylesheet" href="loginsignup_style.css">
</head>

<!-- 아이디 또는 비밀번호가 잘못된 경우 경고 팝업 -->
<script>
    <?php
    // PHP에서 생성된 $error 메시지를 JavaScript로 출력합니다.
    echo "var errorMessage = '" . $error . "';";
    ?>

    if (errorMessage !== "") {
        alert(errorMessage);
    }
</script>

<body>
    <div class="container">
        <h2>LOGIN</h2>
        <form method="post" action="login.php">
            <label for="name">ID</label>
            <input type="text" id="name" name="name" required><br>

            <label for="pw">PASSWORD</label>
            <input type="password" id="pw" name="pw" required><br>

            <button type="submit" name="login">LOGIN</button>
        </form>
        <p>Don't have an account? <a href="signup.php">SIGN UP</a></p>
    </div>
</body>

</html>