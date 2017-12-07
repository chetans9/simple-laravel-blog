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
