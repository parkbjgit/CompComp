<script>
// 모달 닫기
function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}
</script>


<?php
include ("dbconfig.php");

if ($conn->connect_error) {
    die("DB 연결 실패: " . $conn->connect_error);
}   

if (isset($_GET['game_id'])) {
    $gameId = $_GET['game_id'];
    // 이어지는 코드를 계속 사용합니다.
} else {
    echo "게임 정보를 불러오는 데 실패했습니다. 게임 ID를 받지 못했습니다.";
}

    // 게임 정보를 가져오는 SQL 쿼리
    $sql = "SELECT
                G.game_name,
                G.game_image,
                GROUP_CONCAT(GG.genre) AS genres,
                GS.os,
                GS.hdd,
                GS.cpu_Model,
                GS.ram_gb,
                GS.gpu_model
            FROM
                game G
            JOIN
                game_genre GG ON G.game_id = GG.game_id
            JOIN
                gamespec GS ON G.game_id = GS.game_id
            WHERE
                G.game_id = $gameId
            GROUP BY
                G.game_name, GS.os, GS.hdd, GS.cpu_Model, GS.ram_gb, GS.gpu_model";

    $result = $conn->query($sql);

    // 쿼리 결과 확인
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        echo 
            "
            <div id='game-info'>
                <img src='", $row["game_image"], "' alt='게임 이미지'>

                <div class='game-description'>
                <p>게임 이름: " . $row["game_name"] . "</p>
                <p>장르: " . $row["genres"] . "</p>
                <p>운영 체제: " . $row["os"] . "</p>
                <p>하드 디스크: " . $row["hdd"] . "</p>
                <p>CPU 모델: " . $row["cpu_Model"] . "</p>
                <p>RAM 용량: " . $row["ram_gb"] . "GB</p>
                <p>GPU 모델: " . $row["gpu_model"] . "</p>
                </div>
            </div>";

        // 데이터베이스 연결 종료
        $conn->close();
    } else {
        echo "게임 정보를 불러오는 데 실패했습니다.";
    }

?>
