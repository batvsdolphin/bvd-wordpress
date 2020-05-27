
window.bvd.themeFolder = 'https://batvsdolphin.com/wp-content/themes/batvsdolphin/';

// window.bvd.themeFolder = 'http://batvsdolphin.local/wp-content/themes/batvsdolphin/';

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

  if ( $("main").is(".Phase-V") ) {
    window.bvd.Phase_V.init();
  }
  
  if ( $("main").is(".Phase-VI") ) {
    window.bvd.Phase_VI.init();
  }

});
