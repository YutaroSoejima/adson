<?php
function get_day_of_week($date){
	$datetime = new DateTime($date);
	$week = array("日", "月", "火", "水", "木", "金", "土");
	$w = (int)$datetime->format('w');
	echo $week[$w];
}