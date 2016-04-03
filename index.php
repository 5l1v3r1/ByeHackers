<?php 
	/*
		ByeHackers PHP Script v2
		Coded by João Artur (K3N1)
		www.youtube.com/c/KeniGamer
	*/
		//Include ByeHackers
		require_once("byehackers.php");



	// How to use antisqlinjection
		if (isset($_GET['id'])) {
			$id = antisqlinjection($_GET['id']);
			echo $id;
		}
	// How to use antixss
		if (isset($_GET['q'])) {
			$q = antixss($_GET['q']);
			echo $q;
		}
	// How to use antilfi
		if (isset($_GET['file'])) {
			$file = antilfi($_GET['file']);
			echo $file;
		}
	// How to use antirfi
		if (isset($_GET['site'])) {
			$site = antirfi($_GET['site']);
			echo antixss($site);
		}
	

?>
