$(document).ready(function () {



  Phase = {

    init: function(){

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
      Phase.renderSingle(Phase.data[Phase.data.length-1].id);
      // Phase.renderGrid();

    },

    renderGrid: function(){

      // Fill Template

      _.templateSettings.variable = "posts";

      var template = _.template( $( "#template-grid" ).html() );

      $('main').html( template( Phase.data ) );

      Phase.bindElements();
      Phase.centerGrid();

    },

    centerGrid: function(){

    },

    renderSingle: function( post_id ){

    },

    centerSingle: function(){

    }
  };

  Phase.init();

});
