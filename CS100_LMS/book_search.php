<html>
<body>
  <?php
    $bname=$_POST["bname"];
    $aname=$_POST["aname"];

    $lines=file("books.txt");

    $flag=0;

    foreach ($lines as $line) {
      $parts=explode('; ', $line);
      if(isset($bname)) {
        if($bname==$parts[1]){
          $flag=1;
        }
        else
        echo"The requeseted book does not exist in the library at the moment";
      }
    }

   ?>
</body>
</html>
