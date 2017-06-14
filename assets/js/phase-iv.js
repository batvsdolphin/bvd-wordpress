$(document).ready(function () {

  Phase = {

    init: function(){

      console.log('Phase IV');

      // Request Data from ajax
      var request = {
        name : 'phase-iv',
        onComplete : Phase.loadPhase
      }

      window.bvd.tools.phaseData( request )

    },

    loadPhase: function(data){

      // Save phase Data to Phase object
      Phase.data = data;
      console.log( Phase.data );

      // TODO : Determine Route

      // Start with last entry in object
      Phase.renderGrid();
      // Phase.renderGrid();

    },

    renderGrid: function(){

      // Fill Template

      _.templateSettings.variable = "posts";

      var template = _.template( $( "#template-post" ).html() );

      $('main').html( template( Phase.data ) );

    },

  };

  Phase.init();

});
