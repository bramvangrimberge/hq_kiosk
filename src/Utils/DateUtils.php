<?php
/**
 * Created by PhpStorm.
 * User: bvg
 * Date: 21/09/2018
 * Time: 10:52
 */

namespace Bram\Utils;


class DateUtils
{
    public static function getMinutes()
    {
        //array of strings
        $minutes = array();

        for ($i = 0; $i <= 60; $i += 5) {
            $minute = '';
            if ($i / 5 == 0 || $i / 5 == 1) {
                $minute .= '0';
            }
            $minute .= '' . $i;

            array_push($minutes, $minute);
        }

        return $minutes;

    }

    public static function getHours()
    {
        //array of strings
        $hours = array();

        for ($i = 0; $i <= 23; $i++) {
            $hour = '';
            if ($i <= 9) {
                $hour .= '0';
            }
            $hour .= '' . $i;

            array_push($hours, $hour);
        }

        return $hours;
    }
}