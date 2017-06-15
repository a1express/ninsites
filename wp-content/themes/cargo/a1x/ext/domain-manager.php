<?php

class DomainManager {
    const DOMAIN_PROFICIENT_LOGISTIC = "proficientlogistic.com";
    const DOMAIN_MANHATTAN_COURIER_SERVICE = "manhattancourierservice.com";

    public static function IsProficientLogisticDomain()
    {

    }

    public static function IsManhattanCourierServiceDomain()
    {

    }

    public static function GetCurrentDomain()
    {
        echo '<pre>';
        print_r($_SERVER);

        die();
    }
}
