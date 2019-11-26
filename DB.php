<?php
require_once 'session.php';
class DB
{
    private static $db;
    public static $num = 25;

    public function __construct()
    {
        self::$db = new PDO('pgsql:host=127.0.0.1;dbname=countries', 'postgres', 'admin');
    }

    private function Execute($query)
    {
        $sth = self::$db->prepare($query);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function GetRegion()
    {
        $query = "SELECT region_id, title_ru FROM _regions WHERE country_id = 2 AND title_ru IS NOT NULL ORDER BY 2";
        return self::Execute($query);
    }


    public function GetCities($start)
    {
        $query = "SELECT city_id, title_ru, area_ru FROM _cities WHERE region_id = :region_id LIMIT :num OFFSET :start";
        $sth = self::$db->prepare($query);
        $sth->bindParam(':region_id', $_SESSION['region'], PDO::PARAM_INT);
        $sth->bindParam(':start', $start, PDO::PARAM_INT);
        $sth->bindParam(':num', self::$num, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function GetCity($city_id)
    {
        $query = "SELECT title_ru, title_ua, title_en, title_be, title_es, title_pt, title_de, title_fr, title_pl, title_it, title_ja, title_lv, title_cz FROM _cities WHERE city_id = :city_id";
        $sth = self::$db->prepare($query);
        $sth->bindParam(':city_id', $city_id, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result[0];
    }

    public function GetCount()
    {
        $query = "SELECT COUNT(city_id) FROM _cities WHERE region_id = :region_id";
        $sth = self::$db->prepare($query);
        $sth->bindParam(':region_id', $_SESSION['region'], PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}

global $obj;

$obj = new DB();


