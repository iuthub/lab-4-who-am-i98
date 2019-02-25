<?php

	$folder = "songs/";
	$files = scandir($folder);
	
	if(isset($_REQUEST['playlist'])){
		$playlist = $_REQUEST['playlist'];
		$musics = (file_get_contents($folder.$playlist));
		$files = explode("\n",$musics);
	}
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
			<h2>Search Through Your Playlists and Music <?php echo pathinfo($files[0])['extension']; ?></h2>
		</div>


		<div id="listarea">
			<ul id="musiclist">
				<?php for($i=0;$i<count($files);$i++){ ?>
					<?php if(pathinfo($files[$i])['extension'] == 'mp3'){ ?>
						<li class="mp3item">
							<a href="<?php echo $folder.$files[$i]; ?>" download><?php echo basename($files[$i]); ?></a>
							(
								<?php 
									$size = filesize($folder.$files[$i]);
									if($size < 1023 ){
										echo $size." b";
									}else if($size>1024 && $size<1048575){
										echo round($size/10**3,2)." kb";
									}else if($size > 1048576){
										echo round($size/10**6,2)." mb";
									}
								?> 
							)
						</li>
					<?php } ?>
				<?php } ?>

				<?php foreach($files as $file){ ?>
					<?php if(pathinfo($file)['extension'] == 'txt'){ ?>
						<li class="playlistitem">
							<a href="music.php?playlist=<?php echo basename($file); ?>"><?php echo basename($file); ?></a>
						</li>
					<?php } ?>
				<?php } ?>

			</ul>
		</div>
	</body>
</html>
