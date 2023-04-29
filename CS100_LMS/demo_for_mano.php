<html>
  <head>
      <style>
          .wrapper {
              display: flex;
              justify-content: center;
          }

          .circle {
              height: 100px;
              width: 100px;
              background-color: #EBB02D;
              border: 20px;
              border-radius: 100px;
              top: 35px;
              position: relative;
          }

          .circlein {
            height: 85px;
            width: 85px;
            background-color: #FFFFFF;
            border-radius: 90px;
            top: 5%;
            left: 5%;
            position: absolute;
          }

          @keyframes blink{
            from {left: 10px;}
            to {left: 50px;}
          }

          .eye {
            height: 30px;
            width: 30px;
            background-color: #617A55;
            border-radius: 30px;
            top: 10%;
            left: 10%;
            position: absolute;
            animation-name: blink;
            animation-duration: 2s;
            animation-iteration-count: infinite;
            animation-direction: alternate;
          }

          div {
            font-size: 150px;
            font-weight: bold;
            font-family: "Ink Free"
          }

          #div1{
            color: #83BD75;
          }
          #div2{
            color: #FF6D60;
          }
          #div3{
            color: #5FD068;
          }
          #div4{
            color: #E5890A;
          }
          #div5{
            color: #4CACBC;
          }
          #div6{
            color: #F97B22;
          }

        </style>
  </head>

  <body>
    <div class="wrapper" style='padding-top: 3%'>
      <div id="div1">B</div>
      <div class="circle">
        <div class="circlein"><div class="eye">
          </div>
        </div>
      </div>
      <div class="circle">
        <div class="circlein">
          <div class="eye"></div>
        </div>
      </div>
      <div id="div2">K</div>
      <div id="div3">W</div>
      <div id="div4">O</div>
      <div id="div5">R</div>
      <div id="div6">M</div>
    </div>


<div style="float : left; width : 60%">
    <div style="text-align : center; padding : 100;  padding-bottom : 50; font-size : 60; font-family : Verdana, Sans-serif">
        LIBRARY BOOK LIST
    </div>

    <div style='padding-left : 10%; padding-bottom : 10%; font-size : 20; font-family : Verdana, Sans-serif'>
    The following books are available for issuing.
    <br><br><br>

    <?php

    function check_availability($bid) {
        $flag = 1;
        $lines = file("issue_return.txt");
        foreach ($lines as $line) {
            $parts = explode('; ', $line);
            if ( $bid == $parts[0] ) {
                if ( !$parts[4] ) {
                    $flag = 0;
                }
                else {
                    $flag = 1;
                }
            }
        }
        return $flag;
    }

    $lines = file("books.txt");

    echo "
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
            </tr>
    ";

    foreach ($lines as $line) {
        $parts = explode('; ', $line);
        if ( check_availability($parts[0]) ) {
            echo "
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

    echo "
        </table>
    ";

    ?>

    </div>
</div>


<div style="float : right; width : 40%">
    <div style="text-align : center; padding : 100;  padding-bottom : 50; font-size : 35; font-family : Verdana, Sans-serif">
        ISSUE / RETURN
    </div>

    <div style="padding-left : 20%; font-size : 20; font-family : Verdana, Sans-serif">

    <form action="issue_return.php" method="post">
        <table>
            <tr>
                <td style="font-size : 20; font-family : Verdana, Sans-serif" width=175px>Book ID :</td>
                <td><input type="text" name="bid" style="width : 200px; font-size : 25" required></td>
            </tr>
            <tr>
                <td style="font-size : 20; font-family : Verdana, Sans-serif" width=175px>Student ID :</td>
                <td><input type="text" name="sid" style="width : 200px; font-size : 25" required></td>
            </tr>
            <tr>
                <td style="font-size : 20; font-family : Verdana, Sans-serif" width=175px>Password :</td>
                <td><input type="password" name="pass" style="width : 200px; font-size : 25" required></td>
            </tr>
            <tr>
                <td style="font-size : 20; font-family : Verdana, Sans-serif" width=175px>Issue / Return :</td>
                <td>
                    <input type="radio" id="issue" name="i_r" value="issue" required>
                    <label for="issue" style="font-size : 20">Issue Book</label>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="radio" id="return" name="i_r" value="return" required>
                    <label for="return" style="font-size : 20">Return Book</label>
                </td>
            </tr>
        </table>
        <br>
    	<input type="submit" value="Submit" style="font-size : 20; font-family : Verdana, Sans-serif">
    </form>

    </div>


    <div style="text-align : center; padding : 100;  padding-bottom : 50; font-size : 35; font-family : Verdana, Sans-serif">
        SEARCH BOOK
    </div>

    <div style="padding-left : 20%; font-size : 20; font-family : Verdana, Sans-serif">

    <form action="book_search.php" method="post">
        <table>
            <tr>
                <td style="font-size : 20; font-family : Verdana, Sans-serif" width=150px>Book Name :</td>
            </tr>
            <tr>
                <td><input type="text" name="bname" style="width : 400px; font-size : 25"></td>
            </tr>
            <tr>
                <td style="font-size : 20; font-family : Verdana, Sans-serif" width=150px>Author Name :</td>
            </tr>
            <tr>
                <td><input type="text" name="aname" style="width : 400px; font-size : 25"></td>
            </tr>
        </table>
        <br><br>
    	<input type="submit" value="Search" style="font-size : 20; font-family : Verdana, Sans-serif">
    </form>

    </div>


</div>


</body>
</html>
