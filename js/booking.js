homePage.controller('bookingController', function($scope){
    $scope.header = 'booking';
    $scope.days = [
        { 'weekDate': 'SAT', 'date' : 1},
        { 'weekDate': 'SUN', 'date' : 2},
        { 'weekDate': 'MON', 'date' : 3},
        { 'weekDate': 'TUS', 'date' : 4},
        { 'weekDate': 'WED', 'date' : 5},
        { 'weekDate': 'THU', 'date' : 6},
        { 'weekDate': 'FRI', 'date' : 7},
        { 'weekDate': 'SAT', 'date' : 9},
        { 'weekDate': 'SUN', 'date' : 10},
        { 'weekDate': 'MON', 'date' : 11},
        { 'weekDate': 'TUS', 'date' : 12},
        { 'weekDate': 'WED', 'date' : 13},
        { 'weekDate': 'THU', 'date' : 14},
        { 'weekDate': 'FRI', 'date' : 15},
        { 'weekDate': 'SAT', 'date' : 16},
        { 'weekDate': 'SUN', 'date' : 17},
        { 'weekDate': 'MON', 'date' : 18},
        { 'weekDate': 'TUS', 'date' : 19},
        { 'weekDate': 'WED', 'date' : 20},
        { 'weekDate': 'THU', 'date' : 21},
        { 'weekDate': 'FRI', 'date' : 22},
        { 'weekDate': 'FRI', 'date' : 23},
        { 'weekDate': 'FRI', 'date' : 24},
        { 'weekDate': 'FRI', 'date' : 25},
        { 'weekDate': 'FRI', 'date' : 26},
        { 'weekDate': 'FRI', 'date' : 27},
        { 'weekDate': 'FRI', 'date' : 28},
        { 'weekDate': 'FRI', 'date' : 29},
        { 'weekDate': 'FRI', 'date' : 30}

    ];

    $scope.months = [
            {'name' : 'January'},
            {'name' : 'February'},
            {'name' : 'March'},
            {'name' : 'April'},
            {'name' : 'May'},
            {'name' : 'June'},
            {'name' : 'July'},
            {'name' : 'August'},
            {'name' : 'September'},
            {'name' : 'October'},
            {'name' : 'November'},
            {'name' : 'December'}
        ];

    $scope.dateFunc = function(index){
        var day = $('.day'+index);
        (day.hasClass('selected')) ? day.removeClass('selected') : day.addClass('selected');
    }

    $scope.monthChange = function(index){
        console.log(index);
    }
});