<html lang="ru">
<head>
    <meta charset="utf-8">
    <title> z2-5 </title>
</head>
<body>

<?php
$lang = $_GET['lang'];

if ($lang == "ru") {
    print "Русский язык";
} elseif ($lang == "en") {
    print "Английский язык";
} elseif ($lang == "fr") {
    print "Французский язык";
} elseif ($lang == "de") {
    print "Немецкий язык";
} else {
    print "Язык неизвестен";
}
?>

</body>
</html>