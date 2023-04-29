<html>
<body>
  <?php
    $bname=$_POST["bname"];
    $aname=$_POST["aname"];

    $lines=file("books.txt");

    $flag=0;

    echo "<div style='font-size : 30; font-family : Verdana, Sans-serif; padding-left : 30%; padding-bottom : 10%'>
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
        </tr>";

    foreach ($lines as $line) {
      $parts=explode('; ', $line);
      if (isset($bname))
      {
        if ( strcasecmp($bname,$parts[1]) == 0 )           //==0 means book name found
        {
          echo"
          <tr>
              <td style='width : 125px; font-size : 16; font-family : Verdana, Sans-serif; text-align : center; padding : 4px'>
                  $parts[0]
              </td>
              <td style='width : 400px; font-size : 16; font-family : Verdana, Sans-serif; padding : 4px'>
                  $parts[1]
              </td>
              <td style='width : 200px; font-size : 16; font-family : Verdana, Sans-serif; padding : 4px'>
                  $parts[2]
              </td>
          </tr>

      ";
        }
      }
      else if (isset($aname))
      {
        echo"hello";
        if (strcasecmp($aname, $parts[2]) == 0)
        {
          echo"
          <tr>
              <td style='width : 125px; font-size : 16; font-family : Verdana, Sans-serif; text-align : center; padding : 4px'>
                  $parts[0]
              </td>
              <td style='width : 400px; font-size : 16; font-family : Verdana, Sans-serif; padding : 4px'>
                  $parts[1]
              </td>
              <td style='width : 200px; font-size : 16; font-family : Verdana, Sans-serif; padding : 4px'>
                  $parts[2]
              </td>
          </tr>
      ";
        }
      }
    }
   ?>
 </table>
 </div>
</body>
</html>
