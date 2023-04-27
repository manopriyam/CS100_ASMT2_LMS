<html>
<body>

<?php

$adminkey = "123";

if ( $_POST["adminpass"] == $adminkey ) {
    echo "<script> location.href='admin_login.php' </script>";
    exit();
}
else {
    echo "<script> location.href='admin.php' </script>";
    exit();
}

?>

</body>
</html>
