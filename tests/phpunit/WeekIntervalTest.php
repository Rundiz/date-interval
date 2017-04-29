<?php


namespace Rundiz\DateInterval\Tests;

class WeekIntervalTest extends \PHPUnit\Framework\TestCase
{


    public function testWeekInterval2()
    {
        $date_begins = '2016-04-01';
        $date_end = '2016-12-31';
        $interval_unit = 'W';
        $interval_num = 2;

        if (!isset($DateInterval)) {
            $DateInterval = new \Rundiz\DateInterval\DateInterval();
            $DateInterval->date_begins = $date_begins;
            $DateInterval->date_end = $date_end;
            $DateInterval->setInterval($interval_num, $interval_unit);
        }

        $list_dates = $DateInterval->getTheDates();
        $expected_results = array(
            '2016-04-01', 
            '2016-04-15', 
            '2016-04-29', 
            '2016-05-13', 
            '2016-05-27', 
            '2016-06-10', 
            '2016-06-24', 
            '2016-07-08', 
            '2016-07-22', 
            '2016-08-05', 
            '2016-08-19', 
            '2016-09-02', 
            '2016-09-16', 
            '2016-09-30', 
            '2016-10-14', 
            '2016-10-28', 
            '2016-11-11', 
            '2016-11-25', 
            '2016-12-09', 
            '2016-12-23'
        );
        $this->assertArraySubset($expected_results, $list_dates, '', sprintf('Generated week interval does not match the expected results. %s', var_export($list_dates, true)));
        unset($expected_results, $list_dates);

        $date_start = '2016-06-01';
        $date_stop = '2016-11-30';
        $list_dates = $DateInterval->getTheDates($date_start, $date_stop);
        $expected_results = array(
            '2016-06-10', 
            '2016-06-24', 
            '2016-07-08', 
            '2016-07-22', 
            '2016-08-05', 
            '2016-08-19', 
            '2016-09-02', 
            '2016-09-16', 
            '2016-09-30', 
            '2016-10-14', 
            '2016-10-28', 
            '2016-11-11', 
            '2016-11-25'
        );
        $this->assertArraySubset($expected_results, $list_dates, '', sprintf('Generated week interval does not match the expected results. %s', var_export($list_dates, true)));
        unset($date_start, $date_stop, $expected_results, $list_dates);

        $date_start = '2016-08-01';
        $date_stop = '2016-12-30';
        $list_dates = $DateInterval->getTheDates($date_start, $date_stop);
        $expected_results = array(
            '2016-08-05', 
            '2016-08-19', 
            '2016-09-02', 
            '2016-09-16', 
            '2016-09-30', 
            '2016-10-14', 
            '2016-10-28', 
            '2016-11-11', 
            '2016-11-25', 
            '2016-12-09', 
            '2016-12-23'
        );
        $this->assertArraySubset($expected_results, $list_dates, '', sprintf('Generated week interval does not match the expected results. %s', var_export($list_dates, true)));
        unset($date_start, $date_stop, $expected_results, $list_dates);

        unset($date_begins, $date_end, $DateInterval, $interval_num, $interval_unit);
    }// testWeekInterval2


    public function testWeekInterval3()
    {
        $date_begins = '2016-04-01';
        $date_end = '2016-12-31';
        $interval_unit = 'W';
        $interval_num = 3;

        if (!isset($DateInterval)) {
            $DateInterval = new \Rundiz\DateInterval\DateInterval();
            $DateInterval->date_begins = $date_begins;
            $DateInterval->date_end = $date_end;
            $DateInterval->setInterval($interval_num, $interval_unit);
        }

        $list_dates = $DateInterval->getTheDates();
        $expected_results = array(
            '2016-04-01', 
            '2016-04-22', 
            '2016-05-13', 
            '2016-06-03', 
            '2016-06-24', 
            '2016-07-15', 
            '2016-08-05', 
            '2016-08-26', 
            '2016-09-16', 
            '2016-10-07', 
            '2016-10-28', 
            '2016-11-18', 
            '2016-12-09', 
            '2016-12-30'
        );
        $this->assertArraySubset($expected_results, $list_dates, '', sprintf('Generated week interval does not match the expected results. %s', var_export($list_dates, true)));
        unset($expected_results, $list_dates);

        $date_start = '2016-06-01';
        $date_stop = '2016-11-30';
        $list_dates = $DateInterval->getTheDates($date_start, $date_stop);
        $expected_results = array(
            '2016-06-03', 
            '2016-06-24', 
            '2016-07-15', 
            '2016-08-05', 
            '2016-08-26', 
            '2016-09-16', 
            '2016-10-07', 
            '2016-10-28', 
            '2016-11-18'
        );
        $this->assertArraySubset($expected_results, $list_dates, '', sprintf('Generated week interval does not match the expected results. %s', var_export($list_dates, true)));
        unset($date_start, $date_stop, $expected_results, $list_dates);

        $date_start = '2016-08-01';
        $date_stop = '2016-12-30';
        $list_dates = $DateInterval->getTheDates($date_start, $date_stop);
        $expected_results = array(
            '2016-08-05', 
            '2016-08-26', 
            '2016-09-16', 
            '2016-10-07', 
            '2016-10-28', 
            '2016-11-18', 
            '2016-12-09', 
            '2016-12-30'
        );
        $this->assertArraySubset($expected_results, $list_dates, '', sprintf('Generated week interval does not match the expected results. %s', var_export($list_dates, true)));
        unset($date_start, $date_stop, $expected_results, $list_dates);

        unset($date_begins, $date_end, $DateInterval, $interval_num, $interval_unit);
    }// testWeekInterval3


    public function testWeekInterval5()
    {
        $date_begins = '2016-04-01';
        $date_end = '2016-12-31';
        $interval_unit = 'W';
        $interval_num = 5;

        if (!isset($DateInterval)) {
            $DateInterval = new \Rundiz\DateInterval\DateInterval();
            $DateInterval->date_begins = $date_begins;
            $DateInterval->date_end = $date_end;
            $DateInterval->setInterval($interval_num, $interval_unit);
        }

        $list_dates = $DateInterval->getTheDates();
        $expected_results = array(
            '2016-04-01', 
            '2016-05-06', 
            '2016-06-10', 
            '2016-07-15', 
            '2016-08-19', 
            '2016-09-23', 
            '2016-10-28', 
            '2016-12-02'
        );
        $this->assertArraySubset($expected_results, $list_dates, '', sprintf('Generated week interval does not match the expected results. %s', var_export($list_dates, true)));
        unset($expected_results, $list_dates);

        $date_start = '2016-06-01';
        $date_stop = '2016-11-30';
        $list_dates = $DateInterval->getTheDates($date_start, $date_stop);
        $expected_results = array(
            '2016-06-10', 
            '2016-07-15', 
            '2016-08-19', 
            '2016-09-23', 
            '2016-10-28'
        );
        $this->assertArraySubset($expected_results, $list_dates, '', sprintf('Generated week interval does not match the expected results. %s', var_export($list_dates, true)));
        unset($date_start, $date_stop, $expected_results, $list_dates);

        $date_start = '2016-08-01';
        $date_stop = '2016-12-30';
        $list_dates = $DateInterval->getTheDates($date_start, $date_stop);
        $expected_results = array(
            '2016-08-19', 
            '2016-09-23', 
            '2016-10-28', 
            '2016-12-02'
        );
        $this->assertArraySubset($expected_results, $list_dates, '', sprintf('Generated week interval does not match the expected results. %s', var_export($list_dates, true)));
        unset($date_start, $date_stop, $expected_results, $list_dates);

        unset($date_begins, $date_end, $DateInterval, $interval_num, $interval_unit);
    }// testWeekInterval31


}
