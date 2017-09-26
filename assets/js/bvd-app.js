
window.bvd.themeFolder = 'http://batvsdolphin.com/wp-content/themes/batvsdolphin/';

// Global Object
$(document).ready(function () {

    console.log('BVD Init');

  if ( $("main").is(".Phase-I") ) {
    window.bvd.Phase_I.init();
  }

  if ( $("main").is(".Phase-III") ) {
    window.bvd.Phase_III.init();
  }

  if ( $("main").is(".Phase-IV") ) {
    window.bvd.Phase_IV.init();
  }

});
