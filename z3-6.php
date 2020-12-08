<html lang="ru">
<head>
    <meta charset="utf-8">
    <title> z3-6 </title>
</head>
<body>

<?php

function print_a_array($num, $cust)
{
    print "<div>\n" . $num . ")\n<br>\n";
    foreach ($cust as $key => $val) {
        print $key . " : " . $val . "<br>\n";
    }
    print "</div>\n";
}

$cust = array(
    'cnum' => 2001,
    'cname' => "Hoffman",
    'city' => "London",
    'snum' => 1001,
    'rating' => 100
);

print_a_array(1, $cust);

asort($cust);
print_a_array(2, $cust);

ksort($cust);
print_a_array(3, $cust);

sort($cust);
print_a_array(4, $cust);

?>

</body>
</html>