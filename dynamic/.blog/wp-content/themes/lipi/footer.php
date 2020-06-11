<!--
========================
FOOTER
========================
-->
<footer>
  <div class="footer-section">
   <?php 
   lipi__theme_footer_widget(); 
   lipi__theme_footer_end();
   ?>
  </div>
</footer>
<?php 
$global_website_presentation = lipi__website_global_design_control();
if( isset($global_website_presentation) && $global_website_presentation != '' ) { 
	echo '</div>'; 
}
wp_footer(); 

if(!is_home())
{
if (function_exists (mypopup)) mypopup();
}

?>
</body>
</html>
