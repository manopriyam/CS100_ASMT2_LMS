<html>
<body>


<div style='text-align : center; padding : 100; font-size : 60; font-family : Verdana, Sans-serif'>
    CHECK USER HISTORY
</div>


<?php


$e1=$_POST["sid"];

echo "<div style='padding : 5%; padding-top : 0%; font-size : 20; font-family : Verdana, Sans-serif'>";

$lines1 = file("users.txt");
foreach ($lines1 as $line) {
    $parts = explode('; ', $line);
    if ( $e1 == $parts[1] ) {
        $user_rec=$parts;
        break;
    }
}

echo "
	<table style='margin-left: auto; margin-right: auto'>
		<tr>
			<td style='font-size : 20; font-family : Verdana, Sans-serif' width=175px>Student ID  :</td> 
			<td style='width : 300px; font-size : 20; font-family : Verdana, Sans-serif'>$e1</td>
		
			<td style='font-size : 20; font-family : Verdana, Sans-serif' width=175px>Student Name  :</td> 
			<td style='width : 300px; font-size : 20; font-family : Verdana, Sans-serif'>$user_rec[0]</td>
		</tr>
	</table>
";

echo "<br><br>";

echo "
	<table border='2'>
		<tr>
			<td style='width : 100px; font-size : 18; font-family : Verdana, Sans-serif; text-align : center; padding : 2px'>
				<b>BOOK ID</b>
			</td> 
			<td style='width : 300px; font-size : 18; font-family : Verdana, Sans-serif; text-align : center; padding : 2px'>
				<b>BOOK NAME</b>
			</td> 
			<td style='width : 175px; font-size : 18; font-family : Verdana, Sans-serif; text-align : center; padding : 2px'>
				<b>AUTHOR NAME</b>
			</td> 
			<td style='width : 180px; font-size : 18; font-family : Verdana, Sans-serif; text-align : center; padding : 2px'>
				<b>DATE OF ISSUE</b>
			</td> 
			<td style='width : 180px; font-size : 18; font-family : Verdana, Sans-serif; text-align : center; padding : 2px'>
				<b>DUE DATE</b>
			</td> 
			<td style='width : 180px; font-size : 18; font-family : Verdana, Sans-serif; text-align : center; padding : 2px'>
				<b>DATE OF RETURN</b>
			</td> 
			<td style='width : 100px; font-size : 18; font-family : Verdana, Sans-serif; text-align : center; padding : 2px'>
				<b>FINE</b>
			</td> 
			<td style='width : 100px; font-size : 18; font-family : Verdana, Sans-serif; text-align : center; padding : 2px'>
				<b>ACTION</b>
			</td> 
		</tr>
";

function book_details($bid) {
	$lines = file("books.txt");
	foreach ( $lines as $line ) {
		$parts = explode('; ', $line);
		if ( $bid == $parts[0] ) {
			return $parts;
		}
	}
}

$lines=file("issue_return.txt");

foreach ($lines as $line) {
    $parts = explode('; ', $line);
    if ( $parts[1] == $e1 ) { 
		$book_rec=book_details($parts[0]); 
		if ( $parts[4] ) {
			$action="Returned";
		}
		else {
			$action="Issued";
		}
		echo "
		<tr>
			<td style='width : 100px; font-size : 18; font-family : Verdana, Sans-serif; text-align : center; padding : 2px'>
				$book_rec[0]
			</td> 
			<td style='width : 300px; font-size : 18; font-family : Verdana, Sans-serif; text-align : center; padding : 2px'>
				$book_rec[1]
			</td> 
			<td style='width : 175px; font-size : 18; font-family : Verdana, Sans-serif; text-align : center; padding : 2px'>
				$book_rec[2]
			</td> 
			<td style='width : 180px; font-size : 18; font-family : Verdana, Sans-serif; text-align : center; padding : 2px'>
				$parts[2]
			</td> 
			<td style='width : 180px; font-size : 18; font-family : Verdana, Sans-serif; text-align : center; padding : 2px'>
				$parts[3]
			</td> 
			<td style='width : 180px; font-size : 18; font-family : Verdana, Sans-serif; text-align : center; padding : 2px'>
				$parts[4]
			</td> 
			<td style='width : 100px; font-size : 18; font-family : Verdana, Sans-serif; text-align : center; padding : 2px'>
				$parts[5]
			</td> 
			<td style='width : 100px; font-size : 18; font-family : Verdana, Sans-serif; text-align : center; padding : 2px'>
				$action
			</td> 
		</tr>
		";
	}
}

echo "
	</table>
";


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
