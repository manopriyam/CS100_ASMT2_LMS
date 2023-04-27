<html>
<body>

<div style='text-align : center; padding : 100; font-size : 60; font-family : Verdana, Sans-serif'>
    REGISTRATION SUCCESSFUL
</div>

<div style='padding-left : 25%; font-size : 20; font-family : Verdana, Sans-serif'>

User has been successfully registered with the following credentials.

<br><br><br>

<?php 

$e1 = $_POST["name"];
$e2 = $_POST["sid"];
$e3 = $_POST["pass"];

$data = $e1."; ".$e2."; ".$e3.PHP_EOL;

$file = fopen('userinfo.txt', 'a');
fwrite ($file, $data);
fclose($file);

echo "
    <table>
        <tr style='border : 1px solid'>
            <td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Name :</td> 
            <td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$e1</td>
        </tr>
        <tr style='border : 1px solid'>
            <td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Student ID :</td> 
            <td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$e2</td>
        </tr>
    </table>
";

?>

<br><br>

<a href='student.php' style='font-size : 20; font-family : Verdana, Sans-serif'>SIGN IN</a>

</div>

</body>
</html>
