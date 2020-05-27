
window.bvd.Phase_VI = {
  init: function () {

    console.log('Phase VI');

    document.getElementsByTagName("html")[0].classList.add("Phase-VI-HTML");

    const players = document.querySelectorAll('.Player');
    let wavesurfers = [];
    let i = 0;

    players.forEach(player => {

      i++;
      wavesurfers[i] = WaveSurfer.create({
        container: player.querySelector('.Waveform'),
        barWidth: 2,
        height: 30,
        width: 200,
        waveColor: '#555555',
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


