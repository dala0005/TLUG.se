<?php
session_start();
$publisher = $_SESSION['member']['alias'];
$date_time = array(); // date and time
$command = ''; // command to run
$output = array(); // output from command
$msg = '<ul>';
$path = './nyheter/';
if((isset($_POST['title'])) && (isset($_POST['content']))){
	// NOTE: remove symbols: :, ?, \, /
	$title = $_POST['title'];
	$title = str_replace(' ', '_', $title);
	 $date_time_str = shell_exec('date "+ %Y:%m:%d:%H_%M_%S_' . $title . '"');
	 $date_time_str = str_replace(' ', '', $date_time_str);
	 $date_time_str = trim($date_time_str);
	 $date_time = explode(":", $date_time_str);

	 // Create folders
	 for($i=0; $i<count($date_time); $i++){ // Run four times [Year, Month, day, time + title]
	 	$command = 'ls ' . $path . ' | grep ' . $date_time[$i]; // declare command
	 	exec($command, $output); // execute command and save output

	 	if((count($output))==0){ // if output == 0
	 		if(mkdir($path . $date_time[$i], 0777)){ // 
	 			if($i==0){
	 				shell_exec('ln -s ../../nyheter/' .  $date_time[$i] . ' ./arkiv/nyheter/');
	 			}
	 			$msg = $msg . '<li>Skapar katalog ' . $path . '<b>' . $date_time[$i] . '</b></li>';	
	 		}
	 	}
	 	else{
	 		$msg = $msg . '<li>Skapar <b>INTE</b> katalog ' . $path . '<b>' . $date_time[$i] . '</b> - katalogen finns redan</li>';
	 	}
	 	$path = $path . $date_time[$i] . '/';
	 	$output = array();
	 }

	 // Create files
	 $title = str_replace('_', ' ', $title);
	 $date = '';
	 $time = '';
	 for($dateElement=0;$dateElement<count($date_time);$dateElement++){
	 	if($dateElement == (count($date_time)-1)){
	 		$date_time[$dateElement] = str_replace('_', ':', $date_time[$dateElement]);
	 		for($timeElement=0;$timeElement<8;$timeElement++){
	 			$time=$time . $date_time[$dateElement][$timeElement];
	 		}
	 	}
	 	if($dateElement == (count($date_time)-2)){
	 		$date = $date . $date_time[$dateElement];
	 	}
	 	else if($dateElement != (count($date_time)-1)){
	 		$date = $date . $date_time[$dateElement] . '-';
	 	}
	 	else{
	 		$date = $date . ' ' . $time;
	 	}
	 }
	 $command = 'touch ' . $path . 'index.php ' . $path . 'content.php; echo "' . $title . '" > ' . $path . 'title.txt;  echo "' . $_POST['content'] . '" > ' . $path . 'content.txt; echo "' . $date . '" > ' . $path . 'date.txt; echo "' . $publisher . '" > ' . $path . 'publisher.txt';
	 exec($command, $output);
	 $msg = $msg . '<li>Skapar fil ' . $path .'<b>index.php</b></li>';
	 $msg = $msg . '<li>Skapar fil ' . $path .'<b>content.php</b></li>';
	 $msg = $msg . '<li>Skapar fil ' . $path .'<b>title.txt</b></li>';
	 $msg = $msg . '<li>Skapar fil ' . $path .'<b>content.txt</b></li>';
	 $msg = $msg . '<li>Skapar fil ' . $path .'<b>date.txt</b></li>';
	 $msg = $msg . '<li>Skapar fil ' . $path .'<b>publisher.txt</b></li>';
	 $msg = $msg . '</ul>';


	 echo $msg;
}
?>