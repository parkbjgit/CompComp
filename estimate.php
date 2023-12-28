<!-- 이 코드는 MySQL 데이터베이스와 상호작용하는 드롭다운 메뉴를 가진 웹 양식을 생성합니다. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown Menu Example with MySQL</title>
    <style>
        /* 드롭다운 메뉴의 글씨 크기 조절 */
        select,
        label,
        input {
            font-size: 20px;
            /* 원하는 크기로 조절하세요 */
            margin-left: 10px;
            /* 드롭다운 박스 간 간격 조절 */
            width: 300px;
            /* 드롭다운 박스의 너비를 원하는 크기로 조절하세요 */
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center; /* 수직 정렬을 위해 가운데 정렬 설정 */
            gap: 10px;
            /* 드롭다운 박스와 버튼 간 간격 조절 */
        }

        #formContainer {
            border: 2px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            align-items: center; /* 수직 정렬을 위해 가운데 정렬 설정 */
            margin: auto; /* 수평 가운데 정렬을 위해 margin 속성 추가 */
            width: 500px;
            /* 원하는 너비로 조절하세요 */
            height: 400px;
            /* 원하는 높이로 조절하세요 */
        }
    </style>
</head>

<body>

    <div id="formContainer"> <!-- 큰 사각형을 감싸는 div 추가 -->
        <?php
        


        // session_start();

        include_once 'dbconfig.php'; // 데이터베이스 설정 파일 포함
        $conn = new mysqli($servername, $username, $password, $dbname);

        if (isset($_SESSION["user_id"])) {
            $user_id = $_SESSION["user_id"];
            // user_id를 사용한 코드
            // 예: 데이터베이스 쿼리, 정보 표시 등
        } else {
            echo "사용자 ID를 찾을 수 없습니다.";
        }
        
        
        // 첫 번째 드롭다운 메뉴 - CPU
        $sql = "SELECT * FROM cpu";
        $result = $conn->query($sql);
    
        echo "<form method='post' action='main.php'>";
        echo "<label for='cpuDropdown'>CPU:</label>";
        echo "<select id='cpuDropdown' name='cpu'>";
        while ($row = $result->fetch_assoc()) {
            // CPU 모델과 가격을 함께 표시하고 일정한 폭으로 정렬
            echo "<option value='" . $row["CPU_Model"] . "'>" . str_pad($row["CPU_Model"], 20) . " - $" . $row["Price"] . "</option>";
        }
        echo "</select>";
        

        // 두 번째 드롭다운 메뉴 - GPU
        $sql = "SELECT * FROM gpu";
        $result = $conn->query($sql);
    
        echo "<form method='post' action='main.php'>";
        echo "<label for='gpuDropdown'>GPU:</label>";
        echo "<select id='gpuDropdown' name='gpu'>";
        while ($row = $result->fetch_assoc()) {
            // GPU 모델과 가격을 함께 표시하고 일정한 폭으로 정렬
            echo "<option value='" . $row["GPU_Model"] . "'>" . str_pad($row["GPU_Model"], 20) . " - $" . $row["Price"] . "</option>";
        }
        echo "</select>";

        // 세 번째 드롭다운 메뉴 - RAM
        $sql = "SELECT * FROM ram";
        $result = $conn->query($sql);
    
        echo "<form method='post' action='main.php'>";
        echo "<label for='ramDropdown'>ram:</label>";
        echo "<select id='ramDropdown' name='ram'>";
        while ($row = $result->fetch_assoc()) {
            // RAM 모델과 가격을 함께 표시하고 일정한 폭으로 정렬
            echo "<option value='" . $row["RAM_Model"] . "'>" . str_pad($row["RAM_Model"], 20) . " - $" . $row["Price"] . "</option>";
        }
        echo "</select>";

        // 네 번째 드롭다운 메뉴 - Estimate_NO
        echo "<label for='NoDropdown'>Estimate_NO(ascending order):</label>";
        echo "<select id='NoDropdown' name='Estimate_no'>";
        for ($i = 1; $i <= 10; $i++) {
            echo "<option value='" . $i . "'>" . $i . "</option>";
        }
        echo "</select>";
        
        echo "<input type='submit' value='Save'>";
        echo "</form>";

        // 폼이 제출되면 선택된 옵션을 처리하는 PHP 코드
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            {
                $selectedCPU = $_POST["cpu"];
            $selectedGPU = $_POST["gpu"];
            $selectedRAM = $_POST["ram"];
            $selectedEstimateNo = $_POST["Estimate_no"];
            // CPU, GPU, RAM의 가격 합산
            $cpuPrice = 0;
            $gpuPrice = 0;
            $ramPrice = 0;

            // 자신의 하드웨어 점수 계산
            $sql = "SELECT * FROM cpu WHERE cpu_model='$selectedCPU'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $cpuPrice = $row["Price"];
            }

            $sql = "SELECT * FROM gpu WHERE gpu_model='$selectedGPU'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $gpuPrice = $row["Price"];
            }

            $sql = "SELECT * FROM ram WHERE ram_model='$selectedRAM'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $ramPrice = $row["Price"];
            }

            // 이제 $selectedCPU, $selectedGPU, $selectedRAM 변수에 선택된 값들이 들어 있습니다.
            // 여기서 이 값을 사용하여 MySQL에 저장하는 코드를 추가할 수 있습니다.
        
            // 예를 들어:
            $sql = "INSERT INTO estimate(ESTIMATE_No, User_ID, CPU_Model, GPU_Model, RAM_Model, Price) VALUES ($selectedEstimateNo ,'$user_id', '$selectedCPU', '$selectedGPU','$selectedRAM',  $cpuPrice + $gpuPrice + $ramPrice)";
            if ($conn->query($sql) === TRUE) {
                echo "<script type='text/javascript'>
            alert('선택된 옵션이 성공적으로 저장되었습니다.');
             window.location.href='main.php'; // 저장 후 리디렉션할 페이지
          </script>";
                // echo "선택된 옵션이 성공적으로 저장되었습니다.";



            } else {
                echo "오류: " . $conn->error;
            }

            }
            
            
            $isSubmmit = true;
        }
  
        // $_SERVER['REQUEST_METHOD'] = "GET";
        // echo $_SERVER['REQUEST_METHOD'];

        //연결 종료
        $conn->close();
        
        ?>
    </div>
</body>

</html>