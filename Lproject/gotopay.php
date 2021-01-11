<?php
$lId = $_GET['lId'];
$pNum = $_GET['pNum'];
?>
<script>
    var c = confirm("確認付款");
    if (c == true) {
        window.location.href = ("gotopay1.php?lId=<?php echo $lId ?>&pNum=<?php echo $pNum ?>");
    } else {
        window.location.href =('myContract.php');
    }
</script>
