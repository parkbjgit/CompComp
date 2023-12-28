<?php

include_once 'dbconfig.php';
mysqli_select_db($conn, $dbname) or die('DB selection failed');

if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $pw = $_POST['pw'];
    $si = $_POST['si'];
    $gun = $_POST['gun'];
    $dong = $_POST['dong'];

    // 사용자 추가
    $sql = "INSERT INTO user (name, pw, si, gun, dong) 
                VALUES ('$name', '$pw', '$si', '$gun', '$dong')";

if ($conn->query($sql) === TRUE) {
    echo '<script>alert("회원가입 성공");</script>';
    echo '<script>window.location.href = "login.php";</script>';
    exit();

    } else {
        echo "회원가입 실패. 다시 시도하세요." . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>회원가입</title>
    <link rel="stylesheet" href="loginsignup_style.css">
</head>

<body>
    <div class="container">
        <h2>SIGNUP</h2>
        <form method="post" action="signup.php">
            <label for="name">NAME</label>
            <input type="text" id="name" name="name" required><br>
            <label for="pw">PASSWORD</label>
            <input type="password" id="pw" name="pw" required><br>
            <label for="si">CITY</label>
            <input type="text" id="si" name="si" required><br>
            <label for="gun">COUNTY</label>
            <input type="text" id="gun" name="gun" required><br>
            <label for="dong">TOWNSHIP</label>
            <input type="text" id="dong" name="dong" required><br>
            <button type="submit" id="signup-form" name="signup">SIGNUP</button>
        </form>
    </div>

</body>

</html>