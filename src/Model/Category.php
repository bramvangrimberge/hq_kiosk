<?php
/**
 * Created by PhpStorm.
 * User: bvg
 * Date: 20/09/2018
 * Time: 11:23
 */

namespace Bram\Model;


class Category
{
    private $categoryId;
    private $description;
    private $backgroundUrl;

    public function __construct($row)
    {
        $this->categoryId = isset($row['category_id']) ? $row['category_id'] : null;
        $this->description = isset($row['description']) ? $row['description'] : '';
        $this->backgroundUrl = isset($row['background_url']) ? $row['background_url'] : null;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getBackgroundUrl()
    {
        return $this->backgroundUrl;
    }

    /**
     * @param mixed $backgroundUrl
     */
    public function setBackgroundUrl($backgroundUrl)
    {
        $this->backgroundUrl = $backgroundUrl;
    }


}