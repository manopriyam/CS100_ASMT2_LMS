<html>
<body>


<div style='text-align : center; padding : 100; padding-bottom : 50; font-size : 60; font-family : Verdana, Sans-serif'>
    BOOK STATUS
</div>


<?php


$e1 = $_POST["bid"];

$lines=file("books.txt");
$flag=0;
foreach ( $lines as $line ) {
	$parts = explode('; ', $line);
	if ( $e1 == $parts[0] )
	{
		$book_details=$parts;
		$flag = 1;
	}
}

function unavailable($bid) {
    $flag = 0;
    $lines = file("issue_return.txt");
    foreach ($lines as $line) {
        $parts = explode('; ', $line);
        if ( $bid == $parts[0] ) {
            if ( !$parts[4] ) {
                $flag = $parts;
            }
            else {
                $flag = NULL;
            }
        }
    }
    return $flag;
}

function student($sid) {
    $lines = file("users.txt");
    foreach ($lines as $line) {
        $parts = explode('; ', $line);
        if ( $sid == $parts[1] ) {
            return $parts[0];
        }
    }
	return;
}

echo "
	<div style='padding-left : 25%; font-size : 20; font-family : Verdana, Sans-serif'>
	<br><br>
";

echo "
	<table>
		<tr>
			<td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Book ID  :</td>
			<td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$book_details[0]</td>
		</tr>
		<tr>
			<td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Book Name  :</td>
			<td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$book_details[1]</td>
		</tr>
		<tr>
			<td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Author  :</td>
			<td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$book_details[2]</td>
		</tr>
";

if ( unavailable($e1) ) {
	$log=unavailable($e1);
	$status= "Unavailable";
	$sname=student($log[1]);
	echo "	
		<tr>
			<td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Availability  :</td>
			<td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$status</td>
		</tr>
		<tr>
			<td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Student ID  :</td>
			<td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$log[1]</td>
		</tr>
		<tr>
			<td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Student Name  :</td>
			<td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$sname</td>
		</tr>
		<tr>
			<td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Due Date :</td>
			<td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$log[3]</td>
		</tr>
	</table>
	";
}
else {
	$status ="Available";
	echo "
		<tr>
			<td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Availability  :</td>
			<td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$status</td>
		</tr>
	</table>
    ";
}


?>


<br><br>

<a href='admin_login.php' style='font-size : 20; font-family : Verdana, Sans-serif'>
    <button style="width : 100; height : 40; border-radius : 5px; border : 2px solid">
        <b>NEXT</b>
    </button>
</a>

</div>


</body>
</html>
