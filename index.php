<?php require_once 'DB.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php
         $regions = $obj->GetRegion();
         foreach($regions as $key => $region)
         { ?>
             <a href="cities.php?id=<?php echo $region['region_id']?>"> <?php echo $region['title_ru']?></a><br>
         <?php
         }
        ?>
    </div>
</body>
</html>