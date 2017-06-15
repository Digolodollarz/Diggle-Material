<?php
/*-----------------------------------------------------------------------------------*/
/* This template will be called by all other template files to finish
/* rendering the page and display the footer area/content
/*-----------------------------------------------------------------------------------*/
?>

</main><!-- / end page container, begun in the header -->
<!--<link href="https://fonts.googleapis.com/css?family=Droid+Serif|Inknut+Antiqua" rel="stylesheet">-->
<footer style="width: 100%;" class="mdl-mini-footer site-footer">
    <div class="mdl-mini-footer__left-section">
        <div class="mdl-logo">Digolodollarz Technology News</div>
        <ul class="mdl-mini-footer__link-list">
            <li>By <a href="http://apps.diggle.tech/" rel="designer"> Diggle Apps</a></li>
        </ul>
    </div>
</footer>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-71744567-1', 'auto');
    ga('send', 'pageview');

</script>


<?php wp_footer();
// This fxn allows plugins to insert themselves/scripts/css/files (right here) into the footer of your website. 
// Removing this fxn call will disable all kinds of plugins. 
// Move it if you like, but keep it around.
?>
</div>
</div>

</body>
</html>
