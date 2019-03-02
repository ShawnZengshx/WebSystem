<?php

$out_trade_no = uniqid();
$subject = "TOEFL考试报名费用";
$total_amount = 10;
$body = "test";
?>

正在跳转至支付界面......
<form name="alipaysubmit" action="../Alipay/pagepay/pagepay.php" method="post">
    <input type="hidden" name="WIDout_trade_no" id="WIDout_trade_no" value=<?php echo  $out_trade_no ?> >
    <input type="hidden" name="WIDsubject" id="WIDsubject" value=<?php echo $subject ?> >
    <input type="hidden" name="WIDtotal_amount" id="WIDtotal_amount" value=<?php echo $total_amount ?> >
    <input type="hidden" name="WIDbody" id="WIDbody" value=<?php echo $body ?> >
    <input type="hidden" name="notify_url" value="../Alipay/notify_url.php">
    <input type="hidden" name="return_url" value="../Alipay/return_url.php">
    <input type="submit" style="display: none;" value="ok">
</form>
<script>document.forms['alipaysubmit'].submit()</script>
</body>
</html>
