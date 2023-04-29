<html>
<body>
  <?php
    $bid = $_POST["bid"];
    $lines=file("books.txt");
    $flag=0;
    $flag2=0;
    $lines2 = file("issue_return.txt");

    foreach ( $lines as $line )
    {
      $parts = explode('; ', $line);
      if ( $bid == $parts[0] )
      {
        $book_details=$parts;
        $flag = 1;
      }
    }

    foreach ( $lines2 as $line2 )
    {
      $parts2 = explode('; ', $line2);
      if ( $bid == $parts2[0] )
      {
        $avail=$parts2;
        if ( !$parts2[4] )
        {
          $flag2=1;
        }
        else
        {
          $flag2=0;
        }
      }
    }

    if($flag2==1) {
      $status= "Unavailable";
      $sid=$avail[1];
      $dd=$avail[3];
    }
    else {
      $status ="Available";
      $sid=" ";
      $dd=" ";
    }

    if($flag==1){
      echo "
          <div style='text-align : center; padding : 100;  padding-bottom : 50; font-size : 60; font-family : Verdana, Sans-serif'>
          BOOK STATUS
          <br><br>
          </div>

          <div style='padding-left : 40%; padding-bottom : 20%; font-size : 20; font-family : Verdana, Sans-serif'>
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
              <tr>
                  <td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Availability  :</td>
                  <td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$status</td>
              </tr>
              <tr>
                  <td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Student ID  :</td>
                  <td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$sid</td>
              </tr>
              <tr>
                  <td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Due Date :</td>
                  <td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$dd</td>
              </tr>
          </table>
          </div>
        ";
    }
    else
    echo"The requested book is not in stock";
   ?>
</body>
</html>
