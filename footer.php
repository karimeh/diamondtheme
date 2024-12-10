</div><!-- #main_body -->
<footer class="footer">

 

<div id="wk_order">
    <p>
        برای انجام پروژه های مربوط به سفارشی سازی و شخصی سازی قالب و افزونه های وردپرس و رفع خطاهای وب سایت ،می توانید  سفارش خود را ثبت کنید تا هماهنگی لازم برای انجام سفارش انجام شود.
    </p>
    <a href="/order/" id="wk_botm_order">ثبت پروژه</a>
    
</div><!-- wk_order -->




<div id="cprw">تمام حقوق مادی و معنوی برای foobar محفوظ است . استفاده از مطالب وردپرس کار ، فقط با درج لینک آزاد است.</div> <!-- cprw -->
<!--<a href="#kheader" id="gotop" ></a>-->
<a href="whatsapp://send?text=HI%20!%20[%20wordpresskar.com%20]&phone=989359556950&abid=989359556950" id="wtsap"  target="_blank">
<span>
آغاز گفتگو در واتساپ
</span>
</a> 

 
<a href="https://t.me/skarimeh" id="tlg"  target="_blank">
<span>
آغاز گفتگو در تلگرام
</span>
</a>
</footer>
<?php 
global $theme_folder;
wp_footer();
   ?>


<script src='<?= $theme_folder; ?>/assets/js/jquery.min.js'></script>
<script src='<?= $theme_folder; ?>/assets/js/jquery.hoverIntent.min.js'></script>
<script src='<?= $theme_folder; ?>/assets/js/lodash.min.js'></script>

 <script>
$(document).ready(function(){
  $('#content_list li a').click(function(){
    $('html, body').animate({
        scrollTop: $( $(this).attr('href') ).offset().top
    }, 900);
    return false;
});

  $('#gotop').click(function(){
    $('html, body').animate({
        scrollTop: $( $(this).attr('href') ).offset().top
    }, 900);
    return false;
});


$(window).scroll(function(){
    if ($(window).scrollTop() >=100) {
        $('#kheader').addClass('fixed-header');
        $('#kheader div').addClass('visible-title');
    }
    else {
        $('#kheader').removeClass('fixed-header');
        $('#kheader div').removeClass('visible-title');
    }
});


});
var  number_auth="9359556950";

var wa_link = 'whatsapp://send?text=سلام&phone=98'+number_auth+'&abid=98'+number_auth;
 
</script>

</body>
</html>