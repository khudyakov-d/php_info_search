<?php

function print_flags($flags)
{
    if ($flags & MYSQLI_NOT_NULL_FLAG) {
        print 'NOT_NULL ';
    }

    if ($flags & MYSQLI_PRI_KEY_FLAG) {
        print 'PRIMARY_KEY ';
    }
}

function print_type($type)
{
    switch ($type) {
        case MYSQLI_TYPE_SHORT:
            print 'SMALLINT ';
            break;
        case MYSQLI_TYPE_LONG:
            print 'INT ';
            break;
        case MYSQLI_TYPE_FLOAT:
            print 'FLOAT ';
            break;
        case MYSQLI_TYPE_DATE:
            print 'DATE ';
            break;
        case MYSQLI_TYPE_VAR_STRING:
            print 'VARCHAR ';
            break;
    }
}

function vid_structure($link, $table)
{
    $result = mysqli_query($link, "SELECT * FROM  $table");

    if (!$result) {
        print mysqli_error($link);
    } else {
        print "<h4>Структура таблицы $table</h4>";

        $finfo = mysqli_fetch_fields($result);
        print "<i>\n";
        foreach ($finfo as $val) {
            print_type($val->type);
            print $val->length . " ";
            print "<b>" . $val->name . "</b> ";
            print_flags($val->flags);
            print "<br>\n";
        }
        print "</i>\n";
        print "<br>\n";

    }
}

$rus_name = array(
    'snum' => 'номер продавца',
    'sname' => 'имя продавца',
    'city' => 'город',
    'comm' => 'комиссионные продавца',
    'cnum' => 'номер покупателя',
    'cname' => 'имя покупателя',
    'rating' => 'рейтинг покупателя',
    'onum' => 'номер заказа',
    'amt' => 'сумма заказа',
    'odate' => 'дата заказа'
);

function vid_content(mysqli $link, $table)
{
    global $rus_name;
    $result = mysqli_query($link, "SELECT * FROM $table");

    if (!$result) {
        print mysqli_error($link);
    } else {
        print "<h4>Содержание таблицы $table</h4>\n";

        print "<table>\n";

        print "<tr>\n";
        for ($x = 0, $size = mysqli_num_fields($result); $x < $size; $x++) {
            $property = mysqli_fetch_field($result);
            print "\t<th>";
            print $property->name . "<br>" . $rus_name[$property->name];
            print "</th>\n";
        }
        print "</tr>\n";

        while ($row = mysqli_fetch_row($result)) {
            print "<tr>\n";
            foreach ($row as $field) {
                print "<td>\n"
                    . "\t<p>$field</p>\n"
                    . "</td>\n";
            }

            print "</tr>\n";
        }

        print "<br>";
        print "</table>\n";
    }

}

$struct = $_GET['struct'];
$content = $_GET['content'];

if (isset($struct)) {
    foreach ($struct as $val) {
        vid_structure($link, $val);
    }
}

if (isset($content)) {
    foreach ($content as $val) {
        vid_content($link, $val);
    }
}

print "<br>\n<a href='z10-1.html'>Возврат к выбору таблицы</a>";


?>