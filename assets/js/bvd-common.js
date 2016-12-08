
// Global Object


window.bvd = {
  themeFolder: 'http://batvsdolphin.dev/wp-content/themes/batvsdolphin/'
}

$(document).ready(function () {

  var tools = {
    phaseData: function( request ){

      var json_data;
      var data_URL = window.bvd.themeFolder + "/assets/ajax/" + request.name + ".php";

      var data =  $.get( data_URL, function( data ) {
         request.onComplete( $.parseJSON(data) );
      });

      // console.log( data );


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

});
