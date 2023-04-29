<html>
<body>


<div style='text-align : center; padding : 100; font-size : 60; font-family : Verdana, Sans-serif'>
    ADDING BOOK TO LIBRARY
</div>


<?php


$e1=$_POST["bid"];
$e2=strtoupper($_POST["bname"]);
$e3=strtoupper($_POST["aname"]);

$data=$e1."; ".$e2."; ".$e3.PHP_EOL;

$flag = 1;
$lines=file('books.txt');
foreach ( $lines as $line ) {
    $parts=explode('; ', $line);
    if ( $e1==$parts[0] ) {
		$flag=0;
		$rec=$parts;
	}
}

if ( $flag==1 ) {
	$file=fopen('books.txt','a');
	fwrite($file, $data);
	fclose($file);
	
	echo "
		<div style='padding-left : 25%; font-size : 20; font-family : Verdana, Sans-serif'>
		The following book has been successfuly added to the library.
		<br><br>
	";

	echo "
		<table>
			<tr>
				<td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Book ID  :</td> 
				<td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$e1</td>
			</tr>
			<tr>
				<td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Book Name  :</td> 
				<td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$e2</td>
			</tr>
			<tr>
				<td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Author  :</td> 
				<td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$e3</td>
			</tr>
		</table>
	";
}
else {	
	echo "
		<div style='padding-left : 25%; font-size : 20; font-family : Verdana, Sans-serif'>
		A book with the given Book ID already exists.
		<br><br>
	";

	echo "
		<table>
			<tr>
				<td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Book ID  :</td> 
				<td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$rec[0]</td>
			</tr>
			<tr>
				<td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Book Name  :</td> 
				<td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$rec[1]</td>
			</tr>
			<tr>
				<td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Author  :</td> 
				<td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$rec[2]</td>
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



</body>
</html>
