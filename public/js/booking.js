homePage.controller('bookingController', function($scope, $http){
    $scope.header = 'booking';

    $scope.dateFunc = function(index){
        var day = $('.day' + index);
        (day.hasClass('selected')) ? day.removeClass('selected') : day.addClass('selected');
    };

    $scope.data = {
        months : [
            {'id': 1, 'name' : 'January'},
            {'id': 2, 'name' : 'February'},
            {'id': 3, 'name' : 'March'},
            {'id': 4, 'name' : 'April'},
            {'id': 5, 'name' : 'May'},
            {'id': 6, 'name' : 'June'},
            {'id': 7, 'name' : 'July'},
            {'id': 8, 'name' : 'August'},
            {'id': 9, 'name' : 'September'},
            {'id': 10, 'name' : 'October'},
            {'id': 11, 'name' : 'November'},
            {'id': 12, 'name' : 'December'}
        ]
    };

    $scope.days = [];
    $scope.monthChange = function(){
        $scope.days = [];
        //weekDates are showing wrong
        var weekDates = ['Thursday','Friday', 'Saturday','Sunday', 'Monday', 'Tuesday', 'Wednesday'];
        var monthId = $scope.data.monthselect;
        var days = new Date(2016, monthId, 0).getDate();
        for (var i = 1; i <= days; i++) {
            var weekDay = new Date(2016, monthId, i).getDay();
            $scope.days.push({ "weekDate": weekDates[weekDay], "date" : i});
        }
    };

    $scope.bookIt = function(){
            // Modal data saving operation goes here
            var bookingData = [],
                mealData = [];

            $('.meal.selected').each(function(){
                mealData.push($(this).attr('data-meal'));
            });

            $('.cal-row.selected').each(function(i){
                bookingData.push(
                    {
                        'serial' : i,
                        'date' : $(this).attr('data-date')
                    }
                );
            });

            var bookRequestData = [bookingData, mealData];
            log(bookRequestData );

            /* setup and ajax request to save the data */

            //$('#mealModal').modal('hide');
            //selectedDays.removeClass('selected');
    };

    $('#bookReq').on('click', function(){
        var currentOption = $('#monthselect').find('option:selected').text();
        if(currentOption){
            var selectedDays = $('.cal-row.selected');
            $('#mealModal').modal('show');
        }
    });

    $(function(){
        $('#toggle').on('click', function(){
            $('.cal-row').toggleClass('selected');
        });
        $('#selectAll').on('click', function(){
            $('.cal-row').addClass('selected');
        });

        $('#selectNone').on('click', function(){
            $('.cal-row').removeClass('selected');
        });

        //Modal Operation
        $('.meal').on('click', function(){
            $(this).toggleClass('selected')
        });
    })
});