<?php


namespace Rundiz\DateInterval\Tests;

class MonthIntervalTest extends \PHPUnit\Framework\TestCase
{


    public function testMonthInterval2()
    {
        $date_begins = '2015-04-01';
        $date_end = '2016-12-31';
        $interval_unit = 'M';
        $interval_num = 2;

        if (!isset($DateInterval)) {
            $DateInterval = new \Rundiz\DateInterval\DateInterval();
            $DateInterval->date_begins = $date_begins;
            $DateInterval->date_end = $date_end;
            $DateInterval->setInterval($interval_num, $interval_unit);
        }

        $list_dates = $DateInterval->getTheDates();
        $expected_results = array(
            '2015-04-01', 
            '2015-06-01', 
            '2015-08-01', 
            '2015-10-01', 
            '2015-12-01', 
            '2016-02-01', 
            '2016-04-01', 
            '2016-06-01', 
            '2016-08-01', 
            '2016-10-01', 
            '2016-12-01'
        );
        $this->assertSame($expected_results, $list_dates);
        unset($expected_results, $list_dates);

        $date_start = '2016-06-01';
        $date_stop = '2016-11-30';
        $list_dates = $DateInterval->getTheDates($date_start, $date_stop);
        $expected_results = array(
            '2016-06-01', 
            '2016-08-01', 
            '2016-10-01'
        );
        $this->assertSame($expected_results, $list_dates);
        unset($date_start, $date_stop, $expected_results, $list_dates);

        $date_start = '2015-08-02';
        $date_stop = '2016-12-30';
        $list_dates = $DateInterval->getTheDates($date_start, $date_stop);
        $expected_results = array(
            '2015-10-01', 
            '2015-12-01', 
            '2016-02-01', 
            '2016-04-01', 
            '2016-06-01', 
            '2016-08-01', 
            '2016-10-01', 
            '2016-12-01'
        );
        $this->assertSame($expected_results, $list_dates);
        unset($date_start, $date_stop, $expected_results, $list_dates);

        unset($date_begins, $date_end, $DateInterval, $interval_num, $interval_unit);
    }// testMonthInterval2


    public function testMonthInterval3()
    {
        $date_begins = '2015-04-01';
        $date_end = '2016-12-31';
        $interval_unit = 'M';
        $interval_num = 3;

        if (!isset($DateInterval)) {
            $DateInterval = new \Rundiz\DateInterval\DateInterval();
            $DateInterval->date_begins = $date_begins;
            $DateInterval->date_end = $date_end;
            $DateInterval->setInterval($interval_num, $interval_unit);
        }

        $list_dates = $DateInterval->getTheDates();
        $expected_results = array(
            '2015-04-01', 
            '2015-07-01', 
            '2015-10-01', 
            '2016-01-01', 
            '2016-04-01', 
            '2016-07-01', 
            '2016-10-01'
        );
        $this->assertSame($expected_results, $list_dates);
        unset($expected_results, $list_dates);

        $date_start = '2015-06-01';
        $date_stop = '2016-11-30';
        $list_dates = $DateInterval->getTheDates($date_start, $date_stop);
        $expected_results = array(
            '2015-07-01', 
            '2015-10-01', 
            '2016-01-01', 
            '2016-04-01', 
            '2016-07-01', 
            '2016-10-01'
        );
        $this->assertSame($expected_results, $list_dates);
        unset($date_start, $date_stop, $expected_results, $list_dates);

        $date_start = '2015-07-02';
        $date_stop = '2016-12-30';
        $list_dates = $DateInterval->getTheDates($date_start, $date_stop);
        $expected_results = array( 
            '2015-10-01', 
            '2016-01-01', 
            '2016-04-01', 
            '2016-07-01', 
            '2016-10-01'
        );
        $this->assertSame($expected_results, $list_dates);
        unset($date_start, $date_stop, $expected_results, $list_dates);

        unset($date_begins, $date_end, $DateInterval, $interval_num, $interval_unit);
    }// testMonthInterval3


    public function testMonthInterval5()
    {
        $date_begins = '2014-04-01';
        $date_end = '2016-12-31';
        $interval_unit = 'M';
        $interval_num = 5;

        if (!isset($DateInterval)) {
            $DateInterval = new \Rundiz\DateInterval\DateInterval();
            $DateInterval->date_begins = $date_begins;
            $DateInterval->date_end = $date_end;
            $DateInterval->setInterval($interval_num, $interval_unit);
        }

        $list_dates = $DateInterval->getTheDates();
        $expected_results = array(
            '2014-04-01', 
            '2014-09-01', 
            '2015-02-01', 
            '2015-07-01', 
            '2015-12-01', 
            '2016-05-01', 
            '2016-10-01'
        );
        $this->assertSame($expected_results, $list_dates);
        unset($expected_results, $list_dates);

        $date_start = '2014-06-01';
        $date_stop = '2016-11-30';
        $list_dates = $DateInterval->getTheDates($date_start, $date_stop);
        $expected_results = array(
            '2014-09-01', 
            '2015-02-01', 
            '2015-07-01', 
            '2015-12-01', 
            '2016-05-01', 
            '2016-10-01'
        );
        $this->assertSame($expected_results, $list_dates);
        unset($date_start, $date_stop, $expected_results, $list_dates);

        $date_start = '2014-07-02';
        $date_stop = '2016-12-30';
        $list_dates = $DateInterval->getTheDates($date_start, $date_stop);
        $expected_results = array(
            '2014-09-01', 
            '2015-02-01', 
            '2015-07-01', 
            '2015-12-01', 
            '2016-05-01', 
            '2016-10-01'
        );
        $this->assertSame($expected_results, $list_dates);
        unset($date_start, $date_stop, $expected_results, $list_dates);

        unset($date_begins, $date_end, $DateInterval, $interval_num, $interval_unit);
    }// testMonthInterval31


}
