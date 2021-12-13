<?php

require dirname(dirname(__DIR__)).'/Rundiz/DateInterval/DateInterval.php';


// functions for use in this page. ------------------------------------------------------------------------------------------
include __DIR__.'/functions.php';
// end functions for use in this page. -------------------------------------------------------------------------------------


$date_begins = date('Y-04-01');
$date_end = date('Y-12-31');
$interval_num = 3;
$interval_unit = 'W';

echo 'begins date: '.$date_begins.' end date: '.$date_end.'<br>'."\n";
echo 'interval: '.$interval_num.' '.$interval_unit.' (D = days, W = weeks, M = months, Y = years)<br>'."\n";
echo '<hr>'."\n\n";

$DateInterval = new \Rundiz\DateInterval\DateInterval();
$DateInterval->date_begins = $date_begins;
$DateInterval->date_end = $date_end;
$DateInterval->setInterval($interval_num, $interval_unit);

// list all dates from begins to end. ---------------------------------------------------------------------------------------
echo '<div style="float:left; margin-right: 20px; width: 300px;">'."\n";
echo 'start list dates from begins until end.<br>'."\n";

$list_dates = $DateInterval->getTheDates();

listDates($list_dates);

unset($list_dates);
echo '</div>'."\n";


// set start displaying date and stop displaying date 1 and list all dates from start within interval range. ----------
$date_start = date('Y-06-01');
$date_stop = date('Y-11-30');
$list_dates = $DateInterval->getTheDates($date_start, $date_stop);

echo '<div style="float:left; margin-right: 20px; width: 430px;">'."\n";
echo 'list start date ('.$date_start.') until stop date ('.$date_stop.').<br>'."\n";

listDates($list_dates);

unset($list_dates);
echo '</div>'."\n";

// set start displaying date and stop displaying date 2 and list all dates from start within interval range. ----------
$date_start = date('Y-08-06');
$date_stop = date('Y-12-30');
$list_dates = $DateInterval->getTheDates($date_start, $date_stop);

echo '<div style="float:left; margin-right: 20px; width: 430px;">'."\n";
echo 'list start date ('.$date_start.') until stop date ('.$date_stop.').<br>'."\n";

listDates($list_dates);

unset($list_dates);
echo '</div>'."\n";

// end ------------------------------------------------------------------------------------------------------------------------
echo '<div style="clear: both;"></div>'."\n\n";
echo pageBenchmark();
unset($DateInterval);