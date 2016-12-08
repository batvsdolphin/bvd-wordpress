<?php


function get_audio_entry( $name ) {

  $audio_target = 'audio-' . $name . '-' . get_the_ID();
  $audio_description = get_field( $name.'_description');
  $audio_description = str_replace('"', "'", $audio_description);

   ?>


  <div class="AudioEntry" title="<?php  ?>">


    <?php if ( get_field( $name.'_audio')) { ?>

      <audio id="<?php echo $audio_target ?>" src="<?php echo get_field( $name.'_audio')['url']; ?>" preload="auto"></audio>

    <?php }; ?>

    <div class="AudioCircle js-PlayAudio" data-target="<?php echo $audio_target; ?>" style="border-color: <?php the_field( $name.'_color'); ?>" title="<?php echo  $audio_description; ?> "></div>

    <div class="Hidden">

      <div class="AudioName" style="color: <?php the_field( $name.'_color'); ?>">
        <?php echo $name; ?>
      </div> <!-- AudioName -->

      <div class="AudioTitle">
        <?php the_field( $name.'_sound_title'); ?>
      </div> <!-- AudioTitle -->

    </div> <!-- Audio-invisible -->

  </div> <!-- AudioEntry -->





<?php
}
?>
