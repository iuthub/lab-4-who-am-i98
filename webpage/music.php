<?php

	$folder = "songs/";
	$files = scandir($folder);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Music Viewer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="viewer.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div id="header">

			<h1>190M Music Playlist Viewer</h1>
			<h2>Search Through Your Playlists and Music</h2>
		</div>


		<div id="listarea">
			<ul id="musiclist">
				<?php foreach($files as $file){ ?>
					<?php if(pathinfo($file)['extension'] == 'mp3'){ ?>
						<li class="mp3item">
							<a href="<?php echo $folder.$file; ?>" download><?php echo basename($file); ?></a>
							(<?php echo filesize($folder.$file); ?> b)
						</li>
					<?php } ?>
				<?php } ?>

				<li class="playlistitem">
					<a href="music.php?playlist=mypicks.txt">mypicks.txt</a>
				</li>

				<li class="playlistitem">
					<a href="music.php?playlist=playlist.txt">playlist.txt</a>
				</li>
			</ul>
		</div>
	</body>
</html>
