<html lang="ru">
<head>
    <meta charset="utf-8">
    <title> z2-2 </title>
</head>
<body>

<?php
$breakfast = "gamburger";
$$breakfast = "and tea";

print "1) $breakfast $gamburger <br>\n";
print "2) $breakfast <br>\n";
print "3) $$breakfast <br>\n";
print "4) " . $breakfast . "<br>\n";
print "5) " . $$breakfast . "<br>\n";
?>

</body>
</html>