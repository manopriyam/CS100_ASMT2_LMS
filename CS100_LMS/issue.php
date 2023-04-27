<html>
<body>
  <?php
    $e1 = $_POST["bookid"];
    $e2 = $_POST["studid"];
    $file=fopen('issue.txt', 'a+');

    $data=$e1."; ".$e2.PHP_EOL;
    $record=explode('; ', $data);
    $bookid=$record[0];

    $flag=1;

    $lines=file('issue.txt');

    foreach($lines as $line)
    {
      $parts = explode('; ', $line);
      if($bookid==$parts[0])
      {
        $flag=0;
        break;
      }
    }

    if($flag==0)
    {
      echo "Book already issued";
    }
    else
    {
        fwrite($file, $data);
        echo "Book issue successful";
    }
    fclose($file);
   ?>
</body>
</html>
