<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) {
        // alert(pathname+' - '+name);
        if (window.location.pathname.includes("index") || name == '') {
            console.log("running index.php");
            $('title').html("Job Orders");
            $('li#job_orders').addClass('active');
        } else if (window.location.pathname.includes("users")) {
            $('title').html("Users");
            $('li#users').addClass('active');
        } else if (window.location.pathname.includes("consumers")) {
            $('title').html("Member Consumers");
            $('li#members').addClass('active');
        } else if (window.location.pathname.includes("maps")) {
            $('title').html("Maps");
            $('li#maps').addClass('active');
        } else if (window.location.pathname.includes("history")) {
            $('title').html("Track History");
            $('li#history').addClass('active');
        }

        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
        });

        /*$('.done_btn').click(function() {
            var p_id = $('.pending_id', this).val();
            // alert(p_id);
            $('.p_id').val(p_id);

            var r = confirm("Are you sure you want to mark it done?");
            if (r == true) {
                $('#done_form').submit();
            }
        });*/

        $('.form_Validation').hide();

        /*function ErrorMsg(msg) {
            $('.form_Validation').show().html(msg);
        }*/

        // _____________________________________

    });
</script>
</body>

</html>