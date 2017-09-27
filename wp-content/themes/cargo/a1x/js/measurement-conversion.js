var A1xApp = angular.module('A1xApp', []).config(['$sceProvider', function($sceProvider){
    $sceProvider.enabled(false);
}]);

A1xApp.controller("MeasurementConversionController", ['$scope', function($scope) {
    $scope.form1 = {
        'kilograms1': '',
        'pounds1': '',
        'kilograms2': '',
        'pounds2': ''
    };

    $scope.form2 = {
        'source': '',
        'from': 'centimeter',
        'to': 'centimeter',
        'result': ''
    };

    // $scope.parities = [];
    // $scope.parities['centimeter'] = 100;
    // $scope.parities['feet'] = 3.2808399;
    // $scope.parities['inch'] = 39.3700787;
    // $scope.parities['kilometer'] = 0.001;
    // $scope.parities['league'] = 0.0002071;
    // $scope.parities['league [nautical]'] = 0.00018;
    // $scope.parities['meter'] = 1;
    // $scope.parities['microinch'] = 39370078.7401575;
    // $scope.parities['mile'] = 0.0006214;
    // $scope.parities['millimeter'] = 1000;
    // $scope.parities['yard'] = 1.0936133;

    $scope.parities = [];
    $scope.parities['centimeter'] = 0.01;
    $scope.parities['feet'] = 0.3048;
    $scope.parities['inch'] = 0.3048/12;
    $scope.parities['kilometer'] = 1000;
    $scope.parities['league'] = 4828.0417;
    $scope.parities['league [nautical]'] = 5556;
    $scope.parities['meter'] = 1;
    $scope.parities['microinch'] = 2.54e-08;
    $scope.parities['mile'] = 0.3048*5280;
    $scope.parities['millimeter'] = 0.001;
    $scope.parities['yard'] = 0.9144;

    $scope.Calculate1 = function() {
        $scope.form1.pounds1 = $scope.KgToPound( $scope.form1.kilograms1 );
    };

    $scope.Calculate2 = function() {
        $scope.form1.kilograms2 = $scope.PoundToKg( $scope.form1.pounds2 );
    };

    $scope.ClearResult = function() {
        $scope.form2.result = '';
    };

    // $scope.Calculate3 = function() {
    //     $scope.form2.source = parseFloat($scope.form2.source);
    //     $scope.form2.source = isNaN($scope.form2.source) ? 1 : $scope.form2.source;
    //
    //     var r = $scope.form2.source / $scope.parities[ $scope.form2.from ] * $scope.parities[ $scope.form2.to ];
    //     r = parseFloat(r.toFixed(7)).toString();
    //
    //     if ( r.indexOf('.') != -1 )
    //     {
    //         var pieces = r.toString().split('.');
    //         r = pieces[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '.' + pieces[1];
    //     }
    //     else
    //     {
    //         r = r.replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    //     }
    //
    //     $scope.form2.result = $scope.form2.source + ' ' + $scope.form2.from + ' = ' + r + ' ' + $scope.form2.to;
    // };

    $scope.Calculate3 = function() {
        var FromVal, ToVal, FromName, ToName, v1, Factor;

        v1 = $scope.form2.source;
        v1 = $scope.stripBad(v1);
        v1 = parseFloat(v1);
        if (isNaN(v1)) v1 = 1;
        v1 = Math.abs(v1);
        
        FromVal = $scope.parities[ $scope.form2.from ];
        ToVal = $scope.parities[ $scope.form2.to ];
        FromName = $scope.form2.from;
        ToName = $scope.form2.to;

        Factor = eval("(" + FromVal + ")/(" + ToVal + ")");

        $scope.form2.result = v1 + " " + FromName + " = " + $scope.get_result(v1, Factor) + " " + ToName;
    };

    $scope.get_result = function(ff,factor){
        ff *= factor;

        if (Number.prototype.toFixed) {
            ff = ff.toFixed(7);
            ff = parseFloat(ff);
        }
        else {
            var leftSide = Math.floor(ff);
            var rightSide = ff - leftSide;
            ff = leftSide + Math.round(rightSide *10000000)/10000000;
        }

        return $scope.comma(ff);
    };

    $scope.comma = function(num) {
        var n = Math.floor(num);
        var myNum = num + "";
        var myDec = ""

        if (myNum.indexOf('.',0) > -1){
            myDec = myNum.substring(myNum.indexOf('.',0),myNum.length);
        }

        var arr=new Array('0'), i=0;
        while (n>0)
        {arr[i]=''+n%1000; n=Math.floor(n/1000); i++;}
        arr=arr.reverse();
        for (var i in arr) if (i>0) //padding zeros
            while (arr[i].length<3) arr[i]='0'+arr[i];
        return arr.join() + myDec;
    };

    $scope.stripBad = function(string) {
        for (var i=0, output='', valid="eE-0123456789."; i<string.length; i++)
            if (valid.indexOf(string.charAt(i)) != -1)
                output += string.charAt(i)
        return output;
    }

    $scope.KgToPound = function(kg) {
        return kg * 2.20462262;
    };

    $scope.PoundToKg = function(lb) {
        return lb * 0.453592;
    };
}]);
