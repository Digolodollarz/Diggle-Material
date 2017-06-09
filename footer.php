<?php
/*-----------------------------------------------------------------------------------*/
/* This template will be called by all other template files to finish
/* rendering the page and display the footer area/content
/*-----------------------------------------------------------------------------------*/
?>

</main><!-- / end page container, begun in the header -->
<!--<link href="https://fonts.googleapis.com/css?family=Droid+Serif|Inknut+Antiqua" rel="stylesheet">-->
<link href="https://fonts.googleapis.com/css?family=Sorts+Mill+Goudy|Vollkorn" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<footer class="mdl-mini-footer site-footer">
    <div class="mdl-mini-footer__left-section">
        <div class="mdl-logo">Digolodollarz Technology News</div>
        <ul class="mdl-mini-footer__link-list">
            <li>By <a href="http://apps.diggle.tech/" rel="designer"> Diggle Apps</a></li>
        </ul>
    </div>
</footer>

<?php wp_footer();
// This fxn allows plugins to insert themselves/scripts/css/files (right here) into the footer of your website. 
// Removing this fxn call will disable all kinds of plugins. 
// Move it if you like, but keep it around.
?>

</div>

</body>
</html>
