<html>
<body>


<div style='text-align : center; padding : 100; padding-bottom : 50; font-size : 60; font-family : Verdana, Sans-serif'>
    BOOK SEARCH RESULTS
</div>


<?php


echo "
	<div style='padding-left : 25%; padding-bottom : 100; font-size : 20; font-family : Verdana, Sans-serif'>
	<br><br>
";

echo "
<table border='2'>
    <tr>
        <td style='width : 125px; font-size : 18; font-family : Verdana, Sans-serif; text-align : center; padding : 2px'>
            <b>BOOK ID</b>
        </td>
        <td style='width : 400px; font-size : 18; font-family : Verdana, Sans-serif; text-align : center; padding : 2px'>
            <b>BOOK NAME</b>
        </td>
        <td style='width : 200px; font-size : 18; font-family : Verdana, Sans-serif; text-align : center; padding : 2px'>
            <b>AUTHOR NAME</b>
        </td>
    </tr>
";

$bname=strtoupper($_POST["bname"]);
$aname=strtoupper($_POST["aname"]);

$lines=file("books.txt");

foreach ( $lines as $line ) {
    $parts=explode('; ', $line);
    if ( $parts[1]==$bname ) {
        $rec=$parts;
    }
    else if ( trim($parts[2])==$aname ) {
        $rec=$parts;
    }        
    else {
        $rec=NULL;
    }
    if ( $rec ) {
        echo "
            <tr>
                <td style='width : 125px; font-size : 16; font-family : Verdana, Sans-serif; text-align : center; padding : 4px'>
                    $rec[0]
                </td>
                <td style='width : 400px; font-size : 16; font-family : Verdana, Sans-serif; padding : 4px'>
                    $rec[1]
                </td>
                <td style='width : 200px; font-size : 16; font-family : Verdana, Sans-serif; padding : 4px'>
                    $rec[2]
                </td>
            </tr>
        ";
    }
}


?>

</table>

<br><br>

<a href='user_login.php' style='font-size : 20; font-family : Verdana, Sans-serif'>
    <button style="width : 100; height : 40; border-radius : 5px; border : 2px solid">
        <b>NEXT</b>
    </button>
</a>

</div>


</body>
</html>
