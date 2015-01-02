<!DOCTYPE html PUBLIC
	"-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" >
<?php
$h = opendir(".");
while ($file = readdir($h)) {
	if (substr($file,-15,15) == "_grab-thumb.png") {
		$shoots[] = substr($file,0,-15);
	}
}
rsort($shoots);
closedir($h);
$nb = count($shoots);
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>Mose Shoots</title>
<style type="text/css"><!--
body {
	background-color : #000000;
	color : #999999;
}
a {
	text-decoration : none;
	font-family : fixed, monospace;
	font-size : 9pt;
	color : #66aaff;
	padding : 3px 12px 3px 12px;
	-moz-border-radius : 1em;
	border : 1px solid #000000;
}
a:hover {
	background-color : #232323;
	border : 1px solid #999966;
	color : #FFFFFF;
	font-weight : bold;
}
a.on {
	border : 1px solid #666633;
}
div, pre {
	margin : 10px;
	padding : 10px;
	border : 1px solid #999966;
	-moz-border-radius : 1em;
}
--></style>
</head>
<body>
<div align="center">
<a href="http://mose.com">mose</a>
<a href="index.php">shoots</a>
</div>
<?
if (isset($_GET['shoot'])) {
	$shoot = preg_replace("/[^-0-9]/","",$_GET['shoot']);
	echo '<div align="center"><img src="'.$shoot.'_grab.png"';
	echo ' border="1" alt="'.$shoot.'" />';
	echo '<div>'.$shoot.'</div></div>';
}
?>
<div>
<?
if (isset($_GET['s'])) {
	$s = preg_replace("/[^0-9]/","",$_GET['s']);
} else {
	$s = 0;
}
for ($i=$s;$i<$s+5;$i++) {
	$sh = $shoots[$i];
	echo '<a href="index.php?';
	if (isset($_GET['s'])) {
		echo 's='.$_GET['s'].'&amp;';
	}
	echo 'shoot='.urlencode($sh).'"><img src="'.$sh.'_grab-thumb.png"';
	echo ' border="1" alt="'.$sh.'" /></a>';
}
?>
</div>
<?
for ($i=0;$i<$nb;$i++) {
	echo '<a href="index.php?s='.$i.'"';
	if ($i >= $s and $i < $s+5) { echo ' class="on"'; }
	echo '>'.$shoots[$i].'</a> ';
}
?>
<pre>alias shoot="scrot -s -b -t 15 -e 'scp -pC *_grab*png mose.com:shoot/ &amp;&amp; echo http://eye.mose.com/\$f' '%Y-%m-%d-%H-%M_grab.png' &amp;&amp; rm -f *_grab*png"</pre>
<pre><?
ini_set('highlight.comment','#666666');
ini_set('highlight.default','#decebe');
ini_set('highlight.html',   '#6688AA');
ini_set('highlight.keyword','#66AA88');
ini_set('highlight.string', '#AA8866');
highlight_file(__FILE__);
?></pre>
</body>
</html>
<!-- this code is public domain. https://github.com/mose/shoot -->
