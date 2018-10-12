# DateInterval Component

Set the begins date, interval get get exactly start date in range.

[![Latest Stable Version](https://poser.pugx.org/rundiz/date-interval/v/stable)](https://packagist.org/packages/rundiz/date-interval)
[![License](https://poser.pugx.org/rundiz/date-interval/license)](https://packagist.org/packages/rundiz/date-interval)
[![Total Downloads](https://poser.pugx.org/rundiz/date-interval/downloads)](https://packagist.org/packages/rundiz/date-interval)

For example: begining date is 2019-03-01; start displaying date is 2019-03-02; interval and range is every **3 days**; the exactly start displaying date should be 2019-03-04.


```php
$date_begins = '2018-08-01';
$date_end = '2018-12-31';
$interval_num = 10;
$interval_unit = 'D';

$DateInterval = new \Rundiz\DateInterval\DateInterval();
$DateInterval->date_begins = $date_begins;
$DateInterval->date_end = $date_end;
$DateInterval->setInterval($interval_num, $interval_unit);

$list_dates = $DateInterval->getTheDates();

if ($list_dates == false || !is_array($list_dates)) {
    echo "\t".'<h3>Error!</h3>'."\n";
    // Displaying the error messages from class.
    foreach ($DateInterval->getErrorMessage() as $err_msg) {
        echo "\t\t".$err_msg.'<br>'."\n";
    }
    // Or!! if you want to use your custom error message, translation please use the code below instead.
    /*foreach ($DateInterval->getErrorCodes() as $err_code) {
        // for more, please read the docblock at `getErrorCodes()` method.
        switch ($err_code) {
            case 'RDDINTV_NO_DATE_BEGINS':
                echo 'There is no begins date or invalid format.<br>'."\n";
                break;
            case 'RDDINTV_INCORRECT_DATE_BEGINS':
                echo 'The begins date value is incorrect.<br>'."\n";
                break;
            case 'RDDINTV_NO_INTERVAL_RANGE':
                echo 'Please enter interval or range in <code>setInterval()</code> method.<br>'."\n";
                break;
            default:
                echo 'Unknow error!<br>'."\n";
                break;
        }
    }*/
} else {
    foreach ($list_dates as $each_date) {
        echo "\t".$each_date.'<br>'."\n";
    }
}

```

From the code above, the result will be:

> 2018-08-01<br>
> 2018-08-11<br>
> 2018-08-21<br>
> 2018-08-31<br>
> 2018-09-10<br>
> 2018-09-20<br>
> 2018-09-30<br>
> 2018-10-10<br>
> 2018-10-20<br>
> 2018-10-30<br>
> 2018-11-09<br>
> 2018-11-19<br>
> 2018-11-29<br>
> 2018-12-09<br>
> 2018-12-19<br>
> 2018-12-29<br>

And if you add more specific to start and stop date.

```php
$DateInterval->getTheDates('2018-10-05', '2018-11-30');
```

From the code above, the result will be:

> 2018-10-10<br>
> 2018-10-20<br>
> 2018-10-30<br>
> 2018-11-09<br>
> 2018-11-19<br>
> 2018-11-29<br>

For more example, please look in tests folder.