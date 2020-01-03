
<?php 
 // Sidebar fonts
?>

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


<?php 
// Phase IV – Object Stories
if ( is_page( 442 ) ) :  ?> 
  <link href="https://fonts.googleapis.com/css?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Noto+Serif+TC:400,700&display=swap" rel="stylesheet">
<?php endif; ?>

<?php 
// Phase V – Bar None
if ( is_page( 550 ) ) :  ?> 
  <link href="https://fonts.googleapis.com/css?family=Noto+Serif+TC:400,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,900&display=swap" rel="stylesheet">
<?php endif; ?>

<?php

// if ( is_page( array( 'about-us', 'contact', 'management' ) ) ) {
//      // either in about us, or contact, or management page is in view
// } else {
//      // none of the page about us, contact or management is in view
// }
?>