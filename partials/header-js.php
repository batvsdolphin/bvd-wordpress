
<script>
  (function(d) {
    var config = {
      kitId: 'trt6ovn',
      scriptTimeout: 3000,
      async: true
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
</script>


<script src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/vendor/jquery-3.1.1.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/bvd-common.js" ></script>

<?php if ( is_page_template( 'templates/phase-i.php' ) ) { ?>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/phase-i.js" ></script>
<?php } ?>

<?php if ( is_page_template( 'templates/phase-ii.php' ) ) { ?>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/phase-ii.js" ></script>
<?php } ?>

<?php if ( is_page_template( 'templates/phase-iii.php' ) ) { ?>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/vendor/underscore-min.js"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/phase-iii.js" ></script>
<?php } ?>

<?php if ( is_page_template( 'templates/phase-iv.php' ) ) { ?>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/vendor/underscore-min.js"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/phase-iv.js" ></script>
<?php } ?>
