<html lang="ru">
<head>
    <meta charset="utf-8">
    <title> z5-3</title>
</head>
<body>
<?php

$username = $_POST['username'];
$city = $_POST['city'];
$address = $_POST['address'];
$birthday = $_POST['birthday'];
$mail = $_POST['mail'];

$mysql_user = "root";
$mysql_password = "123321";
$link = mysqli_connect('db', $mysql_user, $mysql_password, "php_db");

if (!$link) {
    die("Нет соединения с MySQL");
} else {
    $result = mysqli_query($link, "SELECT * FROM notebook");

    if (!$result) {
        print mysqli_error($link);
    } else {
        $num_rows = mysqli_num_rows($result);
        $num_fields = mysqli_num_fields($result);

        print "<table>\n";

        print "<tr>\n";
        for ($x = 0; $x < $num_fields; $x++) {
            $property = mysqli_fetch_field($result);
            print "\t<th style='border: 1px solid black;'>$property->name</th>\n";
        }
        print "</tr>\n";

        while ($row = mysqli_fetch_row($result)) {
            print "<tr>\n";
            foreach ($row as $field) {
                print "\t<td style='border: 1px solid black;'>$field</td>\n";
            }
            print "</tr>\n";
        }

        print "</table>";
    }

    mysqli_close($link);
}
?>

</body>
</html>