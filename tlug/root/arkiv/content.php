<?php
$categories = array();
$years = array();
$months = array();
$days = array();
$command = '';
$command = 'ls -d */';
exec($command, $categories);
echo '<ol class="breadcrumb">';
for($category=0;$category<(count($categories)); $category++){
	echo '<li><a href="./' . $categories[$category] .'">' . $categories[$category] .'</a></li>';
} 
echo '</ol>';
?>