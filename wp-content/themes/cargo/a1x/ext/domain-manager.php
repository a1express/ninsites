<?php

class DomainManager {
    const DOMAIN_MANHATTAN_COURIER_SERVICE = "manhattancourierservice.com";
    const DOMAIN_PROFICIENT_LOGISTIC = "proficientlogistic.com";
    const DOMAIN_EXPRESS_WAY_COURIER = "expresswaycourier.com";
    const DOMAIN_ASAP_COURIER = "dev.boxonaplane.com";

    const QQ_MANH_USERNAME = "remote";
    const QQ_MANH_PASSWORD = "remotequote";
    const QQ_MANH_WEBSITE = "a1express";
    const QQ_MANH_CUSTOMER = "A1XQOUTE";

    const QQ_PROF_USERNAME = "anonproficient";
    const QQ_PROF_PASSWORD = "anon";
    const QQ_PROF_WEBSITE = "proficient";
    const QQ_PROF_CUSTOMER = "18635";

    const QQ_EXPR_USERNAME = "remoteexw";
    const QQ_EXPR_PASSWORD = "remotequote";
    const QQ_EXPR_WEBSITE = "Expressway";
    const QQ_EXPR_CUSTOMER = "18600";

    const QQ_ASAP_USERNAME = "remoteexw";
    const QQ_ASAP_PASSWORD = "remotequote";
    const QQ_ASAP_WEBSITE = "Expressway";
    const QQ_ASAP_CUSTOMER = "18600";

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

    public static function IsExpressWayCourierDomain()
    {
        $domain = self::GetCurrentDomain();

        return $domain == self::DOMAIN_EXPRESS_WAY_COURIER || strpos( $domain, self::DOMAIN_EXPRESS_WAY_COURIER ) !== false;
    }

    public static function IsASAPCourierDomain()
    {
        $domain = self::GetCurrentDomain();

        return $domain == self::DOMAIN_ASAP_COURIER || strpos( $domain, self::DOMAIN_ASAP_COURIER ) !== false;
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

    public static function GetVariable($manhattanVariable, $proficientVariable, $expressVariable, $asapVariable, $localhostVariable, $defaultVariable = '')
    {
        $variable = $defaultVariable;

        if ( self::IsManhattanCourierServiceDomain() )
            $variable = $manhattanVariable;
        else if ( self::IsProficientLogisticDomain() )
            $variable = $proficientVariable;
        else if ( self::IsExpressWayCourierDomain() )
            $variable = $expressVariable;
        else if ( self::IsASAPCourierDomain() )
            $variable = $asapVariable;
        else if ( self::IsLocalhostDomain() )
            $variable = $localhostVariable;

        return $variable;
    }
}
