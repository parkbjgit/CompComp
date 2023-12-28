<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Compare</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- 여기에 필요한 CSS 및 JavaScript 링크 추가 -->
    <link rel="stylesheet" href="style2.css">

</head>
<body>
<div class="compare-box">
<?php
    // MySQL 서버 연결 정보
    $servername = "127.0.0.1:3306";
    $username = "root";
    $password = "jack765824@";
    $dbname = "game";

    // // MySQL 서버에 연결
    $conn = new mysqli($servername, $username, $password, $dbname);

    // session_start();
    include_once 'dbconfig.php';    

    // Game 테이블 데이터 로드
    $sql1 = "SELECT * FROM Game";
    $result1 = $conn->query($sql1);
    $game_options = "";
    if ($result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {
            $game_options .= "<option value='".$row1["GAME_ID"]."'>".$row1["Game_Name"]."</option>";
        }
    }


    $sql1 = "SELECT * FROM GAME";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {
        $i = 0;
        while ($row1 = $result1->fetch_assoc()) {
            $game_name[$i] = $row1["Game_Name"];
            $game_id[$i] = $row1["GAME_ID"];
            $i += 1;
        }
        $i = 0;
    }


    $sql2 = "Select * from game_score";
    $result2 = $conn->query($sql2);
    if ( $result2->num_rows > 0) {
        $i = 0;
        while ($row2 = $result2->fetch_assoc()) {
            $game_cpu[$i] = $row2["CPU"];
            $game_cpu_score[$i] = $row2["CPU_Score"];
            $game_gpu[$i] = $row2["GPU"];
            $game_gpu_score[$i] = $row2["GPU_Score"];
            $game_ram_gb[$i] = $row2["RAM_GB"];
            $i += 1;
        }
    }


    //user_id 받아져왔는지 확인하는 코드
    $user_id = $_SESSION["user_id"];
    if(isset($user_id) && !empty($user_id)) {
        // $user_id에 값이 있으면 SQL 쿼리에서 사용할 수 있습니다.
        $sql3 = "SELECT * FROM estimate WHERE USER_ID = $user_id";
        $result3 = $conn->query($sql3);
        $estimate_options = "";
        if ($result3->num_rows > 0) {
            $i = 0;
            while ($row3 = $result3->fetch_assoc()) {
                $estimate_no[$i] = $row3["ESTIMATE_No"];
                $user_cpu[$i] = $row3["CPU_Model"];
                $user_ram[$i] = $row3["RAM_Model"];
                $user_gpu[$i] = $row3["GPU_Model"];
                $i += 1;
            }
            for (; $i < 10; $i++) {
                $estimate_no[$i] = 0;
                $user_cpu[$i] = "1";
                $user_ram[$i] = "2";
                $user_gpu[$i] = "3";
            }
        }
    } else {
        // $user_id가 설정되어 있지 않거나 비어 있는 경우 해당 사례를 처리할 수 있습니다.
        echo "사용자 ID를 사용할 수 없습니다.";
        // echo $_SESSION["user_id"];
    }

    $sql4 = "Select E.ESTIMATE_No as No, C.Score as cpu_score, G.Score as gpu_score, R.GB as ram_gb, E.price as price from CPU C, GPU G, RAM R, estimate E where C.CPU_Model = E.CPU_Model and G.GPU_Model = E.GPU_Model and R.RAM_Model = E.RAM_Model and E.user_id = ". $user_id;    
    $result4 = $conn->query($sql4);
    if ( $result4->num_rows > 0) {
        $i = 0;
        while ($row4 = $result4->fetch_assoc()) {
            $user_cpu_score[$i] = $row4["cpu_score"];
            $user_ram_gb[$i] = $row4["ram_gb"];
            $user_gpu_score[$i] = $row4["gpu_score"];
            $user_price[$i] = $row4["price"];
            $i += 1;
        }
        for (; $i < 10; $i++) {
            $user_cpu_score[$i] = 0;
            $user_ram_gb[$i] = 0;
            $user_gpu_score[$i] = 0;
            $user_price[$i] = 0;
        }
    }


    // 연결 종료
    $conn->close();
?>


<div class="container-fluid">
    <br><br>

</div>
            <br>
            <h2 style="text-align:center">Compare your estimate with game spec!</h2>
            <br>

            <div class="row">
                <div class="col-md-6 text-center" style="border-right: 2px solid black">
                    <p><b>Estimate</b></p>
                </div>
                <div class="col-md-6 text-center">
                    <p><b>Game</b></p>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-6" style="border-right: 2px solid black">
                    <!-- 견적서 -->
                    
                        <div class="row">
                            <div class="col-md-3">
                                <p>Select Estimate </p>
                            </div>
                            <div class="col-md-9">
                                <select id="estimate2">
                                    <option value=0>--Select--</option>
                                </select>
                            </div>
                        </div>
                        <div><button class="btn" onclick="show_estimate()">Show</button></div>
                        <br>

                        <table class="table table-bordered">
                            <colgroup>
                                <col width=20%>
                                <col width=40%>
                                <col width=40%>
                            </colgroup>

                            <tr>
                                <th></th>
                                <th>Model</th>
                                <th>Score / GB / Price</th>
                            </tr>
                            <tr id="cpu_user">
                                <th>CPU</th>
                                <td id="user_cpu_model"></td>
                                <td id="user_cpu_score"></td>
                            </tr>
                            <tr id="gpu_user">
                                <th>GPU</th>
                                <td id="user_gpu_model"></td>
                                <td id="user_gpu_score"></td>
                            </tr>
                            <tr id="ram_user">
                                <th>RAM</th>
                                <td id="user_ram_model"></td>
                                <td id="user_ram_gb"></td>
                            </tr>
                            <tr id="price_user">
                                <th>PRICE</th>
                                <td>-</td>
                                <td id="user_price"></td>
                            </tr>
                        </table>
                    
                </div>

                <div class="col-md-6">
                    <!-- 게임 -->
                    
                        <div class="row">
                            <div class="col-md-3">
                                <p>Select Game </p>
                            </div>
                            <div class="col-md-9">
                                <select id="game">
                                    <option value=0>--Select--</option>
                                </select>
                            </div>
                        </div>
                        <div><button class="btn" onclick="show_game_spec()">Show</button></div>
                        <br>

                        <table class="table table-bordered">
                            <colgroup>
                                <col width=20%>
                                <col width=40%>
                                <col width=40%>
                            </colgroup>

                            <tr>
                                <th></th>
                                <th>Model / GB</th>
                                <th>Score</th>
                            </tr>
                            <tr id="cpu_game">
                                <th>CPU</th>
                                <td id="game_cpu_model"></td>
                                <td id="game_cpu_score"></td>
                            </tr>
                            <tr id="gpu_game">
                                <th>GPU</th>
                                <td id="game_gpu_model"></td>
                                <td id="game_gpu_score"></td>
                            </tr>
                            <tr id="ram_game">
                                <th>RAM</th>
                                <td id="game_ram_gb"></td>
                                <td>-</td>
                            </tr>
                        </table>
                    
                </div>
            </div>
            <hr>

            <br>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-primary" style="width:100%; height:60px" onclick="do_compare()">
                            <b style="font-size:30px"><i>Compare!</i></b>
                        </button>
                    </div>
                </div>
            </div>
        </div>
</div>

<script>
var names = [];
        var tmp = [];
        var tmp2 = [];
        var cnt = <?php echo count($game_name); ?>;
        var cnt2 = <?php echo count($estimate_no); ?>;
        var game_select = document.getElementById('game');
        var estimate_select = document.getElementById('estimate2');

        window.onload =function() {
            var selectEl = document.querySelector("#game");
            var selectEl2 =document.querySelector("#estimate2");
            //console.log(selectEl2);
            for (var i = 0; i < cnt; i++) {
                tmp.push(document.createElement("option"));
            }
            for (i = 0; i < 10; i++) {
                tmp2.push(document.createElement("option"));
            }
            
            tmp[0].text = "<?php echo $game_name[0]?>";
            tmp[0].value = <?php echo $game_id[0]?>;
            selectEl.options.add(tmp[0]);
            tmp[1].text = "<?php echo $game_name[1]?>";
            tmp[1].value = <?php echo $game_id[1]?>;
            selectEl.options.add(tmp[1]);
            tmp[2].text = "<?php echo $game_name[2]?>";
            tmp[2].value = <?php echo $game_id[2]?>;
            selectEl.options.add(tmp[2]);
            tmp[3].text = "<?php echo $game_name[3]?>";
            tmp[3].value = <?php echo $game_id[3]?>;
            selectEl.options.add(tmp[3]);
            tmp[4].text = "<?php echo $game_name[4]?>";
            tmp[4].value = <?php echo $game_id[4]?>;
            selectEl.options.add(tmp[4]);
            tmp[5].text = "<?php echo $game_name[5]?>";
            tmp[5].value = <?php echo $game_id[5]?>;
            selectEl.options.add(tmp[5]);
            tmp[6].text = "<?php echo $game_name[6]?>";
            tmp[6].value = <?php echo $game_id[6]?>;
            selectEl.options.add(tmp[6]);
            tmp[7].text = "<?php echo $game_name[7]?>";
            tmp[7].value = <?php echo $game_id[7]?>;
            selectEl.options.add(tmp[7]);
            tmp[8].text = "<?php echo $game_name[8]?>";
            tmp[8].value = <?php echo $game_id[8]?>;
            selectEl.options.add(tmp[8]);
            tmp[9].text = "<?php echo $game_name[9]?>";
            tmp[9].value = <?php echo $game_id[9]?>;
            selectEl.options.add(tmp[9]);
            tmp[10].text = "<?php echo $game_name[10]?>";
            tmp[10].value = <?php echo $game_id[10]?>;
            selectEl.options.add(tmp[10]);
            tmp[11].text = "<?php echo $game_name[11]?>";
            tmp[11].value = <?php echo $game_id[11]?>;
            selectEl.options.add(tmp[11]);
            tmp[12].text = "<?php echo $game_name[12]?>";
            tmp[12].value = <?php echo $game_id[12]?>;
            selectEl.options.add(tmp[12]);
            tmp[13].text = "<?php echo $game_name[13]?>";
            tmp[13].value = <?php echo $game_id[13]?>;
            selectEl.options.add(tmp[13]);
            tmp[14].text = "<?php echo $game_name[14]?>";
            tmp[14].value = <?php echo $game_id[14]?>;
            selectEl.options.add(tmp[14]);
            tmp[15].text = "<?php echo $game_name[15]?>";
            tmp[15].value = <?php echo $game_id[15]?>;
            selectEl.options.add(tmp[15]);
            tmp[16].text = "<?php echo $game_name[16]?>";
            tmp[16].value = <?php echo $game_id[16]?>;
            selectEl.options.add(tmp[16]);
            tmp[17].text = "<?php echo $game_name[17]?>";
            tmp[17].value = <?php echo $game_id[17]?>;
            selectEl.options.add(tmp[17]);
            tmp[18].text = "<?php echo $game_name[18]?>";
            tmp[18].value = <?php echo $game_id[18]?>;
            selectEl.options.add(tmp[18]);
            tmp[19].text = "<?php echo $game_name[19]?>";
            tmp[19].value = <?php echo $game_id[19]?>;
            selectEl.options.add(tmp[19]);
            tmp[20].text = "<?php echo $game_name[20]?>";
            tmp[20].value = <?php echo $game_id[20]?>;
            selectEl.options.add(tmp[20]);
            tmp[21].text = "<?php echo $game_name[21]?>";
            tmp[21].value = <?php echo $game_id[21]?>;
            selectEl.options.add(tmp[21]);
            tmp[22].text = "<?php echo $game_name[22]?>";
            tmp[22].value = <?php echo $game_id[22]?>;
            selectEl.options.add(tmp[22]);
            tmp[23].text = "<?php echo $game_name[23]?>";
            tmp[23].value = <?php echo $game_id[23]?>;
            selectEl.options.add(tmp[23]);
            tmp[24].text = "<?php echo $game_name[24]?>";
            tmp[24].value = <?php echo $game_id[24]?>;
            selectEl.options.add(tmp[24]);
            tmp[25].text = "<?php echo $game_name[25]?>";
            tmp[25].value = <?php echo $game_id[25]?>;
            selectEl.options.add(tmp[25]);
            tmp[26].text = "<?php echo $game_name[26]?>";
            tmp[26].value = <?php echo $game_id[26]?>;
            selectEl.options.add(tmp[26]);
            tmp[27].text = "<?php echo $game_name[27]?>";
            tmp[27].value = <?php echo $game_id[27]?>;
            selectEl.options.add(tmp[27]);
            tmp[28].text = "<?php echo $game_name[28]?>";
            tmp[28].value = <?php echo $game_id[28]?>;
            selectEl.options.add(tmp[28]);
            tmp[29].text = "<?php echo $game_name[29]?>";
            tmp[29].value = <?php echo $game_id[29]?>;
            selectEl.options.add(tmp[29]);
            tmp[30].text = "<?php echo $game_name[30]?>";
            tmp[30].value = <?php echo $game_id[30]?>;
            selectEl.options.add(tmp[30]);
            tmp[31].text = "<?php echo $game_name[31]?>";
            tmp[31].value = <?php echo $game_id[31]?>;
            selectEl.options.add(tmp[31]);
            tmp[32].text = "<?php echo $game_name[32]?>";
            tmp[32].value = <?php echo $game_id[32]?>;
            selectEl.options.add(tmp[32]);
            tmp[33].text = "<?php echo $game_name[33]?>";
            tmp[33].value = <?php echo $game_id[33]?>;
            selectEl.options.add(tmp[33]);
            tmp[34].text = "<?php echo $game_name[34]?>";
            tmp[34].value = <?php echo $game_id[34]?>;
            selectEl.options.add(tmp[34]);
            tmp[35].text = "<?php echo $game_name[35]?>";
            tmp[35].value = <?php echo $game_id[35]?>;
            selectEl.options.add(tmp[5]);
            tmp[36].text = "<?php echo $game_name[36]?>";
            tmp[36].value = <?php echo $game_id[36]?>;
            selectEl.options.add(tmp[6]);
            tmp[37].text = "<?php echo $game_name[37]?>";
            tmp[37].value = <?php echo $game_id[37]?>;
            selectEl.options.add(tmp[37]);
            tmp[38].text = "<?php echo $game_name[38]?>";
            tmp[38].value = <?php echo $game_id[38]?>;
            selectEl.options.add(tmp[8]);
            tmp[39].text = "<?php echo $game_name[39]?>";
            tmp[39].value = <?php echo $game_id[39]?>;
            selectEl.options.add(tmp[39]);
            tmp[40].text = "<?php echo $game_name[40]?>";
            tmp[40].value = <?php echo $game_id[40]?>;
            selectEl.options.add(tmp[40]);
            tmp[41].text = "<?php echo $game_name[41]?>";
            tmp[41].value = <?php echo $game_id[41]?>;
            selectEl.options.add(tmp[41]);
            tmp[42].text = "<?php echo $game_name[42]?>";
            tmp[42].value = <?php echo $game_id[42]?>;
            selectEl.options.add(tmp[42]);
            tmp[43].text = "<?php echo $game_name[43]?>";
            tmp[43].value = <?php echo $game_id[43]?>;
            selectEl.options.add(tmp[43]);
            tmp[44].text = "<?php echo $game_name[44]?>";
            tmp[44].value = <?php echo $game_id[44]?>;
            selectEl.options.add(tmp[44]);
            tmp[45].text = "<?php echo $game_name[45]?>";
            tmp[45].value = <?php echo $game_id[45]?>;
            selectEl.options.add(tmp[45]);
            tmp[46].text = "<?php echo $game_name[46]?>";
            tmp[46].value = <?php echo $game_id[46]?>;
            selectEl.options.add(tmp[46]);
            tmp[47].text = "<?php echo $game_name[47]?>";
            tmp[47].value = <?php echo $game_id[47]?>;
            selectEl.options.add(tmp[47]);
            tmp[48].text = "<?php echo $game_name[48]?>";
            tmp[48].value = <?php echo $game_id[48]?>;
            selectEl.options.add(tmp[48]);
            tmp[49].text = "<?php echo $game_name[49]?>";
            tmp[49].value = <?php echo $game_id[49]?>;
            selectEl.options.add(tmp[49]);
            tmp[50].text = "<?php echo $game_name[50]?>";
            tmp[50].value = <?php echo $game_id[50]?>;
            selectEl.options.add(tmp[50]);
            tmp[51].text = "<?php echo $game_name[51]?>";
            tmp[51].value = <?php echo $game_id[51]?>;
            selectEl.options.add(tmp[51]);
            tmp[52].text = "<?php echo $game_name[52]?>";
            tmp[52].value = <?php echo $game_id[52]?>;
            selectEl.options.add(tmp[52]);
            tmp[53].text = "<?php echo $game_name[53]?>";
            tmp[53].value = <?php echo $game_id[53]?>;
            selectEl.options.add(tmp[53]);
            tmp[54].text = "<?php echo $game_name[54]?>";
            tmp[54].value = <?php echo $game_id[54]?>;
            selectEl.options.add(tmp[54]);
            tmp[55].text = "<?php echo $game_name[55]?>";
            tmp[55].value = <?php echo $game_id[55]?>;
            selectEl.options.add(tmp[55]);
            tmp[56].text = "<?php echo $game_name[56]?>";
            tmp[56].value = <?php echo $game_id[56]?>;
            selectEl.options.add(tmp[56]);
            tmp[57].text = "<?php echo $game_name[57]?>";
            tmp[57].value = <?php echo $game_id[57]?>;
            selectEl.options.add(tmp[57]);
            tmp[58].text = "<?php echo $game_name[58]?>";
            tmp[58].value = <?php echo $game_id[58]?>;
            selectEl.options.add(tmp[58]);
            tmp[59].text = "<?php echo $game_name[59]?>";
            tmp[59].value = <?php echo $game_id[59]?>;
            selectEl.options.add(tmp[59]);
            tmp[60].text = "<?php echo $game_name[60]?>";
            tmp[60].value = <?php echo $game_id[60]?>;
            selectEl.options.add(tmp[60]);
            tmp[61].text = "<?php echo $game_name[61]?>";
            tmp[61].value = <?php echo $game_id[61]?>;
            selectEl.options.add(tmp[61]);
            tmp[62].text = "<?php echo $game_name[62]?>";
            tmp[62].value = <?php echo $game_id[62]?>;
            selectEl.options.add(tmp[62]);
            tmp[63].text = "<?php echo $game_name[63]?>";
            tmp[63].value = <?php echo $game_id[63]?>;
            selectEl.options.add(tmp[63]);
            tmp[64].text = "<?php echo $game_name[64]?>";
            tmp[64].value = <?php echo $game_id[64]?>;
            selectEl.options.add(tmp[64]);
            tmp[65].text = "<?php echo $game_name[65]?>";
            tmp[65].value = <?php echo $game_id[65]?>;
            selectEl.options.add(tmp[65]);
            tmp[66].text = "<?php echo $game_name[66]?>";
            tmp[66].value = <?php echo $game_id[66]?>;
            selectEl.options.add(tmp[66]);
            tmp[67].text = "<?php echo $game_name[67]?>";
            tmp[67].value = <?php echo $game_id[67]?>;
            selectEl.options.add(tmp[67]);
            tmp[68].text = "<?php echo $game_name[68]?>";
            tmp[68].value = <?php echo $game_id[68]?>;
            selectEl.options.add(tmp[68]);
            tmp[69].text = "<?php echo $game_name[69]?>";
            tmp[69].value = <?php echo $game_id[69]?>;
            selectEl.options.add(tmp[69]);
            tmp[70].text = "<?php echo $game_name[70]?>";
            tmp[70].value = <?php echo $game_id[70]?>;
            selectEl.options.add(tmp[70]);
            tmp[71].text = "<?php echo $game_name[71]?>";
            tmp[71].value = <?php echo $game_id[71]?>;
            selectEl.options.add(tmp[71]);
            tmp[72].text = "<?php echo $game_name[72]?>";
            tmp[72].value = <?php echo $game_id[72]?>;
            selectEl.options.add(tmp[72]);
            tmp[73].text = "<?php echo $game_name[73]?>";
            tmp[73].value = <?php echo $game_id[73]?>;
            selectEl.options.add(tmp[73]);
            tmp[74].text = "<?php echo $game_name[74]?>";
            tmp[74].value = <?php echo $game_id[74]?>;
            selectEl.options.add(tmp[74]);
            tmp[75].text = "<?php echo $game_name[75]?>";
            tmp[75].value = <?php echo $game_id[75]?>;
            selectEl.options.add(tmp[75]);
            tmp[76].text = "<?php echo $game_name[76]?>";
            tmp[76].value = <?php echo $game_id[76]?>;
            selectEl.options.add(tmp[76]);
            tmp[77].text = "<?php echo $game_name[77]?>";
            tmp[77].value = <?php echo $game_id[77]?>;
            selectEl.options.add(tmp[77]);
            tmp[78].text = "<?php echo $game_name[78]?>";
            tmp[78].value = <?php echo $game_id[78]?>;
            selectEl.options.add(tmp[78]);
            tmp[79].text = "<?php echo $game_name[79]?>";
            tmp[79].value = <?php echo $game_id[79]?>;
            selectEl.options.add(tmp[79]);
            tmp[80].text = "<?php echo $game_name[80]?>";
            tmp[80].value = <?php echo $game_id[80]?>;
            selectEl.options.add(tmp[80]);
            tmp[81].text = "<?php echo $game_name[81]?>";
            tmp[81].value = <?php echo $game_id[81]?>;
            selectEl.options.add(tmp[81]);
            tmp[82].text = "<?php echo $game_name[82]?>";
            tmp[82].value = <?php echo $game_id[82]?>;
            selectEl.options.add(tmp[82]);
            tmp[83].text = "<?php echo $game_name[83]?>";
            tmp[83].value = <?php echo $game_id[83]?>;
            selectEl.options.add(tmp[83]);
            tmp[84].text = "<?php echo $game_name[84]?>";
            tmp[84].value = <?php echo $game_id[84]?>;
            selectEl.options.add(tmp[84]);
            tmp[85].text = "<?php echo $game_name[85]?>";
            tmp[85].value = <?php echo $game_id[85]?>;
            selectEl.options.add(tmp[85]);
            tmp[86].text = "<?php echo $game_name[86]?>";
            tmp[86].value = <?php echo $game_id[86]?>;
            selectEl.options.add(tmp[86]);
            tmp[87].text = "<?php echo $game_name[87]?>";
            tmp[87].value = <?php echo $game_id[87]?>;
            selectEl.options.add(tmp[87]);
            tmp[88].text = "<?php echo $game_name[88]?>";
            tmp[88].value = <?php echo $game_id[88]?>;
            selectEl.options.add(tmp[88]);
            tmp[89].text = "<?php echo $game_name[89]?>";
            tmp[89].value = <?php echo $game_id[89]?>;
            selectEl.options.add(tmp[89]);
            tmp[90].text = "<?php echo $game_name[90]?>";
            tmp[90].value = <?php echo $game_id[90]?>;
            selectEl.options.add(tmp[90]);
            tmp[91].text = "<?php echo $game_name[91]?>";
            tmp[91].value = <?php echo $game_id[91]?>;
            selectEl.options.add(tmp[91]);
            tmp[92].text = "<?php echo $game_name[92]?>";
            tmp[92].value = <?php echo $game_id[92]?>;
            selectEl.options.add(tmp[92]);
            tmp[93].text = "<?php echo $game_name[93]?>";
            tmp[93].value = <?php echo $game_id[93]?>;
            selectEl.options.add(tmp[93]);
            tmp[94].text = "<?php echo $game_name[94]?>";
            tmp[94].value = <?php echo $game_id[94]?>;
            selectEl.options.add(tmp[94]);
            tmp[95].text = "<?php echo $game_name[95]?>";
            tmp[95].value = <?php echo $game_id[95]?>;
            selectEl.options.add(tmp[95]);
            tmp[96].text = "<?php echo $game_name[96]?>";
            tmp[96].value = <?php echo $game_id[96]?>;
            selectEl.options.add(tmp[96]);
            tmp[97].text = "<?php echo $game_name[97]?>";
            tmp[97].value = <?php echo $game_id[97]?>;
            selectEl.options.add(tmp[97]);
            tmp[98].text = "<?php echo $game_name[98]?>";
            tmp[98].value = <?php echo $game_id[98]?>;
            selectEl.options.add(tmp[98]);
            tmp[99].text = "<?php echo $game_name[99]?>";
            tmp[99].value = <?php echo $game_id[99]?>;
            selectEl.options.add(tmp[99]);

            tmp2[0].text = "<?php echo $estimate_no[0]?>";
            tmp2[0].value = <?php echo $estimate_no[0]?>;
            selectEl2.options.add(tmp2[0]);

            // 수정
            tmp2[1].text = "<?php echo $estimate_no[1]?>";
            tmp2[1].value = <?php echo $estimate_no[1]?>;
            selectEl2.options.add(tmp2[1]);
            tmp2[2].text = "<?php echo $estimate_no[2]?>";
            tmp2[2].value = <?php echo $estimate_no[2]?>;
            selectEl2.options.add(tmp2[2]);
            tmp2[3].text = "<?php echo $estimate_no[3]?>";
            tmp2[3].value = <?php echo $estimate_no[3]?>;
            selectEl2.options.add(tmp2[3]);
            tmp2[4].text = "<?php echo $estimate_no[4]?>";
            tmp2[4].value = <?php echo $estimate_no[4]?>;
            selectEl2.options.add(tmp2[4]);
            tmp2[5].text = "<?php echo $estimate_no[5]?>";
            tmp2[5].value = <?php echo $estimate_no[5]?>;
            selectEl2.options.add(tmp2[5]);
            tmp2[6].text = "<?php echo $estimate_no[6]?>";
            tmp2[6].value = <?php echo $estimate_no[6]?>;
            selectEl2.options.add(tmp2[6]);
            tmp2[7].text = "<?php echo $estimate_no[7]?>";
            tmp2[7].value = <?php echo $estimate_no[7]?>;
            selectEl2.options.add(tmp2[7]);
            tmp2[8].text = "<?php echo $estimate_no[8]?>";
            tmp2[8].value = <?php echo $estimate_no[8]?>;
            selectEl2.options.add(tmp2[8]);
            tmp2[9].text = "<?php echo $estimate_no[9]?>";
            tmp2[9].value = <?php echo $estimate_no[9]?>;
            selectEl2.options.add(tmp2[9]);
        }

        function show_game_spec() {
            document.getElementById("cpu_user").style.backgroundColor = "#FFFFFF";
            document.getElementById("gpu_user").style.backgroundColor = "#FFFFFF";
            document.getElementById("ram_user").style.backgroundColor = "#FFFFFF";
            document.getElementById("cpu_game").style.backgroundColor = "#FFFFFF";
            document.getElementById("gpu_game").style.backgroundColor = "#FFFFFF";
            document.getElementById("ram_game").style.backgroundColor = "#FFFFFF";

            switch (game_select.options[game_select.selectedIndex].value) {
                case "0":
                    document.getElementById("game_cpu_model").innerHTML = "";
                    document.getElementById("game_cpu_score").innerHTML = "";
                    document.getElementById("game_gpu_model").innerHTML = "";
                    document.getElementById("game_gpu_score").innerHTML = "";
                    document.getElementById("game_ram_gb").innerHTML = "";
                    break;
                case "1":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[0] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[0] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[0] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[0] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[0] ?>";
                    break;
                case "2":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[1] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[1] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[1] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[1] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[1] ?>";
                    break;
                case "3":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[2] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[2] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[2] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[2] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[2] ?>";
                    break;
                case "4":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[3] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[3] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[3] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[3] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[3] ?>";
                    break;
                case "5":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[4] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[4] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[4] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[4] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[4] ?>";
                    break;
                case "6":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[5] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[5] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[5] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[5] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[5] ?>";
                    break;
                case "7":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[6] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[6] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[6] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[6] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[6] ?>";
                    break;
                case "8":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[7] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[7] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[7] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[7] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[7] ?>";
                    break;
                case "9":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[8] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[8] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[8] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[8] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[8] ?>";
                    break;
                case "10":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[9] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[9] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[9] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[9] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[9] ?>";
                    break;
                case "11":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[10] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[10] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[10] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[10] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[10] ?>";
                    break;
                case "12":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[11] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[11] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[11] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[11] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[11] ?>";
                    break;
                case "13":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[12] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[12] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[12] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[12] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[12] ?>";
                    break;
                case "14":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[13] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[13] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[13] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[13] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[13] ?>";
                    break;
                case "15":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[14] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[14] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[14] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[14] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[14] ?>";
                    break;
                case "16":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[15] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[15] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[15] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[15] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[15] ?>";
                    break;
                case "17":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[16] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[16] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[16] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[16] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[16] ?>";
                    break;
                case "18":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[17] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[17] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[17] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[17] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[17] ?>";
                    break;
                case "19":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[18] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[18] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[18] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[18] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[18] ?>";
                    break;
                case "20":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[19] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[19] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[19] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[19] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[19] ?>";
                    break;
                case "21":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[20] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[20] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[20] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[20] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[20] ?>";
                    break;
                case "22":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[21] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[21] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[21] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[21] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[21] ?>";
                    break;
                case "23":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[22] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[22] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[22] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[22] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[22] ?>";
                    break;
                case "24":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[23] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[23] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[23] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[23] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[23] ?>";
                    break;
                case "25":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[24] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[24] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[24] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[24] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[24] ?>";
                    break;
                case "26":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[25] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[25] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[25] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[25] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[25] ?>";
                    break;
                case "27":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[26] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[26] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[26] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[26] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[26] ?>";
                    break;
                case "28":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[27] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[27] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[27] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[27] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[27] ?>";
                    break;
                case "29":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[28] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[28] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[28] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[28] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[28] ?>";
                    break;
                case "30":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[29] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[29] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[29] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[29] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[29] ?>";
                    break;
                case "31":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[30] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[30] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[30] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[30] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[30] ?>";
                    break;
                case "32":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[31] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[31] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[31] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[31] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[31] ?>";
                    break;
                case "33":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[32] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[32] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[32] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[32] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[32] ?>";
                    break;
                case "34":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[33] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[33] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[33] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[33] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[33] ?>";
                    break;
                case "35":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[34] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[34] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[34] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[34] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[34] ?>";
                    break;
                case "36":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[35] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[35] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[35] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[35] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[35] ?>";
                    break;
                case "37":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[36] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[36] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[36] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[36] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[36] ?>";
                    break;
                case "38":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[37] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[37] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[37] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[37] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[37] ?>";
                    break;
                case "39":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[38] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[38] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[38] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[38] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[38] ?>";
                    break;
                case "40":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[39] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[39] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[39] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[39] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[39] ?>";
                    break;
                case "41":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[40] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[40] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[40] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[40] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[40] ?>";
                    break;
                case "42":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[41] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[41] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[41] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[41] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[41] ?>";
                    break;
                case "43":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[42] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[42] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[42] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[42] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[42] ?>";
                    break;
                case "44":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[43] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[43] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[43] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[43] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[43] ?>";
                    break;
                case "45":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[44] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[44] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[44] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[44] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[44] ?>";
                    break;
                case "46":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[45] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[45] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[45] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[45] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[45] ?>";
                    break;
                case "47":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[46] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[46] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[46] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[46] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[46] ?>";
                    break;
                case "48":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[47] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[47] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[47] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[47] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[47] ?>";
                    break;
                case "49":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[48] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[48] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[48] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[48] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[48] ?>";
                    break;
                case "50":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[49] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[49] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[49] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[49] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[49] ?>";
                    break;
                case "51":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[50] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[50] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[50] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[50] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[50] ?>";
                    break;
                case "52":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[51] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[51] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[51] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[51] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[51] ?>";
                    break;
                case "53":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[52] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[52] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[52] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[52] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[52] ?>";
                    break;
                case "54":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[53] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[53] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[53] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[53] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[53] ?>";
                    break;
                case "55":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[54] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[54] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[54] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[54] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[54] ?>";
                    break;
                case "56":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[55] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[55] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[55] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[55] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[55] ?>";
                    break;
                case "57":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[56] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[56] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[56] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[56] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[56] ?>";
                    break;
                case "58":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[57] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[57] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[57] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[57] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[57] ?>";
                    break;
                case "59":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[58] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[58] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[58] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[58] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[58] ?>";
                    break;
                case "60":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[59] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[59] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[59] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[59] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[59] ?>";
                    break;
                case "61":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[60] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[60] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[60] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[60] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[60] ?>";
                    break;
                case "62":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[61] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[61] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[61] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[61] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[61] ?>";
                    break;
                case "63":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[62] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[62] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[62] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[62] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[62] ?>";
                    break;
                case "64":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[63] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[63] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[63] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[63] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[63] ?>";
                    break;
                case "65":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[64] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[64] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[64] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[64] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[64] ?>";
                    break;
                case "66":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[65] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[65] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[65] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[65] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[65] ?>";
                    break;
                case "67":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[66] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[66] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[66] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[66] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[66] ?>";
                    break;
                case "68":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[67] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[67] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[67] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[67] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[67] ?>";
                    break;
                case "69":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[68] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[68] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[68] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[68] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[68] ?>";
                    break;
                case "70":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[69] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[69] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[69] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[69] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[69] ?>";
                    break;
                case "71":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[70] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[70] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[70] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[70] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[70] ?>";
                    break;
                case "72":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[71] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[71] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[71] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[71] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[71] ?>";
                    break;
                case "73":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[72] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[72] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[72] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[72] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[72] ?>";
                    break;
                case "74":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[73] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[73] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[73] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[73] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[73] ?>";
                    break;
                case "75":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[74] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[74] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[74] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[74] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[74] ?>";
                    break;
                case "76":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[75] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[75] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[75] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[75] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[75] ?>";
                    break;
                case "77":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[76] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[76] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[76] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[76] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[76] ?>";
                    break;
                case "78":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[77] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[77] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[77] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[77] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[77] ?>";
                    break;
                case "79":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[78] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[78] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[78] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[78] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[78] ?>";
                    break;
                case "80":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[79] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[79] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[79] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[79] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[79] ?>";
                    break;
                case "81":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[80] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[80] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[80] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[80] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[80] ?>";
                    break;
                case "82":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[81] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[81] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[81] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[81] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[81] ?>";
                    break;
                case "83":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[82] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[82] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[82] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[82] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[82] ?>";
                    break;
                case "84":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[83] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[83] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[83] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[83] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[83] ?>";
                    break;
                case "85":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[84] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[84] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[84] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[84] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[84] ?>";
                    break;
                case "86":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[85] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[85] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[85] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[85] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[85] ?>";
                    break;
                case "87":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[86] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[86] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[86] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[86] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[86] ?>";
                    break;
                case "88":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[87] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[87] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[87] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[87] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[87] ?>";
                    break;
                case "89":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[88] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[88] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[88] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[88] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[88] ?>";
                    break;
                case "90":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[89] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[89] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[89] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[89] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[89] ?>";
                    break;
                case "91":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[90] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[90] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[90] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[90] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[90] ?>";
                    break;
                case "92":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[91] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[91] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[91] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[91] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[91] ?>";
                    break;
                case "93":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[92] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[92] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[92] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[92] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[92] ?>";
                    break;
                case "94":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[93] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[93] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[93] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[93] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[93] ?>";
                    break;
                case "95":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[94] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[94] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[94] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[94] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[94] ?>";
                    break;
                case "96":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[95] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[95] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[95] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[95] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[95] ?>";
                    break;
                case "97":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[96] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[96] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[96] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[96] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[96] ?>";
                    break;
                case "98":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[97] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[97] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[97] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[97] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[97] ?>";
                    break;
                case "99":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[98] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[98] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[98] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[98] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[98] ?>";
                    break;
                case "100":
                    document.getElementById("game_cpu_model").innerHTML = "<?php echo $game_cpu[99] ?>";
                    document.getElementById("game_cpu_score").innerHTML = "<?php echo $game_cpu_score[99] ?>";
                    document.getElementById("game_gpu_model").innerHTML = "<?php echo $game_gpu[99] ?>";
                    document.getElementById("game_gpu_score").innerHTML = "<?php echo $game_gpu_score[99] ?>";
                    document.getElementById("game_ram_gb").innerHTML = "<?php echo $game_ram_gb[99] ?>";
                    break;
            }
        }

        function show_estimate() {
            document.getElementById("cpu_user").style.backgroundColor = "#FFFFFF";
            document.getElementById("gpu_user").style.backgroundColor = "#FFFFFF";
            document.getElementById("ram_user").style.backgroundColor = "#FFFFFF";
            document.getElementById("cpu_game").style.backgroundColor = "#FFFFFF";
            document.getElementById("gpu_game").style.backgroundColor = "#FFFFFF";
            document.getElementById("ram_game").style.backgroundColor = "#FFFFFF";

            switch (estimate_select.options[estimate_select.selectedIndex].value) {
                case "0":
                    document.getElementById("user_cpu_model").innerHTML = "";
                    document.getElementById("user_cpu_score").innerHTML = "";
                    document.getElementById("user_gpu_model").innerHTML = "";
                    document.getElementById("user_gpu_score").innerHTML = "";
                    document.getElementById("user_ram_model").innerHTML = "";
                    document.getElementById("user_ram_gb").innerHTML = "";
                    document.getElementById("user_price").innerHTML = "";
                    break;
                case "1":
                    document.getElementById("user_cpu_model").innerHTML = "<?php echo $user_cpu[0]?>";
                    document.getElementById("user_cpu_score").innerHTML = "<?php echo $user_cpu_score[0]?>";
                    document.getElementById("user_gpu_model").innerHTML = "<?php echo $user_gpu[0]?>";
                    document.getElementById("user_gpu_score").innerHTML = "<?php echo $user_gpu_score[0]?>";
                    document.getElementById("user_ram_model").innerHTML = "<?php echo $user_ram[0]?>";
                    document.getElementById("user_ram_gb").innerHTML = "<?php echo $user_ram_gb[0]?>";
                    document.getElementById("user_price").innerHTML = "<?php echo $user_price[0]?>";
                    break;
                case "2":
                    document.getElementById("user_cpu_model").innerHTML = "<?php echo $user_cpu[1]?>";
                    document.getElementById("user_cpu_score").innerHTML = "<?php echo $user_cpu_score[1]?>";
                    document.getElementById("user_gpu_model").innerHTML = "<?php echo $user_gpu[1]?>";
                    document.getElementById("user_gpu_score").innerHTML = "<?php echo $user_gpu_score[1]?>";
                    document.getElementById("user_ram_model").innerHTML = "<?php echo $user_ram[1]?>";
                    document.getElementById("user_ram_gb").innerHTML = "<?php echo $user_ram_gb[1]?>";
                    document.getElementById("user_price").innerHTML = "<?php echo $user_price[1]?>";
                    break;
                case "3":
                    document.getElementById("user_cpu_model").innerHTML = "<?php echo $user_cpu[2]?>";
                    document.getElementById("user_cpu_score").innerHTML = "<?php echo $user_cpu_score[2]?>";
                    document.getElementById("user_gpu_model").innerHTML = "<?php echo $user_gpu[2]?>";
                    document.getElementById("user_gpu_score").innerHTML = "<?php echo $user_gpu_score[2]?>";
                    document.getElementById("user_ram_model").innerHTML = "<?php echo $user_ram[2]?>";
                    document.getElementById("user_ram_gb").innerHTML = "<?php echo $user_ram_gb[2]?>";
                    document.getElementById("user_price").innerHTML = "<?php echo $user_price[2]?>";
                    break;
                case "4":
                    document.getElementById("user_cpu_model").innerHTML = "<?php echo $user_cpu[3]?>";
                    document.getElementById("user_cpu_score").innerHTML = "<?php echo $user_cpu_score[3]?>";
                    document.getElementById("user_gpu_model").innerHTML = "<?php echo $user_gpu[3]?>";
                    document.getElementById("user_gpu_score").innerHTML = "<?php echo $user_gpu_score[3]?>";
                    document.getElementById("user_ram_model").innerHTML = "<?php echo $user_ram[3]?>";
                    document.getElementById("user_ram_gb").innerHTML = "<?php echo $user_ram_gb[3]?>";
                    document.getElementById("user_price").innerHTML = "<?php echo $user_price[3]?>";
                    break;
                case "5":
                    document.getElementById("user_cpu_model").innerHTML = "<?php echo $user_cpu[4]?>";
                    document.getElementById("user_cpu_score").innerHTML = "<?php echo $user_cpu_score[4]?>";
                    document.getElementById("user_gpu_model").innerHTML = "<?php echo $user_gpu[4]?>";
                    document.getElementById("user_gpu_score").innerHTML = "<?php echo $user_gpu_score[4]?>";
                    document.getElementById("user_ram_model").innerHTML = "<?php echo $user_ram[4]?>";
                    document.getElementById("user_ram_gb").innerHTML = "<?php echo $user_ram_gb[4]?>";
                    document.getElementById("user_price").innerHTML = "<?php echo $user_price[4]?>";
                    break;
                case "6":
                    document.getElementById("user_cpu_model").innerHTML = "<?php echo $user_cpu[5]?>";
                    document.getElementById("user_cpu_score").innerHTML = "<?php echo $user_cpu_score[5]?>";
                    document.getElementById("user_gpu_model").innerHTML = "<?php echo $user_gpu[5]?>";
                    document.getElementById("user_gpu_score").innerHTML = "<?php echo $user_gpu_score[5]?>";
                    document.getElementById("user_ram_model").innerHTML = "<?php echo $user_ram[5]?>";
                    document.getElementById("user_ram_gb").innerHTML = "<?php echo $user_ram_gb[5]?>";
                    document.getElementById("user_price").innerHTML = "<?php echo $user_price[5]?>";
                    break;
                case "7":
                    document.getElementById("user_cpu_model").innerHTML = "<?php echo $user_cpu[6]?>";
                    document.getElementById("user_cpu_score").innerHTML = "<?php echo $user_cpu_score[6]?>";
                    document.getElementById("user_gpu_model").innerHTML = "<?php echo $user_gpu[6]?>";
                    document.getElementById("user_gpu_score").innerHTML = "<?php echo $user_gpu_score[6]?>";
                    document.getElementById("user_ram_model").innerHTML = "<?php echo $user_ram[6]?>";
                    document.getElementById("user_ram_gb").innerHTML = "<?php echo $user_ram_gb[6]?>";
                    document.getElementById("user_price").innerHTML = "<?php echo $user_price[6]?>";
                    break;
                case "8":
                    document.getElementById("user_cpu_model").innerHTML = "<?php echo $user_cpu[7]?>";
                    document.getElementById("user_cpu_score").innerHTML = "<?php echo $user_cpu_score[7]?>";
                    document.getElementById("user_gpu_model").innerHTML = "<?php echo $user_gpu[7]?>";
                    document.getElementById("user_gpu_score").innerHTML = "<?php echo $user_gpu_score[7]?>";
                    document.getElementById("user_ram_model").innerHTML = "<?php echo $user_ram[7]?>";
                    document.getElementById("user_ram_gb").innerHTML = "<?php echo $user_ram_gb[7]?>";
                    document.getElementById("user_price").innerHTML = "<?php echo $user_price[7]?>";
                    break;
                case "9":
                    document.getElementById("user_cpu_model").innerHTML = "<?php echo $user_cpu[8]?>";
                    document.getElementById("user_cpu_score").innerHTML = "<?php echo $user_cpu_score[8]?>";
                    document.getElementById("user_gpu_model").innerHTML = "<?php echo $user_gpu[8]?>";
                    document.getElementById("user_gpu_score").innerHTML = "<?php echo $user_gpu_score[8]?>";
                    document.getElementById("user_ram_model").innerHTML = "<?php echo $user_ram[8]?>";
                    document.getElementById("user_ram_gb").innerHTML = "<?php echo $user_ram_gb[8]?>";
                    document.getElementById("user_price").innerHTML = "<?php echo $user_price[8]?>";
                    break;
                case "10":
                    document.getElementById("user_cpu_model").innerHTML = "<?php echo $user_cpu[9]?>";
                    document.getElementById("user_cpu_score").innerHTML = "<?php echo $user_cpu_score[9]?>";
                    document.getElementById("user_gpu_model").innerHTML = "<?php echo $user_gpu[9]?>";
                    document.getElementById("user_gpu_score").innerHTML = "<?php echo $user_gpu_score[9]?>";
                    document.getElementById("user_ram_model").innerHTML = "<?php echo $user_ram[9]?>";
                    document.getElementById("user_ram_gb").innerHTML = "<?php echo $user_ram_gb[9]?>";
                    document.getElementById("user_price").innerHTML = "<?php echo $user_price[9]?>";
                    break;
            }
        }

        function do_compare() {
            var cpu1 = document.getElementById("user_cpu_score").innerHTML;
            var cpu2 = document.getElementById("game_cpu_score").innerHTML;
            if (parseInt(cpu1) > parseInt(cpu2)) {          //점수가 높은쪽 색 변경
                document.getElementById("cpu_user").style.backgroundColor = "#D6FFB2";
            }
            else if (parseInt(cpu1) == parseInt(cpu2)) {        //점수가 같으면 색변경
                document.getElementById("cpu_user").style.backgroundColor = "#F8F87F";
                document.getElementById("cpu_game").style.backgroundColor = "#F8F87F";
            }
            else if (parseInt(cpu1) < parseInt(cpu2)) { //점수가 더 작으면 색 변경
                document.getElementById("cpu_game").style.backgroundColor = "#D6FFB2";
            }

            var gpu1 = document.getElementById("user_gpu_score").innerHTML;    
            var gpu2 = document.getElementById("game_gpu_score").innerHTML;
            if (parseInt(gpu1) > parseInt(gpu2)) {
                document.getElementById("gpu_user").style.backgroundColor = "#D6FFB2";
            }
            else if (parseInt(gpu1) == parseInt(gpu2)) {
                document.getElementById("gpu_user").style.backgroundColor = "#F8F87F";
                document.getElementById("gpu_game").style.backgroundColor = "#F8F87F";
            }
            else if (parseInt(gpu1) < parseInt(gpu2)) {
                document.getElementById("gpu_game").style.backgroundColor = "#D6FFB2";
            }

            var ram1 = document.getElementById("user_ram_gb").innerHTML;
            var ram2 = document.getElementById("game_ram_gb").innerHTML;
            if (parseInt(ram1) > parseInt(ram2)) {
                document.getElementById("ram_user").style.backgroundColor = "#D6FFB2";
            }
            else if (parseInt(ram1) == parseInt(ram2)) {
                document.getElementById("ram_user").style.backgroundColor = "#F8F87F";
                document.getElementById("ram_game").style.backgroundColor = "#F8F87F";
            }
            else if (parseInt(ram1) < parseInt(ram2)) {
                document.getElementById("ram_game").style.backgroundColor = "#D6FFB2";
            }
        }
</script>
</body>
</html>








