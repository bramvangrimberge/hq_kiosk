<?php
/**
 * Created by PhpStorm.
 * User: bvg
 * Date: 20/09/2018
 * Time: 10:09
 */

namespace Bram\Model;


use Bram\DBConnection;

class Event
{
    private $category;
    private $eventId;
    private $longDesc;
    private $showSeperate;
    private $startDate;
    private $title;

    public function __construct($row)
    {
        $dbConnection = new DBConnection();

        $this->eventId = isset($row['event_id']) ? $row['event_id'] : null;
        $this->category = isset($row['category_id']) ? $dbConnection->getCategoryById($row['category_id']) : null;
        $this->longDesc = isset($row['long_desc']) ? $row['long_desc'] : '';
        $this->showSeperate = isset($row['show_seperate']) ? $row['show_seperate'] : false;
        $this->startDate = isset($row['start_date']) ? $row['start_date'] : date('now');
        $this->title = isset($row['title']) ? $row['title'] : '';
    }

    /**
     * @return null
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param null $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getEventId()
    {
        return $this->eventId;
    }

    /**
     * @return mixed
     */
    public function getLongDesc()
    {
        return $this->longDesc;
    }

    /**
     * @param mixed $longDesc
     */
    public function setLongDesc($longDesc)
    {
        $this->longDesc = $longDesc;
    }

    /**
     * @return mixed
     */
    public function getShowSeperate()
    {
        return $this->showSeperate;
    }

    /**
     * @param mixed $showSeperate
     */
    public function setShowSeperate($showSeperate)
    {
        $this->showSeperate = $showSeperate;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }


}