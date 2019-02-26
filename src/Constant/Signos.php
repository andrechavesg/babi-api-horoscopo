<?php
/**
 * Created by PhpStorm.
 * User: gordo
 * Date: 2019-02-25
 * Time: 23:55
 */

namespace App\Constant;

use DateTime;

class Signos
{
    public static function getPorData()
    {
        return [
            "aquario" => ["min" => new DateTime("2000-01-21"), "max" => new DateTime("2000-02-20")],
            "peixes" => ["min" => new DateTime("2000-02-21"), "max" => new DateTime("2000-03-20")],
            "aries" => ["min" => new DateTime("2000-03-21"), "max" => new DateTime("2000-04-20")],
            "touro" => ["min" => new DateTime("2000-04-21"), "max" => new DateTime("2000-05-20")],
            "gemeos" => ["min" => new DateTime("2000-05-21"), "max" => new DateTime("2000-06-20")],
            "cancer" => ["min" => new DateTime("2000-06-21"), "max" => new DateTime("2000-07-20")],
            "leao" => ["min" => new DateTime("2000-07-21"), "max" => new DateTime("2000-08-20")],
            "virgem" => ["min" => new DateTime("2000-08-21"), "max" => new DateTime("2000-09-20")],
            "libra" => ["min" => new DateTime("2000-09-21"), "max" => new DateTime("2000-10-20")],
            "escorpiao" => ["min" => new DateTime("2000-10-21"), "max" => new DateTime("2000-11-20")],
            "sagitario" => ["min" => new DateTime("2000-11-21"), "max" => new DateTime("2000-12-20")],
            "capricornio" => ["min" => new DateTime("2000-12-21"), "max" => new DateTime("2001-01-20")],
        ];
    }
}
