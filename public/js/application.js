var hetuApp = function () {

    var dateFormat = 'yyyy-mm-dd';

    var dateFormatUpperCase = dateFormat.toUpperCase();

    var handleAmount = function() {
        $('body').on('blur change', '[id*="Amount"]', function (e) {
            var value = $(this).val().toLowerCase();

            if(value !== '') {
                key = value.substring((value.length)-1);
                if(!isNumber(key)) {
                    var mulBy;
                    value = value.substring(0, (value.length)-1);
                    if(key == 'k') mulBy = 1000;
                    if(key == 'm') mulBy = 1000000;
                    if(key == 'b') mulBy = 1000000000;
                    if(key == 't') mulBy = 1000000000000;

                    $(this).val(parseFloat(value)*mulBy);
                }
            }
        });
    };

    var handleNotifier = function() {
        notificationEle = $('#notificationList');

        hetuApp.notifier(notificationsUrl, notificationEle);
        var auto_refresh = setInterval( function () {
            hetuApp.notifier(notificationsUrl, notificationEle);
        }, (10 * 1000)); // refresh every 1000 = 1 sec

        $('#header_notification_bar a.notifier').click(function(e) {
            if($('.notificationCount:first').text() !== '') {
                $.get(appRootUrl+'notifications/mark_as_read', function(data) {
                    $('.notificationCount').text('');
                });
            }
        });
    };

    var handleShortlist = function () {

        $(document).on('click', '.shortlist-link:not([data-toggle="modal-manager"])', function (e) {
            e.stopPropagation();
            $(this)[0].click();
        });
        
        $(document).on('click', '.shortlist-link[data-toggle="modal-manager"]', function (e) {
            e.stopPropagation();
            
            if(isLoggedIn === 'true') {
                var action = $(this).attr('data-action');

                

                //alert($(this).attr('data-homepage'));


                var currentInWishlistItems = parseInt($('#cartcontain').text());
                if(action == 'add') {
                    var currentWishlisttTotal = currentInWishlistItems + 1;
                    $(this).attr('data-action', 'remove').addClass('active');
                    $(this).attr('href', $(this).attr('href').replace('add', 'remove'));
                    if($(this).attr('data-homepage') != 1){
                        $(this).text("Remove from Wishlist");
                    }else if($(this).attr('data-homepage') == 1){
                        var attractionClassandId = $(this).attr('data-action-div-class-name');
                        $('.'+attractionClassandId).attr('data-action', 'remove').addClass('active');
                        $('.'+attractionClassandId).attr('href', $(this).attr('href').replace('add', 'remove'));
                        $('.'+attractionClassandId).closest('.customtooltip').find('.cutomtooltiptext').html("");
                        $('.'+attractionClassandId).closest('.customtooltip').find('.cutomtooltiptext').html("Remove from <br>Wishlist");
                        console.log(attractionClassandId);
                        $(this).closest('.customtooltip').find('.cutomtooltiptext').html("");
                        $(this).closest('.customtooltip').find('.cutomtooltiptext').html("Remove from <br>Wishlist");
                    }
                    

                    $.toast({
                        heading: 'Success',
                        text: $(this).attr('data-attraction-name')+' has been added in your Wishlist.',
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'bottom-right',
                        loader: false
                    });



                    $('.cartcontain').text(currentWishlisttTotal);
                } else {
                    var currentWishlisttTotal = parseInt(currentInWishlistItems - 1);
                    
                    var dataWishlist = $(this).attr('data-wishlist');
                    
                    $(this).attr('data-action', 'add').removeClass('active');
                    $(this).attr('href', $(this).attr('href').replace('remove', 'add'));
                    if($(this).attr('data-homepage') != 1){
                        $(this).text("Add to Wishlist");
                    }else if($(this).attr('data-homepage') == 1){
                        var attractionClassandId = $(this).attr('data-action-div-class-name');

                        $('.'+attractionClassandId).attr('data-action', 'add').removeClass('active');
                        $('.'+attractionClassandId).attr('href', $(this).attr('href').replace('remove', 'add'));



                        $('.'+attractionClassandId).closest('.customtooltip').find('.cutomtooltiptext').html("");
                        $('.'+attractionClassandId).closest('.customtooltip').find('.cutomtooltiptext').html("Add to <br>Wishlist");
                        console.log(attractionClassandId);
                        $(this).closest('.customtooltip').find('.cutomtooltiptext').html("");
                        $(this).closest('.customtooltip').find('.cutomtooltiptext').html("Add to <br>Wishlist");
                    }
                    
                    $('.cartcontain').text(currentWishlisttTotal);


                    $.toast({
                        heading: 'Success',
                        text: $(this).attr('data-attraction-name')+' has been removed from your Wishlist.',
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'bottom-right',
                        loader: false
                    });


                    if(dataWishlist == 1){
                        $(this).closest('.listboxband').remove();
                    }
                    if(currentWishlisttTotal == 0 && dataWishlist == 1){
                        location.reload();
                    }
                }   
            }
        });
    };

    return {

        //main function to initiate the theme
        init: function () {
            handleAmount();
            handleShortlist();

            // handleNotifier();
        },

        ajaxInit: function () {

        },

		notifier: function (url, ele) {

            $('.notificationLoader').removeClass('hide');

            $.getJSON(url, function(data) {

                if(isLoggedIn == "true" && data.isLoggedIn == "false") {
                    location.reload();
                    return;
                }
                if(isLoggedIn == "false" && data.isLoggedIn == "true") {
                    location.reload();
                    return;
                }

                ele.html('').html(data.html);

                $('.notificationLoader').addClass('hide');

                var notificationCount = ele.children("li.unread").size();

                if(notificationCount > 0) {
                    $('span.badge.notificationCount').text(notificationCount);
                } else {
                    $('.notificationCount').text(' no ');
                    $('.badge.notificationCount').text('');
                }
            });
        },

        initializeMap: function () {
            var map;
            var bounds = new google.maps.LatLngBounds();
            var mapOptions = {
                mapTypeId: 'roadmap'
            };

            // Display a map on the page
            map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
            map.setTilt(45);

            // Multiple Markers
            // define var markers in jsDef of the ctp

            // Info Window Content
            // define var infoWindowContent in jsDef of the ctp

            // Display multiple markers on a map
            var infoWindow = new google.maps.InfoWindow(), marker, i;

            // Loop through our array of markers & place each one on the map
            for( i = 0; i < markers.length; i++ ) {
                var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                bounds.extend(position);
                marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    title: markers[i][0]
                });

                // Allow each marker to have an info window
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infoWindow.setContent(infoWindowContent[i][0]);
                        infoWindow.open(map, marker);
                    };
                })(marker, i));

                // Automatically center the map fitting all markers on the screen
                map.fitBounds(bounds);
            }

            // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
            var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
                google.maps.event.removeListener(boundsListener);
            });
        },        

        displayCostField: function(index, value, currencySign) {
            if(typeof value != 'object') {
                var str;
                var fillValue;
                switch(typeof value) {
                    case 'number':
                        str = currencySign+' '+(value.toFixed(0));
                        if(is_int(value)) {
                            fillValue = value.toFixed(0);
                        } else if (is_float(value)) {
                            fillValue = value.toFixed(2);
                        }
                    break;
                    case 'boolean':
                        str = value;
                        fillValue = (value) ? 1 : 0;
                    break;
                    default:
                        str = value;
                        fillValue = value;
                    break;
                }
                $('.'+index).text(str);
                $('[name*="['+index+']"').val(fillValue);
            }
        }
    };
}();