<html>
<body>

<div style="font-size : 30; font font-family : Verdana, Sans-serif; padding : 5%">

<?php 

$e1 = $_POST["sid"];
$e2 = $_POST["pass"];

$flag = 0;

$lines = file("users.txt");

foreach ($lines as $line) {
    $parts = explode('; ', $line);
    if ( $e1 == $parts[1] ) {
        if ( $e2 == $parts[2] ) {
            $flag = 1;
        }
        else {
            $flag = 2;
        }
        break;
    }
}

if ( $flag == 1 ) {
    echo "<script> location.href='user_login.php' </script>";
    exit();
}
else if ( $flag == 2 ) {
    echo "<script> location.href='student.php' </script>";
    exit();
}
else {
    echo "<script> location.href='new.php' </script>";
    exit();
}

?>

</div>

</body>
</html>
