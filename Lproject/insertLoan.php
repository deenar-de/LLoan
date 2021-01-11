<?php
    session_start();
    header("Content-Type: text/html; charset=utf-8");
    include("connMysql.php");
    $reason=$_SESSION['reason'];
    $loan=$_SESSION['loan'];
    $period=$_SESSION['period'];
    $description=$_SESSION['description'];
    $iRate=$_SESSION['iRate'];
    // $cRate=$_SESSION['cRate'];
    $mId=$_COOKIE['mId'];
    $NowTime=date("Y-m-d H:i:s");
    $startTime=strtotime("$NowTime,now");
    $endTime=strtotime("+$period month");
    $sign=$_SESSION['sign'];
    // echo  $_SESSION['sign'];

    if (!$db_link) die("資料庫選擇失敗！");
        $sql_query2="SELECT MAX(lId)+1 AS lId FROM loan";
        $result2=mysqli_query($db_link, $sql_query2);
        $lId;
        while($row = mysqli_fetch_assoc($result2)) {
            $lId=$row['lId'];
        }
        $sql_query="INSERT INTO loan (lId,mId,reason,loan,period,description,iRate,startTime,endTime,progress,sign) 
                    VALUES('$lId','$mId','$reason','$loan','$period','$description','$iRate',$startTime,$endTime,0,'$sign')";
                    
        mysqli_query($db_link, $sql_query);
   
        ?>
        <script>alert("借貸成功");</script>
        <?php
        header("Refresh:0;url=LLoan_main.php");
?>