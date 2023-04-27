<html>
<body>

<?php
	$file=fopen('issue.txt','a+');
	$bookid=$_POST["bookid"];
	$result='';

	$lines=file('issue.txt');
	foreach($lines as $line){
		if(stripos($line,$bookid) === false){
		$result.=$line;
		}
	}

	file_put_contents('issue.txt', $result);
	fclose($file);
	echo "Book returned";
?>

</body>
</html>
