<?php require_once 'DB.php';
require_once 'session.php' ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container offset-3">
    <?php
    if (isset($_GET['id'])) {
        $_SESSION['region'] = $_GET['id'];
        $res = $obj->GetCount();
        $_SESSION['count'] = $res[0]['count'];
    }
    $page = $_GET['page'];
    $count = $_SESSION['count'];
    $num = $obj::$num;

    $total = intval(($count - 1) / $num) + 1;
    $page = intval($page);
    if (empty($page) || $page < 0) $page = 1;
    if ($page > $total) $page = $total;
    $start = $page * $num - $num;

    $cities = $obj->GetCities($start);
    foreach ($cities as $key => $city) {  $area = $city['area_ru'] != null ? " (". $city['area_ru'] . " )": null ?>
        <a href="city.php?city_id=<?php echo $city['city_id'] ?>"><?php echo $city['title_ru'] . $area ?></a><br>
    <?php }

    if ($page != 1) $pervpage = '<a href= ./cities.php?page=1><<</a>
                               <a href= ./cities.php?page=' . ($page - 1) . '><</a> ';
    // Проверяем нужны ли стрелки вперед
    if ($page != $total) $nextpage = ' <a href= ./cities.php?page=' . ($page + 1) . '>></a>
                                   <a href= ./cities.php?page=' . $total . '>>></a>';

    // Находим две ближайшие станицы с обоих краев, если они есть
    if ($page - 2 > 0) $page2left = ' <a href= ./cities.php?page=' . ($page - 2) . '>' . ($page - 2) . '</a> | ';
    if ($page - 1 > 0) $page1left = '<a href= ./cities.php?page=' . ($page - 1) . '>' . ($page - 1) . '</a> | ';
    if ($page + 2 <= $total) $page2right = ' | <a href= ./cities.php?page=' . ($page + 2) . '>' . ($page + 2) . '</a>';
    if ($page + 1 <= $total) $page1right = ' | <a href= ./cities.php?page=' . ($page + 1) . '>' . ($page + 1) . '</a>';

    // Вывод меню
    echo $pervpage . $page2left . $page1left . '<b>' . $page . '</b>' . $page1right . $page2right . $nextpage;
    ?>
</div>
</body>
</html>

