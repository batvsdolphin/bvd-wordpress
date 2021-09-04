// Initialize the "bvd" object. Must come before Phases
window.bvd = {};

var tools = {
    phaseData: function( request ){

      console.log('requesting', request );

      var json_data;
      var data_URL = "https://batvsdolphin.com/wp-json/wp/v2/posts?categories=" + request.category;

      var data =  $.get( data_URL, function( data ) {
         request.onComplete( data );
      });
    },

    findKey: function(obj, value) {

      // Thanks to jClem
      // https://gist.github.com/derickbailey/4115824

      var key;

      _.each(obj, function (v, k) {
        if (v === value) {
          key = k;
        }
      });

      return key;

    }
  };


  window.bvd.tools = tools;
