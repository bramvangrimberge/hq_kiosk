<?php

namespace Bram;

use Bram\Model\Category;
use Bram\Model\Event;
use PDO;
use PDOException;

/**
 * Created by PhpStorm.
 * User: bvg
 * Date: 19/09/2018
 * Time: 14:31
 */
class DBConnection
{
    private $connection = null;

    public function __construct()
    {
    }

    public function getActiveEvents()
    {
        $events = array();

        $dbConnection = $this->getConnection();
        $query = $dbConnection->query("select * from event");

        while ($row = $query->fetch()) {
            $event = new Event($row);
            array_push($events, $event);
        }

        return $events;
    }

    /**
     * @return PDO
     */
    public function getConnection()
    {
        if ($this->connection == null) {
            $this->makeDbConnection();
        }
        return $this->connection;
    }

    private function makeDbConnection()
    {
        $servername = "localhost";
        $username = "hqgamesbe_kiosk";
        $password = "Hs*kiosk2018*";
        $dbname = "hqgamesbe_kiosk";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection = $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getEventById($eventId)
    {
        $dbConnection = $this->getConnection();
        $query = $dbConnection->query("select * from event where event_id = " . $eventId);

        $event = new Event($query->fetch());

        return $event;
    }

    public function getCategoryById($categoryId)
    {
        if(empty($categoryId)) {
            return null;
        }

        $dbConnection = $this->getConnection();
        $query = $dbConnection->query("select * from category where category_id = " . $categoryId);

        $category = new Category($query->fetch());

        return $category;
    }

    public function getCategories()
    {
        $categories = array();

        $dbConnection = $this->getConnection();
        $query = $dbConnection->query("select * from category");

        while ($row = $query->fetch()) {
            $category = new Category($row);
            array_push($categories, $category);
        }

        return $categories;
    }

    /**
     * @param $event Event
     */
    public function insertEvent($event) {
        $dbConnection = $this->getConnection();

        // 'title', 'long_desc', 'show_seperate', 'category_id', 'start_date', 'start_hour'
        $valueString = $event->getTitle() . ', ' . $event->getLongDesc() . ',' . $event->getShowSeperate() . ',' . $event->getCategoryId() . $event->getStartDate() . ',' . $event->getStartHour();

        $sql = "INSERT INTO event (" . Event::getDbFieldNames() . "') VALUES (" . $valueString . ")";
        try {
            $dbConnection->exec($sql);
        } catch(PDOException $exception) {
            echo 'SQL exception : ' . $exception->getMessage();
        }
    }
}