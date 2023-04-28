<html>
<body>


<div style="float : center; width : 100%">
    <div style="text-align : center; padding : 100; font-size : 60; font-family : Verdana, Sans-serif">
        ISSUE LOG
    </div>

    <div style="font-size : 30; font font-family : Verdana, Sans-serif; padding-left : 10%; padding-bottom : 10%; padding-right: 10%">

    <?php

    $lines = file("templog.txt");

    echo "
        <table border='2'>
            <tr>
                <td style='width : 125px; font-size : 18; font-family : Verdana, Sans-serif; text-align : center; padding : 2px'>
                    <b>BOOK ID</b>
                </td>
                <td style='width : 400px; font-size : 18; font-family : Verdana, Sans-serif; text-align : center; padding : 2px'>
                    <b>STUDENT ID</b>
                </td>
                <td style='width : 200px; font-size : 18; font-family : Verdana, Sans-serif; text-align : center; padding : 2px'>
                    <b>DUE DATE</b>
                </td>
                <td style='width : 200px; font-size : 18; font-family : Verdana, Sans-serif; text-align : center; padding : 2px'>
                    <b>DATE OF ISSUE</b>
                </td>
                <td style='width : 200px; font-size : 18; font-family : Verdana, Sans-serif; text-align : center; padding : 2px'>
                    <b>DATE OF RETURN</b>
                </td>
                <td style='width : 200px; font-size : 18; font-family : Verdana, Sans-serif; text-align : center; padding : 2px'>
                    <b>FINE</b>
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
                <td style='width : 200px; font-size : 16; font-family : Verdana, Sans-serif; padding : 4px'>
                    $parts[3]
                </td>
                <td style='width : 200px; font-size : 16; font-family : Verdana, Sans-serif; padding : 4px'>

                </td>
                <td style='width : 200px; font-size : 16; font-family : Verdana, Sans-serif; padding : 4px'>
                    
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

</body>
</html>
