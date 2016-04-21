# DateInterval Component

Set the begins date, interval get get exactly start date in range.

[![Latest Stable Version](https://poser.pugx.org/rundiz/date-interval/v/stable)](https://packagist.org/packages/rundiz/date-interval)
[![License](https://poser.pugx.org/rundiz/date-interval/license)](https://packagist.org/packages/rundiz/date-interval)
[![Total Downloads](https://poser.pugx.org/rundiz/date-interval/downloads)](https://packagist.org/packages/rundiz/date-interval)

For example: begining date is 2015-08-01; start displaying date is 2015-09-01; interval and range is every 3 days; the exactly start displaying date should be 2015-09-03.


```php
$date_begins = date('Y-08-01');
$date_end = date('Y-12-31');
$interval_num = 2;
$interval_unit = 'D';

$okvdint = new \Rundiz\DateInterval\DateInterval();
$okvdint->date_begins = $date_begins;
$okvdint->date_end = $date_end;
$okvdint->setInterval($interval_num, $interval_unit);

$list_dates = $okvdint->getTheDates();

if ($list_dates == false || !is_array($list_dates)) {
    echo "\t".'<h3>Error!</h3>'."\n";
    foreach ($okvdint->getErrorMessage() as $err_msg) {
        echo "\t\t".$err_msg.'<br>'."\n";
    }
} else {
    foreach ($list_dates as $each_date) {
        echo "\t".$each_date.'<br>'."\n";
    }
}

// ----------------------

$date_start = date('Y-09-01');
$date_stop = date('Y-11-30');
$list_dates = $okvdint->getTheDates($date_start, $date_stop);

if ($list_dates == false || !is_array($list_dates)) {
    echo "\t".'<h3>Error!</h3>'."\n";
    foreach ($okvdint->getErrorMessage() as $err_msg) {
        echo "\t\t".$err_msg.'<br>'."\n";
    }
} else {
    foreach ($list_dates as $each_date) {
        echo "\t".$each_date.'<br>'."\n";
    }
}
```

For more example, please look in tests folder.