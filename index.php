<?php
	//include __DIR__.'/inc/php/thetaLink.php';
	/*include 'CensorWords.php';
	$censor = new Snipe\BanBuilder\CensorWords;
	$badwords = $censor->setDictionary('en-us');*/
	
	//error_reporting(0);
	/*define('COLOR', false);
	
	require('inc/php/core/db.php');
	require('inc/php/counter.php');
	require('inc/php/data.php');
	
	$musicsource = "youtube";
	$refresh = true;

	$track = array(
	'u91xZCWrnXM',
	'v6Cus48FVXs',
	'0EWbonj7f18',
	'KrVC5dm5fFc',
	'YJVmu6yttiw',
	'oC-GflRB0y4',
	'JRfuAukYTKg',
	'9I9Ar6upx34',
	'doBoJ6yFrKo',
	'E5ONTXHS2mM',
	'tmPm5iYOklg',
	'SyORw8bee4o',
	'MlZwp7YwZyw',
	'7NqaAkIFoJg',
	'40KHZ-Jxt6U',
	'BtqiGQd9248',
	'bR-s4ReIxJo',
	'_crlYFYVI-s',
	'9PB30JUOncw',
	'VsDGYGgqMgc',
	's6ESU3Q0KEg',
	'34Na4j8AVgA',
	'3w0yqAdJ1iY',
	'5VpoqSVFONY',
	'FnJIb4A-DuY',
	'KDxJlW6cxRk',
	'FHCYHldJi_g',
	'ESXgJ9-H-2U',
	'pUjE9H8QlA4',
	'raB8z_tXq7A',
	'q31tGyBJhRY',
	'LBr7kECsjcQ',
	'68EaYB6_8XU',
	'Z7CTnA3dTU0',
	'BOhsIaUDrbA',
	'xSXQUc7QjFA',
	'1knLyjEGBS8',
	'1knLyjEGBS8',
	'q0YaO-Km3vM',
	'fDrTbLXHKu8',
	'tDzxTfttir4',
	'wVrCZOiDlDo',
	'tZRVvlDOn5A',
	'Y5d6ZM9g8RE',
	't5747BhezKM',
	'UM86_ozKkgs',
	'WKtiEmlO6iA',
	'dO1rMeYnOmM',
	'xnCpwM4yscw',
	'4feUSTS21-8',
	'fqpvDbDbytU',
	'IhP3J0j9JmY',
	'PKB4cioGs98',
	'feA64wXhbjo'
);

	$customthemecolor = array(
	'3498db',
	'db8034',
	'34dba4',
	'c934db',
	'db3480'
);

$count = count($track)-1;
$num = rand(0, $count);

$countTheme = count($customthemecolor)-1;
$numTheme = rand(0, $countTheme);
$customTheme = $customthemecolor[$numTheme];
$countTheme1 = count($customthemecolor)-1;
$numTheme1 = rand(0, $countTheme1);
$customTheme1 = $customthemecolor[$numTheme1];
$countTheme2 = count($customthemecolor)-1;
$numTheme2 = rand(0, $countTheme2);
$customTheme2 = $customthemecolor[$numTheme2];

if($refresh == true) {
if($musicsource == "youtube") {
$vidkey = $track[$num]; // for example: cHPMH26sw2f

$dur = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=contentDetails&id=$vidkey&key=AIzaSyDvBgy2fdvbxpvYADw_mkkj3tCzs54ZX_w");
$VidDuration =json_decode($dur, true);
foreach ($VidDuration['items'] as $vidTime) 
{
$VidDuration= $vidTime['contentDetails']['duration'];
}
// convert duration from ISO to M:S
$date = new DateTime('2000-01-01');
$date->add(new DateInterval($VidDuration));
$time = $date->format('i:s');
$parsed = date_parse($time);
$seconds = $parsed['hour'] * 60 + $parsed['minute'] + $parsed['second'];
}
elseif($musicsource == "mp3") {
$mp3 = $track[$num] . ".mp3";
$mp3file = new MP3File($mp3);
$duration1 = $mp3file->getDurationEstimate();//(faster) for CBR only
$duration2 = $mp3file->getDuration();//(slower) for VBR (or CBR)
if($duration1 == $duration2) {
$time = MP3File::formatTime($duration2);
$parsed = date_parse($time);
$seconds = $parsed['hour'] * 60 + $parsed['minute'] + $parsed['second'];
} else {
$time = MP3File::formatTime($duration1);
$parsed = date_parse($time);
$seconds = $parsed['hour'] * 60 + $parsed['minute'] + $parsed['second'];
}
}
$refreshTime = $seconds;
}

$url = "http://www.youtube.com/watch?v=". $track[$num];

$page = file_get_contents($url);
$doc = new DOMDocument();
$doc->loadHTML($page);

$title_div = $doc->getElementById('eow-title');
$title = $title_div->nodeValue;

if ($musicsource == "youtube") {
	$randomTrack = $track[$num];
	$youtubesong = $randomTrack;
	$musictitle = $title;
	$playstation = "";
}

if (isset($_GET['steamid'])) {
    $data = 'http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=1C647C7182A61B6766CC3CECCA9B7C4F&steamids='.$_GET['steamid'];
    $f = file_get_contents($data);
    $arr = json_decode($f, true);
    if (isset($arr['response']['players'][0]['personaname']))
        $plname = $arr['response']['players'][0]['personaname'];
    if (isset($arr['response']['players'][0]['avatarfull']))
        $avatar = $arr['response']['players'][0]['avatarfull'];
    if (isset($arr['response']['players'][0]['steamid']))
        $id64 = $arr['response']['players'][0]['steamid'];
    
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>FadedServers &middot; Loading</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="author" content="FadedServers Loading">
		<meta name="description" content="Displaying a loading screen while connecting">
		<?php if($refreshTime == 0) {$refreshTime = '10000000';} ?>
		<?php if($refresh == true) { print("<meta http-equiv='refresh' content='" . $refreshTime . "'>"); } ?>

		<link href="faded/inc/css/style.css" rel="stylesheet" type="text/css">
		<link href="faded/inc/css/fonts.css" rel="stylesheet" type="text/css">

		<link rel="stylesheet" href="faded/inc/css/bs.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
<body style="background-color: #34495e;">

<div class="move">
</div>

<div class="container">
	<div class="row">

		<div class="col-md-12">
			<img id="logo" width="333" src="faded/inc/img/codelight.png">
			<div class="sub">
					<div style="text-align: center;" class="sub-padding">
						The fadedservers community is not associated with fadedservers.com in any way - contact codelight for more information
					</div>
				</div>
		</div>

		<div class="col-md-8"> <!-- MAIN -->
			<div class="row">

				<div class="col-sm-12 center-align">

					<div class="staff2">
					<div class="staff2-padding">
						<div class="col-sm-3">
							<img id="staff2" width="64" src="faded/inc/img/SteamLogo.jpg">
						</div>
						<div class="col-sm-9">
							<h2 id="staff2">CodeLight</h2><small>Community Owner</small>
						</div>
					</div>
					<div class="staff2-text">
						Something needs to be written here.<br>
						Something needs to be written here eventually<br>
						Something needs to be written here sometime<br>
						Something needs to be written here soon<br>
						Something needs to be written here when possible<br>
					</div>
					</div>

					<div class="staff2">
					<div class="staff2-padding">
						<div class="col-sm-3">
							<img id="staff2" width="64" src="http://cdn.edgecast.steamstatic.com/steamcommunity/public/images/avatars/c4/c4d24463e1892466568365712d45bca07ce5df4e_medium.jpg">
						</div>
						<div class="col-sm-9">
							<h2 id="staff2">Ryan King</h2><small>Community Serveradmin</small>
						</div>
					</div>
					<div class="staff2-text">
						Something needs to be written here.<br>
						Something needs to be written here eventually<br>
						Something needs to be written here sometime<br>
						Something needs to be written here soon<br>
						Something needs to be written here when possible<br>
					</div>
					</div>

					<?php //addStaff(76561198085996502, 'John Papa', 'General Manager'); ?>
					<div class="staff2">
					<div class="staff2-padding">
						<div class="col-sm-3">
							<img id="staff2" width="64" src="http://cdn.edgecast.steamstatic.com/steamcommunity/public/images/avatars/e9/e9f8e2fb0fee86ef993ee839ce3b3e12234aa408_medium.jpg">
						</div>
						<div class="col-sm-9">
							<h2 id="staff2">Vela Pulsar</h2><small>Community Staff Manager</small>
						</div>
					</div>
				</div>

				
				<?php addStaff(76561198122828862, 'John Bolder', 'Community Staff Manager'); ?>



				</div>

			<div class="col-sm-12">
				<div class="sub">
					<div class="sub-header">
						GENERAL RULES
					</div>
					<div class="sub-padding">
						
						<div class="rule">
							<b>Dedicated Staff:</b> We prioritize our staff's main job to ensure that our customers are satisfied. We aim to resolve every inquiry as quickly as we can without compromising your satisfaction.
						</div>

						<div class="rule">
							<b>Powerful Hardware:</b> We've chosen hardware specifically to run our services. We've honed our hardware selection over time to get a good balance of selection of stability and performance.
						</div>

						<div class="rule">
							<b>Our Network:</b> We've put a large amount of effort into selecting providers in order to provide you a great connection while also allowing us to filter most the attacks we see today.
						</div>

					</div>
				</div>
			</div>

			</div>
		</div> <!-- MAIN END -->

		<div class="col-md-4"> <!-- SUB -->
			<div class="row">

			<div class="col-sm-12">
				<div class="sub">
					<div class="sub-header">
						RECENT POSTS
					</div>
					<div class="sub-padding">

						<div class="posts">

							<?php
              				$query = mysql_query("SELECT id, shout, steamname, steamimg from shout_box ORDER by id DESC");
              				while($fetch = mysql_fetch_assoc($query)) {
                				echo '
                				<div class="post center-align">
									<img id="post" src="' . $fetch['steamimg'] . '"></img><b>' . $fetch['steamname'] . '</b><br>' . $fetch['shout'] . '<hr />
								</div>';
              				}
            				?>

						</div>

					</div>
				</div>
			</div>

			<div class="col-sm-12">
				<div class="sub">
					<div class="sub-padding center-align">

						<?php echo($title); ?>

					</div>
				</div>
			</div>

			<div class="col-sm-12">
				<div class="sub">
					<div class="sub-header">
						CLIENT
					</div>
					<div class="sub-padding">
						<div class="row">

						<div class="col-md-3">
							<img id="user" src="<?php if(isset($_GET['steamid'])) { echo $avatar; } else { echo "faded/inc/img/SteamLogo.jpg"; } ?>"></img>
						</div>
						<div class="col-md-9">
							<div class="user">
								<?php if(isset($_GET['steamid'])) { echo $plname; } else { echo "CodeLight | FadedServers"; } ?><br>
								<?php if(isset($_GET['steamid'])) { echo $id64.'<br>'; } ?>
								<i>Total Connections: <?php echo "Unknown"; ?></i>
							</div>
						</div>

						</div>
					</div>
				</div>
			</div>

		</div> <!-- SUB END -->

	</div>
</div>
<?php // if($enableviewer == "1") { ?>
<?php if($musicsource == "youtube") { ?>
<!-- YouTube Support --
<iframe width="1280" height="0" src="https://www.youtube.com/embed/?autoplay=1&loop=1&enablejsapi=1" frameborder="0" allowfullscreen></iframe>
    <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
    <div id="player"></div>

    <script>
      // 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');

      tag.src = "<?php //https://dev.codelight.net/faded/inc?>https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '0',
          width: '640',
          videoId: '<?php print $youtubesong; ?>',
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.playVideo();
		player.setVolume(25);
      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          setTimeout(stopVideo, <?php print $refreshTime . "000"; ?>);
          done = true;
        }
      }
      function stopVideo() {
        player.stopVideo();
      }
	  function vol() {
		  console.log(player.getVolume());
	  }
	  function setvol(n) {
		  player.setVolume(n);
	  }
    </script>
<?php } ?>

<?php if($musicsource == "mp3") { ?>
<!-- File Support -->
<audio autoplay>
  <source src="<?php print $playstation . $randomTrack . ".mp3"; ?>" type="audio/mpeg">
</audio>

<?php } // }?>
</body>
</html>*/echo "test";
