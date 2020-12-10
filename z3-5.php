<html lang="ru">
<head>
    <meta charset="utf-8">
    <title> z3-5 </title>
</head>
<body>

<?php

function print_array($num, $arr)
{
    print "<div>" . $num . ") ";
    for ($i = 0, $count = count($arr); $i < $count; ++$i) {
        print $arr[$i] . " ";
    }
    print "</div>\n";
}

$treug = array();
print "<div style='white-space: pre'>1) ";
for ($i = 1; $i <= 10; ++$i) {
    $treug[$i] = $i * ($i + 1) / 2;
    print $treug[$i] . "  ";
}
print "</div>\n";

$kvd = array();
for ($i = 1; $i <= 10; ++$i) {
    $kvd[$i] = $i * $i;
}
print_array(2, $kvd);

$rez = array_merge($treug, $kvd);
print_array(3, $rez);

sort($rez);
print_array(4, $rez);

array_shift($rez);
print_array(5, $rez);

$rez1 = array_unique($rez);
print_array(6, $rez1);

?>

</body>
</html>
