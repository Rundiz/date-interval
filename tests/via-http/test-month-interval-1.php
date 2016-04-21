<?php

require dirname(dirname(__DIR__)).'/Rundiz/DateInterval/DateInterval.php';


// functions for use in this page. ------------------------------------------------------------------------------------------
include __DIR__.'/functions.php';
// end functions for use in this page. -------------------------------------------------------------------------------------


$date_begins = date('Y-04-01');
$date = new \DateTime($date_begins);
$date->modify('-1 year');
$previous_year = $date->format('Y');
$date_begins = $date->format('Y-m-d');
$date_end = date('Y-12-31');
$interval_num = 2;
$interval_unit = 'M';
unset($date);

echo 'begins date: '.$date_begins.' end date: '.$date_end.'<br>'."\n";
echo 'interval: '.$interval_num.' '.$interval_unit.' (D = days, W = weeks, M = months, Y = years)<br>'."\n";
echo '<hr>'."\n\n";

$okvdint = new \Rundiz\DateInterval\DateInterval();
$okvdint->date_begins = $date_begins;
$okvdint->date_end = $date_end;
$okvdint->setInterval($interval_num, $interval_unit);

// list all dates from begins to end. ---------------------------------------------------------------------------------------
echo '<div style="float:left; margin-right: 20px; width: 300px;">'."\n";
echo 'start list dates from begins until end.<br>'."\n";

$list_dates = $okvdint->getTheDates();

listDates($list_dates);

unset($list_dates);
echo '</div>'."\n";


// set start displaying date and stop displaying date 1 and list all dates from start within interval range. ----------
$date_start = date('Y-06-01');
$date_stop = date('Y-11-30');
$list_dates = $okvdint->getTheDates($date_start, $date_stop);

echo '<div style="float:left; margin-right: 20px; width: 430px;">'."\n";
echo 'list start date ('.$date_start.') until stop date ('.$date_stop.').<br>'."\n";

listDates($list_dates);

unset($list_dates);
echo '</div>'."\n";

// set start displaying date and stop displaying date 2 and list all dates from start within interval range. ----------
$date_start = date($previous_year.'-08-02');
$date_stop = date('Y-12-30');
$list_dates = $okvdint->getTheDates($date_start, $date_stop);

echo '<div style="float:left; margin-right: 20px; width: 430px;">'."\n";
echo 'list start date ('.$date_start.') until stop date ('.$date_stop.').<br>'."\n";

listDates($list_dates);

unset($list_dates);
echo '</div>'."\n";

// end ------------------------------------------------------------------------------------------------------------------------
echo '<div style="clear: both;"></div>'."\n\n";
echo pageBenchmark();
unset($okvdint);