<?php
  function fetchData($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
  }

  $feed = fetchData("https://www.instagram.com/USERNAME/media/");
  $code = json_decode($feed)->items[0]->code;
  $img = json_decode($feed)->items[0]->images->low_resolution->url;
  $link = "https://www.instagram.com/p/$code";
?>

	<a title="Vew on instagram" href="<?php echo $link; ?>">
    <img src="<?php echo $img; ?>">
  </a>
