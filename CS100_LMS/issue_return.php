<html>
<body>


<div style='text-align : center; padding : 100; font-size : 60; font-family : Verdana, Sans-serif'>
    ISSUE / RETURN STATUS UPDATE
</div>


<?php


$e1 = $_POST["bid"];
$e2 = $_POST["sid"];
$e3 = $_POST["pass"];
$e4 = $_POST["i_r"];

$flag = 0;
$lines1 = file("users.txt");
foreach ($lines1 as $line) {
    $parts = explode('; ', $line);
    if ( $e2 == $parts[1] ) {
        if ( $e3 == trim($parts[2]) ) {
            $flag = 1;
            $user_rec=$parts;
            break;
        }
    }
}

$lines2 = file("books.txt");
foreach ($lines2 as $line) {
    $parts = explode('; ', $line);
    if ( $e1 == $parts[0] ) {
        $book_rec=$parts;
        break;
    }
}

if ( $flag == 1 ) { 
    if ( $e4=="issue" ) {
        to_issue($book_rec, $user_rec);
    }
    else {
        to_return($book_rec, $user_rec);
    }
    exit();
}
else { 
    echo "<script> location.href='user_login.php' </script>";
    exit();
}

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

function to_issue($book, $user) {
    if ( check_availability($book[0]) ) {
        $mydate=getdate();
        $dt = "$mydate[year]"."-"."$mydate[mon]"."-"."$mydate[mday]";
        
        $temp=date_create($dt);
        $curr=date_format($temp,"Y-m-d");
        
        date_add($temp, date_interval_create_from_date_string('14 days'));
        $due=date_format($temp,"Y-m-d");
        
        $data=$book[0]."; ".$user[1]."; ".$curr."; ".$due."; "."; ".PHP_EOL;

        $file=fopen("issue_return.txt", "a");
        fwrite($file, $data);
        fclose($file);
        
        echo "
            <div style='padding-left : 25%; font-size : 20; font-family : Verdana, Sans-serif'>
            The following book has been successfully issued in your name.
            <br><br>
        ";

        echo "
            <table>
                <tr>
                    <td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Book ID  :</td> 
                    <td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$book[0]</td>
                </tr>
                <tr>
                    <td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Book Name  :</td> 
                    <td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$book[1]</td>
                </tr>
                <tr>
                    <td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Author  :</td> 
                    <td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$book[2]</td>
                </tr>
                <tr>
                    <td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Student ID :</td> 
                    <td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$user[1]</td>
                </tr>
                <tr>
                    <td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Student Name  :</td> 
                    <td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$user[0]</td>
                </tr>
                <tr>
                    <td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Issue Date :</td> 
                    <td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$curr</td>
                </tr>
                <tr>
                    <td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Due Date :</td> 
                    <td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$due</td>
                </tr>
            </table>
        ";
    }
    else {
        echo "
            <div style='padding-left : 25%; font-size : 20; font-family : Verdana, Sans-serif'>
            Sorry, the book you are looking for has already been issued.
            <br><br>
        ";
        echo "
            <table>
                <tr>
                    <td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Book ID  :</td> 
                    <td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$book[0]</td>
                </tr>
                <tr>
                    <td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Book Name  :</td> 
                    <td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$book[1]</td>
                </tr>
                <tr>
                    <td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Author  :</td> 
                    <td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$book[2]</td>
                </tr>
            </table>
        ";
    }
    return;
}

function to_return($book, $user) {
    if ( !check_availability($book[0]) ) {
        $lines = file("issue_return.txt");
        foreach ($lines as $line) {
            $parts = explode('; ', $line);
            if ( $book[0] == $parts[0] ) {
                if ( $user[1]==$parts[1] ) {
                    $flag = 1; 
                    $rec=$parts;
                }
                else {
                    $flag = -1; 
                }
            }
        }

        if ( $flag == 1 ) { 
            $mydate=getdate();
            $dt = "$mydate[year]"."-"."$mydate[mon]"."-"."$mydate[mday]";
            
            $temp=date_create($dt);
            $curr=date_format($temp,"Y-m-d");

            $due=date_create($rec[3]);
            $diff=date_diff($temp, $due);
            $diff=$diff->format("%R%a");

            if ( $diff < 0 ) {
                $fine=$diff;
            }
            else {
                $fine=0;
            }
            
            $data=$rec[0]."; ".$rec[1]."; ".$rec[2]."; ".$rec[3]."; ".$curr."; ".$fine."; ".PHP_EOL;
            echo $data;

            $file=fopen("issue_return.txt", "a");
            fwrite($file, $data);
            fclose($file);
            echo "
                <div style='padding-left : 25%; font-size : 20; font-family : Verdana, Sans-serif'>
                The following book has been successfully returned by you.
                <br><br>
            ";

            echo "
                <table>
                    <tr>
                        <td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Book ID  :</td> 
                        <td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$book[0]</td>
                    </tr>
                    <tr>
                        <td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Book Name  :</td> 
                        <td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$book[1]</td>
                    </tr>
                    <tr>
                        <td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Author  :</td> 
                        <td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$book[2]</td>
                    </tr>
                    <tr>
                        <td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Student ID :</td> 
                        <td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$user[1]</td>
                    </tr>
                    <tr>
                        <td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Student Name  :</td> 
                        <td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$user[0]</td>
                    </tr>
                    <tr>
                        <td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Issue Date :</td> 
                        <td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$rec[2]</td>
                    </tr>
                    <tr>
                        <td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Due Date :</td> 
                        <td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$rec[3]</td>
                    </tr>
                    <tr>
                        <td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Return Date :</td> 
                        <td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$curr</td>
                    </tr>
                    <tr>
                        <td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Fine Applicable :</td> 
                        <td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>Rs. $fine</td>
                    </tr>
                </table>
            ";
        }
        else if ( $flag=-1 ) {
            echo "
                <div style='padding-left : 25%; font-size : 20; font-family : Verdana, Sans-serif'>
                The following book has not been issued by you.
                <br><br>
            ";

            echo "
                <table>
                    <tr>
                        <td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Book ID  :</td> 
                        <td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$book[0]</td>
                    </tr>
                    <tr>
                        <td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Book Name  :</td> 
                        <td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$book[1]</td>
                    </tr>
                    <tr>
                        <td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Author  :</td> 
                        <td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$book[2]</td>
                    </tr>
                </table>
            ";
        }
    }
    else {
        echo "
            <div style='padding-left : 25%; font-size : 20; font-family : Verdana, Sans-serif'>
            The following book has already been returned.
            <br><br>
        ";

        echo "
            <table>
                <tr>
                    <td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Book ID  :</td> 
                    <td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$book[0]</td>
                </tr>
                <tr>
                    <td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Book Name  :</td> 
                    <td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$book[1]</td>
                </tr>
                <tr>
                    <td style='font-size : 20; font-family : Verdana, Sans-serif' width=225px>Author  :</td> 
                    <td style='width : 500px; font-size : 20; font-family : Verdana, Sans-serif'>$book[2]</td>
                </tr>
            </table>
        ";
    }
    return;
}


?>


</body>
</html>

