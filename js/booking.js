homePage.controller('bookingController', function($scope, $http){
    $scope.header = 'booking';

    $http.get('days.json').then(function(response){
        $scope.days = response.data;
    });

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

    $('#bookReq').on('click', function(){
        var currentOption = $('#monthselect').find('option:selected').text();
        if(currentOption){
            var selectedDays = $('.cal-row.selected');
            log(selectedDays);
            selectedDays.removeClass('selected');
            $('#mealModal').modal('show');
        }
    });

    $('#selectAll').on('click', function(){
        $('.cal-row').addClass('selected');
    });

    $('#saveBooking').on('click', function(){
        // Modal data sasving operation goes here
        $('#mealModal').modal('hide');
    });

    $scope.monthChange = function(){
        log($scope.data.monthselect);
    };
});