jQuery.post(
    'http://localhost:9000/cms/wp-admin/admin-ajax.php',
    {
        'action': 'login_info'
    },

    function (response) {
        if(response) {
            $('.nav.navbar-nav').append('<li><a>You are <span id="loginname">' + response + '</span></a></li>');
            $('a[href="#/login"]').hide();
            $('a[href="#/register"]').hide();
        }
        else {
            window.location.href = 'http://localhost:9000/#/login';
        }
    }
);
