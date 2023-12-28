<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Specifications</title>
    <style>
        body {
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 28px; /* 원하는 크기로 조절하세요 */
        }

        .spec-box-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            justify-content: center;
        }

        .spec-box {
            border: 2px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            width: 270px; /* 원하는 너비로 설정하세요 */
            height: 230px; /* 원하는 높이로 설정하세요 */
            text-align: center;
            margin: 0 auto; /* 가운데 정렬을 위해 추가 */
        }

        h2 {
            margin-bottom: 10px;
            font-size: 18px; /* 원하는 크기로 조절하세요 */
        }

        p {
            margin: 5px 0;
        }
    </style>
</head>
<body>

<h1 style="font-size: 28px;">제작진들의 컴퓨터 사양 추천</h1>

<div class="spec-box-container">

    <?php
    // MySQL 서버 연결 정보
    $servername = "127.0.0.1:3306";
    $username = "root";
    $password = "jack765824@";
    $dbname = "game";

    // MySQL 서버에 연결
    $conn = new mysqli($servername, $username, $password, $dbname);

    // 연결 확인
    if ($conn->connect_error) {
        die("연결 실패: " . $conn->connect_error);
    }

    // CPU, GPU, RAM 테이블에서 최고 사양 데이터를 가져오는 쿼리
    $sql = "SELECT C.CPU_Model AS CPU, G.GPU_Model AS GPU, R.RAM_Model AS RAM, 
               SUM(C.price + G.price + R.price) AS Price
            FROM CPU C, GPU G, RAM R
            WHERE C.score = (SELECT MAX(C.score) FROM CPU C)
              AND G.score = (SELECT MAX(G.score) FROM GPU G)
              AND R.score = (SELECT MAX(R.score) FROM RAM R)
            GROUP BY CPU, GPU, RAM;";

    $result = $conn->query($sql);

    // 가져온 데이터를 반복문을 통해 출력
    while ($row = $result->fetch_assoc()) {
        echo '<div class="spec-box">';
        echo '<h2>최고 사양</h2>';
        echo '<p><strong>CPU:</strong> ' . $row['CPU'] . '</p>';
        echo '<p><strong>GPU:</strong> ' . $row['GPU'] . '</p>';
        echo '<p><strong>RAM:</strong> ' . $row['RAM'] . '</p>';
        echo '<p><strong>Price:</strong> ' . number_format($row['Price'], 2) . '</p>';
        echo '</div>';
    }

    // CPU, GPU, RAM 테이블에서 가성비1 사양 데이터를 가져오는 쿼리
    $sql = "SELECT C.CPU_Model as CPU, G.GPU_Model as GPU, R.RAM_Model as RAM, 
                    SUM(C.price + G.price + R.price) as Price
            FROM CPU C, GPU G, RAM R
            WHERE C.score = (Select C.score from CPU C order by C.score asc limit 1 offset 18)
                AND G.score = (Select G.score from GPU G order by G.score asc limit 1 offset 21)
                AND R.score = (Select R.score from RAM R order by R.score asc limit 1 offset 5)
            GROUP BY CPU, GPU, RAM";

    $result = $conn->query($sql);

    // 가져온 데이터를 반복문을 통해 출력
    while ($row = $result->fetch_assoc()) {
        echo '<div class="spec-box">';
        echo '<h2>가성비1 사양</h2>';
        echo '<p><strong>CPU:</strong> ' . $row['CPU'] . '</p>';
        echo '<p><strong>GPU:</strong> ' . $row['GPU'] . '</p>';
        echo '<p><strong>RAM:</strong> ' . $row['RAM'] . '</p>';
        echo '<p><strong>Price:</strong> ' . number_format($row['Price'], 2) . '</p>';
        echo '</div>';
    }

    // CPU, GPU, RAM 테이블에서 가성비2 사양 데이터를 가져오는 쿼리
    $sql = "SELECT C.CPU_Model as CPU, G.GPU_Model as GPU, R.RAM_Model as RAM, 
                    SUM(C.price + G.price + R.price) as Price
            FROM CPU C, GPU G, RAM R
            WHERE C.score = (Select C.score from CPU C order by C.score asc limit 1 offset 36)
                AND G.score = (Select G.score from GPU G order by G.score asc limit 1 offset 42)
                AND R.score = (Select R.score from RAM R order by R.score asc limit 1 offset 10)
            GROUP BY CPU, GPU, RAM";

    $result = $conn->query($sql);

    // 가져온 데이터를 반복문을 통해 출력
    while ($row = $result->fetch_assoc()) {
        echo '<div class="spec-box">';
        echo '<h2>가성비2 사양</h2>';
        echo '<p><strong>CPU:</strong> ' . $row['CPU'] . '</p>';
        echo '<p><strong>GPU:</strong> ' . $row['GPU'] . '</p>';
        echo '<p><strong>RAM:</strong> ' . $row['RAM'] . '</p>';
        echo '<p><strong>Price:</strong> ' . number_format($row['Price'], 2) . '</p>';
        echo '</div>';
    }

    // CPU, GPU, RAM 테이블에서 최저 사양 데이터를 가져오는 쿼리
    $sql = "SELECT C.CPU_Model as CPU, G.GPU_Model as GPU, R.RAM_Model as RAM, 
                   SUM(C.price + G.price + R.price) as Price
            FROM CPU C, GPU G, RAM R
            WHERE C.score = (Select MIN(C.score) from CPU C)
                AND G.score = (Select MIN(G.score) from GPU G)
                AND R.score = (Select MIN(R.score) from RAM R)
            GROUP BY CPU, GPU, RAM";

    $result = $conn->query($sql);

    // 가져온 데이터를 반복문을 통해 출력
    while ($row = $result->fetch_assoc()) {
        echo '<div class="spec-box">';
        echo '<h2> 최저 사양</h2>';
        echo '<p><strong>CPU:</strong> ' . $row['CPU'] . '</p>';
        echo '<p><strong>GPU:</strong> ' . $row['GPU'] . '</p>';
        echo '<p><strong>RAM:</strong> ' . $row['RAM'] . '</p>';
        echo '<p><strong>Price:</strong> ' . number_format($row['Price'], 2) . '</p>';
        echo '</div>';
    }

    // 연결 닫기
    $conn->close();
    ?>
</div>
</body>
</html>