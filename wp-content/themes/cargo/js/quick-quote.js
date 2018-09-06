(function($) {
    $(document).ready(function(){
        $(".qq-holder").each(function(){
            var qq = $(this);
            var form = qq.find("form");
            var picker = form.find(".datepicker").datepicker(); 

            form.on("submit", function(e) {
                var form = $(this);

                if ( form.hasClass('wex') )
                {
                    if ( $.trim( form.find('input[name=FromAddress2]').val() ) == '' )
                    {
                        alert('Please enter the origin address');
                        return false;
                    }

                    if ( $.trim( form.find('input[name=FromZIP2]').val() ) == '' )
                    {
                        alert('Please enter the origin ZIP');
                        return false;
                    }

                    if ( $.trim( form.find('input[name=ToAddress2]').val() ) == '' )
                    {
                        alert('Please enter the destination address');
                        return false;
                    }

                    if ( $.trim( form.find('input[name=ToZIP2]').val() ) == '' )
                    {
                        alert('Please enter the destination ZIP');
                        return false;
                    }

                    if ( $.trim( form.find('input[name=fpieces]').val() ) == '' || isNaN( $.trim( form.find('input[name=fpieces]').val() ) ) )
                    {
                        alert('Please enter the pieces #');
                        return false;
                    }

                    if ( $.trim( form.find('input[name=fweight]').val() ) == '' || isNaN( $.trim( form.find('input[name=fweight]').val() ) ) )
                    {
                        alert('Please enter the weight');
                        return false;
                    }
                }
                else
                {
                    var origin = form.find('.input-origin');
                    var destination = form.find('.input-destination');

                    if ( $.trim( origin.val() ) == '' )
                    {
                        alert('Please enter the origin ZIP');
                        return false;
                    }
                    else if ( $.trim( origin.val() ).length !== 5 || isNaN($.trim( origin.val() )) ) 
                    {
                        alert('Invalid origin ZIP');
                        return false;
                    }

                    if ( $.trim( destination.val() ) == '' )
                    {
                        alert('Please enter the destination ZIP');
                        return false;
                    }
                    else if ( $.trim( destination.val() ).length !== 5 || isNaN($.trim( destination.val() )) ) 
                    {
                        alert('Invalid destination ZIP');
                        return false;
                    }

                    if ( $.trim( form.find('input[name=pieces]').val() ) == '' || isNaN( $.trim( form.find('input[name=pieces]').val() ) ) )
                    {
                        alert('Please enter the pieces #');
                        return false;
                    }

                    if ( $.trim( form.find('input[name=weight]').val() ) == '' || isNaN( $.trim( form.find('input[name=weight]').val() ) ) )
                    {
                        alert('Please enter the weight');
                        return false;
                    }

                    if ( $.trim( form.find('input[name=date]').val() ) == '' )
                    {
                        alert('Please select the date');
                        return false;
                    }

                    if ( $.trim( form.find('input[name=track2]').val() ) == '' )
                    {
                        alert('Please enter the time');
                        return false;
                    }
                }

                $('#btPreloader').removeClass("removePreloader").addClass("forceShowing");
            });

            completequickquote( form );
        });

        function completequickquote(form) {
            var today=new Date();
            var day = today.getDate();
            var month = today.getMonth()+1;
            var year = today.getFullYear();
            var minutes = today.getMinutes();
            var hours = today.getHours();
            var pm = false;

            if (hours>11) {
                pm=true;
            }
            if (minutes<10) {
                minutes = "0" + minutes;
            }
            if (hours>12) {
                hours = hours-12;
            }
            if (hours<10) {
                hours = "0" + hours;
            }
            if (hours<1) {
                hours = "12";
            }

            if ( pm )
            {
                form.find('.jumpMenu').val('PM').siblings('.trigger').text('PM');
            }

            form.find('.track2').val(hours + ":" + minutes);
            form.find('.datepicker').val(month + "/" + day + "/" + year);
        }

        var directionsDisplay;
        var directionsService = new google.maps.DirectionsService();
        var geocoder, map, originPin, destinationPin;

        window.drawOriginPin = function(address)
        {
            var needsCountry = true;
            if ( address == '' )
            {
                needsCountry = false;
                address = defaultOrigin.toString().replace("(", "").replace(")", "");
            }

            if (typeof originPin != 'undefined')
            {
                originPin.setMap(null);
            }

            geocoder.geocode( { 'address': address + (needsCountry ? ', United States' : '') }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK)
                {
                    map.setCenter(results[0].geometry.location);
                    originPin = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location,
                        animation: google.maps.Animation.DROP
                    });
                    if ( needsCountry ) {
                        calcRoute();
                    }
                }
                else
                {
                    console.log("(origin) Geocode was not successful for the following reason: " + status);
                }
            });
        };

        window.drawDestinationPin = function(address)
        {
            console.log('addr', address);
            if ( address == '' )
            {
                return;
            }

            if (typeof destinationPin != 'undefined')
            {
                destinationPin.setMap(null);
            }

            geocoder.geocode( { 'address': address + ', United States' }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK)
                {
                    map.setCenter(results[0].geometry.location);
                    destinationPin = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location,
                        animation: google.maps.Animation.DROP
                    });
                    calcRoute();
                }
                else
                {
                    console.log("(destination) Geocode was not successful for the following reason: " + status);
                }
            });
        };

        function initialize()
        {
            directionsDisplay = new google.maps.DirectionsRenderer();
            geocoder = new google.maps.Geocoder();

            var myOptions = {
                zoom: 11,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                center: defaultOrigin
            };
            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
            directionsDisplay.setMap(map);

            $('.input-origin').each(function(){
                var originInput = $(this);
                drawOriginPin(originInput.val());
                calcRoute();
            });
            $('.input-origin').blur(function(){
                var originInput = $(this);
                drawOriginPin(originInput.val());
                calcRoute();
            });

            $('.input-destination').each(function(){
                var destinationInput = $(this);
                // drawDestinationPin(destinationInput.val());
                // calcRoute();
            });
            $('.input-destination').blur(function(){
                var destinationInput = $(this);
                drawDestinationPin(destinationInput.val());
                calcRoute();
            });
        }

        function calcRoute()
        {
            var start = $('.input-origin').val() + ', United States';
            var end = $('.input-destination').val() + ', United States';

            var request = {
                origin: start,
                destination: end,
                travelMode: google.maps.TravelMode.DRIVING
            };

            directionsService.route(request, function(result, status)
            {
                if (status == google.maps.DirectionsStatus.OK)
                {
                    directionsDisplay.setDirections(result);
                }
            });
        }

        if ( $('#map_canvas').length > 0 )
        {
            initialize();
            calcRoute();
        }
    });
})( jQuery );
