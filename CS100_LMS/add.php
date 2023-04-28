<html>
<body>
  <?php
    $e1=$_POST["bookid"];
    $e2=$_POST["bookname"];
    $e3=$_POST["bookname"];
    $data=$e1."; ".$e2."; ".$e3."; ".PHP_EOL;

    $file = fopen('books.txt','a+');
    $lines=file('books.txt');


    $flag = 1;
    foreach($lines as $line){
      $parts=explode('; ', $line);
      if ($e1==$parts[0]){
        $flag=0;
      }
    }

    if($flag==1){
      fwrite($file, $data);
      echo"Book added to library";
    }
    else {
      echo "<script> location.href='admin_login.php' </script>";
    }

    fclose($file);
   ?>
</body>

</html>
