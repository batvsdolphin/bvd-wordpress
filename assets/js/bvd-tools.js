// Initialize the "bvd" object. Must come before Phases
window.bvd = {};

var tools = {
    phaseData: function( request ){

      console.log('requesting', request );

      var json_data;
      var data_URL = window.bvd.themeFolder + "/assets/ajax/" + request.name + ".php";

      var data =  $.get( data_URL, function( data ) {
         request.onComplete( $.parseJSON(data) );
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
