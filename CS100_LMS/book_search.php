<html>
<body>
  <?php
    $bname=$_POST["bname"];
    $aname=$_POST["aname"];

    $lines=file("books.txt");

    $flag=0;

    foreach ($lines as $line) {
      $parts=explode('; ', $line);
      if (isset($bname))
      {
        if ( strcasecmp($bname,$parts[1] == 0 ))           //==0 means book name found
        {
          $book=$parts;
          $flag=1;
        }
        else
        echo"The requeseted book does not exist in the library at the moment";
      }
      else if (isset($aname))
      {
        if (strcasecmp($aname, $parts[2] == 0))
        {
          $book=$parts;
          $flag=1;
        }
      }
    }

    if ($flag == 1)
    {
      
    }


   ?>
</body>
</html>
