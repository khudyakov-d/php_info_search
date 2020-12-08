<html lang="ru">
<head>
    <meta charset="utf-8">
    <title> z5-4</title>
</head>
<body>
<?php

function print_table(mysqli $link)
{
    $result = mysqli_query($link, "SELECT * FROM notebook");

    if (!$result) {
        print mysqli_error($link);
    } else {
        $PHP_SELF = $_SERVER['PHP_SELF'];

        print "<form action='$PHP_SELF' method='POST'>\n<table>\n";

        print "<tr>\n";
        for ($x = 0, $size = mysqli_num_fields($result); $x < $size; $x++) {
            $property = mysqli_fetch_field($result);
            print "\t<th style='border: 1px solid black;'>$property->name</th>\n";
        }
        print "\t<th style='border: 1px solid black;'>исправить</th>\n";
        print "</tr>\n";

        while ($row = mysqli_fetch_row($result)) {
            print "<tr>\n";
            foreach ($row as $field) {
                print "<td style='border: 1px solid black;'>\n"
                    . "\t<p><label><input type='text' value='$field' readonly></label></p>\n"
                    . "</td>\n";
            }

            print "<td style='border: 1px solid black;'>\n"
                . "\t<p><label><input type='radio' name='id' value='$row[0]'></label></p>\n"
                . "</td>\n";

            print "</tr>\n";
        }

        print "<tr><td><p><label><input type='submit' value='Выбрать'></label></p></td></tr>";

        print "</table>\n</form>\n";
    }
}

function print_edit_form(mysqli $link)
{
    $id = $_POST['id'];
    if (isset($id)) {
        $result = mysqli_query($link, "SELECT * FROM notebook WHERE id = $id");
        $a_row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $PHP_SELF = $_SERVER['PHP_SELF'];

        print "<form action='$PHP_SELF' method='POST'>\n<label>\n<select  name='field_name' >\n";
        foreach ($a_row as $key => $val) {
            if ($key != 'id') {
                print "\t<option value='$key'>$val</option>\n";
            }
        }

        print "</label>\n</select>\n";
        print "\t<p>Введите новое значение <label><input type='text' name='field_value'></label></p>\n";
        print "<p><label><input type='submit' value='Заменить'></label></p>\n";
        print "<label><input type=hidden name='id' value='$id'></label>\n";
        print "</form>\n";
    }
}

function edit(mysqli $link)
{
    $id = $_POST['id'];
    $field_name = $_POST['field_name'];
    $field_value = $_POST['field_value'];

    if (isset($id, $field_name, $field_value)) {
        $result = mysqli_query($link, "UPDATE notebook SET $field_name='$field_value' WHERE id = $id");
        if (!$result) {
            print mysqli_error($link);
        }
    }

    print "<a href='z5-3.php'>К таблице</a>";
}

$mysql_user = "root";
$mysql_password = "123321";
$link = mysqli_connect('db', $mysql_user, $mysql_password, "php_db");

if (!$link) {
    die("Нет соединения с MySQL");
} else {
    print_table($link);
    print_edit_form($link);
    edit($link);

    mysqli_close($link);
}
?>

</body>
</html>