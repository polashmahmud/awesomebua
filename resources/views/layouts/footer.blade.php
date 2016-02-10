<!-- JavaScripts -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="{{ asset('js/metisMenu.min.js') }}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ asset('js/sb-admin-2.js') }}"></script>
<script>
    $("th, small, kbd, code, span").each(function(){
        $(this).text(en2bn($(this).text()));
    });
    function en2bn(input){
        var en = ["1","2","3","4","5","6","7","8","9","0",'January','th of ','Saturday','PM','AM','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','nd of','February','March','April','May','June','July','August','September','October','November','December','rd of'];
        var bn = ["১","২","৩","৪","৫","৬","৭","৮","৯","০",'জানুয়ারি', ', ','শনিবার',' ',' ','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রুবার',' ','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টবর','নভেম্বর','ডিসেম্বর',' '];
        input = input.toString();
        // use array length
        for( var i = 0; i < en.length ; i++)
        {
//                input = input.replace( en[i] , bn[i] );
            var re = new RegExp(en[i] ,'g');
            input = input.replace(re,  bn[i]);
        }
        return input;
    }

    $( document ).ready(function() {
        /*var html = $('#trns').html();
         html = en2bn(html);
         $('#trns').html(html);*/
    });
</script>
<script>
    $('#flash').delay(3000).slideUp(300);
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    });

    $('#monthlyModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    })
</script>

@yield('footer')

</body>
</html>
