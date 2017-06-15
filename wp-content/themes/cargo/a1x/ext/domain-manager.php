<?php

class DomainManager {
    const DOMAIN_MANHATTAN_COURIER_SERVICE = "manhattancourierservice.com";
    const DOMAIN_PROFICIENT_LOGISTIC = "proficientlogistic.com";

    public static function IsManhattanCourierServiceDomain()
    {
        $domain = self::GetCurrentDomain();

        return $domain == self::DOMAIN_MANHATTAN_COURIER_SERVICE || strpos( $domain, self::DOMAIN_MANHATTAN_COURIER_SERVICE ) !== false;
    }

    public static function IsProficientLogisticDomain()
    {
        $domain = self::GetCurrentDomain();

        return $domain == self::DOMAIN_PROFICIENT_LOGISTIC || strpos( $domain, self::DOMAIN_PROFICIENT_LOGISTIC ) !== false;
    }

    public static function IsLocalhostDomain()
    {
        $domain = self::GetCurrentDomain();
        $localhost = 'localhost';

        return $domain == $localhost || strpos( $domain, $localhost ) !== false;
    }

    public static function GetCurrentDomain()
    {
        return isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';
    }

    public static function GetVariable($manhattanVariable, $proficientVariable, $localhostVariable, $defaultVariable = '')
    {
        $variable = $defaultVariable;

        if ( self::IsManhattanCourierServiceDomain() )
            $variable = $manhattanVariable;
        else if ( self::IsProficientLogisticDomain() )
            $variable = $proficientVariable;
        else if ( self::IsLocalhostDomain() )
            $variable = $localhostVariable;

        return $variable;
    }

    public static function EchoVariable($manhattanVariable, $proficientVariable, $localhostVariable, $defaultVariable = '')
    {
        echo self::GetVariable($manhattanVariable, $proficientVariable, $localhostVariable, $defaultVariable);
    }
}
