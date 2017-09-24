
window.bvd.Phase_I = {
  init: function(){

    console.log('Phase I');

    $(".js-PlayAudio").hover(function(){

      var target_name = $(this).data('target');
      var audio = $('#' + target_name);
      var audio_source = audio[0];

      audio_source.play();

    }, function(){

      var target_name = $(this).data('target');
      var audio = $('#' + target_name);
      var audio_source = audio[0];

      audio_source.pause();
    });
  }
};
