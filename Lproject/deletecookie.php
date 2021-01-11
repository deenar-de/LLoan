<?php
    setcookie("account", "", time() - 36000); 
    setcookie("authority", "", time() - 36000); 
    setcookie("rStage", "", time() - 36000); 
    setcookie("mId", "", time() - 36000); 
    header("Location: LLoan_main.php");
?>