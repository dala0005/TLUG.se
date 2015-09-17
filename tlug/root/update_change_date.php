<p class="text-center">
<?php
$time="";
$date="";
$temp = array();
setlocale(LC_ALL, 'sw_SW');
$filename = '../index.php';
if (file_exists($filename)) {
	$time = date ("H:i:s", filemtime($filename));
	$date = date ("d F Y", filemtime($filename));
    $date = strtolower($date);
	$temp = explode(" ", $date);
	switch($temp[1]){
		case 'january':{
			$temp[1] = 'januari';
		}
		break;

		case 'january':{
			$temp[1] = 'februari';
		}
		break;

		case 'may':{
			$temp[1] = 'maj';
		}
		break;

		case 'june':{
			$temp[1] = 'juni';
		}
		break;

		case 'july':{
			$temp[1] = 'juli';
		}
		break;

		case 'august':{
			$temp[1] = 'augusti';
		}
		break;

		case 'october':{
			$temp[1] = 'oktober';
		}
		break;
	}
	$date = $temp[0] . ' ' . $temp[1] . ' ' . $temp[2];
	$filename = '../date.txt'; 
	exec('echo "Sidan ändrades senast klockan ' . $time . ' den ' . $date . '" > ' . $filename);

} 
?>
</p>
