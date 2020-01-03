
window.bvd.Phase_V = {
  init: function () {

    console.log('Phase V');

    document.getElementsByTagName("html")[0].classList.add("Phase-V-HTML");

    const players = document.querySelectorAll('.Player');
    let wavesurfers = [];
    let i = 0;

    players.forEach(player => {

      i++;
      wavesurfers[i] = WaveSurfer.create({
        container: player.querySelector('.Waveform'),
        barWidth: 2,
        barHeight: 1,
        barGap: null
      });

      wavesurfers[i].load(player.getAttribute("data-src"));

      let button = player.querySelector('.Button');
      button.addEventListener('click', wavesurfers[i].playPause.bind(wavesurfers[i]));

      wavesurfers[i].on('pause', function () {
        button.innerHTML = "Play";
      });
      wavesurfers[i].on('play', function () {
        button.innerHTML = "Pause";
      });
    });
  }
};


