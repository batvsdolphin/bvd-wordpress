var Phase_IV = {

    init: function(){

      console.log('Phase IV');

      // Request Data from ajax
      var request = {
        name : 'phase-iv',
        onComplete : window.bvd.Phase_IV.loadPhase
      };

      window.bvd.tools.phaseData( request );

    },

    loadPhase: function(data){

      // Save phase Data to Phase object
      Phase_IV.data = data;
      console.log( Phase_IV.data );

      // TODO : Determine Route

      // Start with last entry in object
      Phase_IV.renderGrid();

      // $(".image img").pin({padding: {top: 0}});
      $(".image").stick_in_parent({recalc_every: 1});



    },

    renderGrid: function(){

      // Fill Template

      _.templateSettings.variable = "posts";

      var template = _.template( $( "#template-post" ).html() );

      $('.IV-Content').html( template( Phase_IV.data ) );

    },
  };

window.bvd.Phase_IV = Phase_IV;
