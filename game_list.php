<script>
function showGameDetail(gameId) {

    // 모달 창 열기
    var modal = document.getElementById("myModal");
    modal.style.display="block";

    // 게임 정보를 가져와서 모달에 표시
    var gameInfo = document.getElementById("gameInfo");
    gameInfo.innerHTML = ""; // 기존 내용 초기화 (optional)

    // AJAX를 사용하여 게임 정보를 가져옵니다.
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            gameInfo.innerHTML = xhr.responseText;
        }
    };
    xhr.open("GET", "game_detail.php?game_id=" + gameId, true);
    xhr.send();
}
</script>


<?php
include ("dbconfig.php");

if ($conn->connect_error) {
    die("DB 연결 실패: " . $conn->connect_error);
}

$sql = "SELECT game_id, game_name, game_image from game;";      //게임 아이디는 각 게임 정보를 가져와야하므로

$result = $conn->query($sql);


if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo 
        "
            <div class='game-card'>
                <div class='game-card-h3'>
                    <h3>", $row["game_name"],"</h3>
                </div>
                <div class='game-card-image'>
                    <button type='button' class='game-card-button' onclick='showGameDetail(" .$row["game_id"] .");'>
                        <img src='", $row["game_image"], "' alt='게임 이미지'>
                    </button>
                </div>
            </div>
        ";
    }
}else{
    echo "0 Results";
}


$conn->close();




