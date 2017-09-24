var Phase_III = {

  init: function(){

    console.log('Phase III');

    // Request Data from ajax
    var request = {
      name : 'phase-iii',
      onComplete : window.bvd.Phase_III.loadPhase
    };

    window.bvd.tools.phaseData( request );

  },

  loadPhase: function(data){

    // Save phase Data to Phase object
    Phase_III.data = data;

    // Start with last entry in object
    // Phase_III.renderSingle(Phase_III.data[Phase_III.data.length-1].id);
    Phase_III.renderGrid();

  },

  renderGrid: function(){

    // Fill Template

    _.templateSettings.variable = "posts";

    var template = _.template( $( "#template-grid" ).html() );

    $('main').html( template( Phase_III.data ) );

    Phase_III.bindElements();
    Phase_III.centerGrid();

  },

  centerGrid: function(){

    // Adjust Sizing

    function resizeGrid(){

      $('.js-grid ul li').each(function(){
          var winWidth = $('.u-innerWidth').width() - 8; //-8 for outlines

          $(this).css({
            width: winWidth / 4,
            height: winWidth / 4
          })
      });
    }

    $( window ).resize(function() {
      resizeGrid();
    });

    resizeGrid();
  },

  renderSingle: function( post_id ){

    // Find correct object
    var post = _.find(Phase_III.data, function(item) {
        return item.id == post_id;
    })

    // Determine current key. (Thank you underscore)
    var cur_key = parseInt( window.bvd.tools.findKey( Phase_III.data, post ));

    // Check to see if is first or last
    var is_first = ( cur_key === 0 ) ? true : false;
    var is_last = ( cur_key === Phase_III.data.length - 1) ? true : false;

    // Add prev/next ids to data object
    if ( is_first || is_last ) {
      if ( is_first ) {
        post.next_id = Phase_III.data[cur_key + 1].id;
      }
      if ( is_last  ) {
        post.prev_id = Phase_III.data[cur_key - 1].id;
      }
    }
    else {
      post.next_id = Phase_III.data[cur_key + 1].id;
      post.prev_id = Phase_III.data[cur_key - 1].id;
    }

    // Apply template
    _.templateSettings.variable = "post";
    var template = _.template( $( "#template-single" ).html() );
    $('main').html( template( post ) );

    $('.III-Single').attr('id', ''); // init viewer listener
    Phase_III.bindElements();

    Phase_III.centerSingle();

  },

  centerSingle: function(){

    var img = $('.js-postImage');
    var winHeight = $(window).height();
    var text = $('.js-responseText');
    var topNav = $(".III-Entry-Buttons");
    var bottomNav = $(".III-Nav");
    var response = $(".III-Response:visible");
    var response_visible = $('.III-Single').attr('id') === '' ? false : true;
    var top = topNav.offset().top + topNav.outerHeight();
    var bottom = bottomNav.outerHeight();
    var available_height = winHeight - ( top + bottom);
    var available_width = $('.III-Single-Width').width();

    function center(){
      if ( response_visible ) {
        var imgMargin = ( available_height - img.outerHeight() ) / 2;

        if ( response.outerHeight() < available_height ) {
          response.css({
            marginTop : (( available_height - response.outerHeight() ) / 2) - 30
          });
        } else { // if response higher than available

          img.css({ marginTop : imgMargin });
          response.css({ marginTop : imgMargin - 70 });

        }

        if ( img.outerHeight() < available_height ) {
          img.css({
            marginTop : imgMargin
          });
        }

      } else { // if the response ISN'T visible (ie. if it's the big image)

        if ( img.outerHeight() < available_height ) {
          img.css({
            height : available_height - 60,
            width: 'auto',
            marginTop: 30
          });
        }
       if  ( img.outerWidth() > available_width ) {
          img.css({
            marginLeft: -( img.outerWidth() - available_width ) / 2,
            marginTop: 10
          });
        } else {
          img.css({
            marginTop : ( available_height - img.outerHeight() ) / 2
          });
        }
      }
    }


    img.on('load', function() { center(); });

    $( window ).resize(function() {
      center();
    });

    center();


  },

  bindElements: function(){

    var grid_item = $('.js-grid ul li');
    var show_grid = $('.js-show-grid');
    var nav = $('.js-nav');
    var show_response = $('.js-show-response');
    var hide_response = $('.js-hide-response');

    show_grid.on('click', function(){
      Phase_III.renderGrid();
    });

    grid_item.on('click', function(){
      var post_id = $(this).data('id');
      Phase_III.renderSingle( post_id );
    });

    nav.on('click', function(){
      var post_id = $(this).data('id');
      $('.III-Single').attr('id', '' );
      Phase_III.renderSingle( post_id );
    });

    show_response.on('click', function(){

      var show = $(this).data('show');
      var current = $('.III-Single').attr('id');

      $('.is-Showing').removeClass('is-Showing');
      $('.js-postImage').attr('style', '');

      if ( show === current ) {
        show = '';
      } else {
        $(this).addClass('is-Showing');
      }

      $('.III-Single').attr('id', show );
      Phase_III.centerSingle();

    });


  }
};

window.bvd.Phase_III = Phase_III;
