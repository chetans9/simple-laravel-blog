<script type="text/javascript" src="{{URL::asset('js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/fb-share.js')}}"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
</script>

<!-- script-for-menu -->
<script>
    $("span.menu").click(function () {
            $(" ul.navig").slideToggle("slow", function () {});
        });
</script>
<!-- script-for-menu End-->
