<?php

class DomainManager {
    const DOMAIN_MANHATTAN_COURIER_SERVICE = "manhattancourierservice.com";
    const DOMAIN_PROFICIENT_LOGISTIC = "proficientlogistic.com";
    const DOMAIN_EXPRESS_WAY_COURIER = "expresswaycourier.com";

    const QQ_MANH_USERNAME = "remoteexw";
    const QQ_MANH_PASSWORD = "remotequote";
    const QQ_MANH_WEBSITE = "Expressway";
    const QQ_MANH_CUSTOMER = "52";

    const QQ_PROF_USERNAME = "remoteexw";
    const QQ_PROF_PASSWORD = "remotequote";
    const QQ_PROF_WEBSITE = "Expressway";
    const QQ_PROF_CUSTOMER = "52";

    const QQ_EXPR_USERNAME = "remoteexw";
    const QQ_EXPR_PASSWORD = "remotequote";
    const QQ_EXPR_WEBSITE = "Expressway";
    const QQ_EXPR_CUSTOMER = "52";

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

    public static function GetVariable($manhattanVariable, $proficientVariable, $expressVariable, $localhostVariable, $defaultVariable = '')
    {
        $variable = $defaultVariable;

        if ( self::IsManhattanCourierServiceDomain() )
            $variable = $manhattanVariable;
        else if ( self::IsProficientLogisticDomain() )
            $variable = $proficientVariable;
        else if ( self::IsExpressWayCourierDomain() )
            $variable = $expressVariable;
        else if ( self::IsLocalhostDomain() )
            $variable = $localhostVariable;

        return $variable;
    }
}
