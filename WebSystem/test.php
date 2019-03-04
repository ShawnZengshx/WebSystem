
<form action="test.php" method="post">
    <input type="submit" value="确认！" name="submit" />
</form>
<?php
/**
 * Created by PhpStorm.
 * User: cengshengxing
 * Date: 2019-03-04
 * Time: 17:04
 */

if(isset($_POST['submit'])){
    echo '<script>alert("haha")</script>';
}