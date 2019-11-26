<?php require_once 'DB.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <style>
        table { border-collapse: collapse; margin-left: 10px;}
        tr, th { padding: 10px; text-align: center; }
        td, th { border: 1px solid #000;}
    </style>
</head>
<body>
<div class="">
    <?php if (isset($_GET['city_id'])) {
        $city_id = $_GET['city_id'];
        echo "<table><tr><th>Русский</th><th>Украинский</th><th>Английский</th><th>Белорусский</th><th>Испанский</th><th>Португальский</th><th>Немецкий</th><th>Французский</th><th>Польский</th><th>Итальянский</th><th>Японский</th><th>Латвийский</th><th>Чешский</th></tr>";
        $city = $obj->GetCity($city_id);
        echo "<tr><td>" . $city['title_ru'] . "</td><td>" . $city['title_ua'] . "</td><td>" . $city['title_en'] . "</td><td>" . $city['title_be'] . "</td><td>" . $city['title_es'] . "</td><td>" . $city['title_pt'] . "</td><td>" . $city['title_de'] . "</td>
            <td>" . $city['title_fr'] . "</td><td>" . $city['title_pl'] . "</td><td>" . $city['title_it'] . "</td><td>" . $city['title_ja'] . "</td><td>" . $city['title_lv'] . "</td><td>" . $city['title_cz'] . "</td></tr></table>";
    } ?>
</div>
</body>
</html>
