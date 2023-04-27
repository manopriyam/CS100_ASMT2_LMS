<html>
<body>


<div style="float : left; width : 60%">
    <div style="text-align : center; padding : 100; font-size : 60; font-family : Verdana, Sans-serif">
        LIBRARY BOOK LIST
    </div>

    <div style="font-size : 30; font font-family : Verdana, Sans-serif; padding-left : 10%; padding-bottom : 10%">

    <?php 

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

    echo "
        </table>
    ";

    ?>

    </div>
</div>


<div style="float : right; width : 40%">
    <div style="text-align : center; padding : 100; font-size : 50; font-family : Verdana, Sans-serif">
        ISSUE BOOK
    </div>

    <div style="padding-left : 20%; font-size : 20; font-family : Verdana, Sans-serif">

    <form action="issue.php" method="post"> 
        <table>
            <tr>
                <td style="font-size : 20; font-family : Verdana, Sans-serif" width=150px>Book ID :</td> 
                <td><input type="text" name="bid" style="width : 200px; font-size : 25"></td>
            </tr>
            <tr>
                <td style="font-size : 20; font-family : Verdana, Sans-serif" width=150px>Student ID :</td> 
                <td><input type="text" name="sid" style="width : 200px; font-size : 25"></td>
            </tr>
        </table>
        <br><br>
    	<input type="submit" value="Issue Book" style="font-size : 20; font-family : Verdana, Sans-serif">
    </form>

    </div>


    <div style="text-align : center; padding : 100; font-size : 50; font-family : Verdana, Sans-serif">
        RETURN BOOK
    </div>

    <div style="padding-left : 20%; font-size : 20; font-family : Verdana, Sans-serif">

    <form action="return.php" method="post"> 
        <table>
            <tr>
                <td style="font-size : 20; font-family : Verdana, Sans-serif" width=150px>Book ID :</td> 
                <td><input type="text" name="bid" style="width : 200px; font-size : 25"></td>
            </tr>
            <tr>
                <td style="font-size : 20; font-family : Verdana, Sans-serif" width=150px>Student ID :</td> 
                <td><input type="text" name="sid" style="width : 200px; font-size : 25"></td>
            </tr>
        </table>
        <br><br>
    	<input type="submit" value="Return Book" style="font-size : 20; font-family : Verdana, Sans-serif">
    </form>

    </div>
</div>


</body>
</html>
