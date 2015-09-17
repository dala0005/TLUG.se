<?php
$categories = array();
$years = array();
$months = array();
$days = array();
$command = '';
$command = 'ls -d */';
exec($command, $categories);
echo '<ol class="breadcrumb">';
echo '<li class="active">nyheter/</li>';
for($category=0;$category<(count($categories)); $category++){
	echo '<li><a href="./' . $categories[$category] .'">' . $categories[$category] .'</li></p>';
} 
echo '</ol>';
?>
