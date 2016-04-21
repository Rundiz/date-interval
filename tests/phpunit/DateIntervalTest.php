<?php


namespace Rundiz\DateInterval\Tests;

class DateIntervalTest extends \PHPUnit_Framework_TestCase
{


    public function testDateInterval2()
    {
        $date_begins = '2016-08-01';
        $date_end = '2016-12-31';
        $interval_unit = 'D';
        $interval_num = 2;

        if (!isset($DateInterval)) {
            $DateInterval = new \Rundiz\DateInterval\DateInterval();
            $DateInterval->date_begins = $date_begins;
            $DateInterval->date_end = $date_end;
            $DateInterval->setInterval($interval_num, $interval_unit);
        }

        $list_dates = $DateInterval->getTheDates();
        $expected_results = array(
            '2016-08-01', 
            '2016-08-03', 
            '2016-08-05', 
            '2016-08-07', 
            '2016-08-09', 
            '2016-08-11', 
            '2016-08-13', 
            '2016-08-15', 
            '2016-08-17', 
            '2016-08-19', 
            '2016-08-21', 
            '2016-08-23', 
            '2016-08-25', 
            '2016-08-27', 
            '2016-08-29', 
            '2016-08-31', 
            '2016-09-02', 
            '2016-09-04', 
            '2016-09-06', 
            '2016-09-08', 
            '2016-09-10', 
            '2016-09-12', 
            '2016-09-14', 
            '2016-09-16', 
            '2016-09-18', 
            '2016-09-20', 
            '2016-09-22', 
            '2016-09-24', 
            '2016-09-26', 
            '2016-09-28', 
            '2016-09-30', 
            '2016-10-02', 
            '2016-10-04', 
            '2016-10-06', 
            '2016-10-08', 
            '2016-10-10', 
            '2016-10-12', 
            '2016-10-14', 
            '2016-10-16', 
            '2016-10-18', 
            '2016-10-20', 
            '2016-10-22', 
            '2016-10-24', 
            '2016-10-26', 
            '2016-10-28', 
            '2016-10-30', 
            '2016-11-01', 
            '2016-11-03', 
            '2016-11-05', 
            '2016-11-07', 
            '2016-11-09', 
            '2016-11-11', 
            '2016-11-13', 
            '2016-11-15', 
            '2016-11-17', 
            '2016-11-19', 
            '2016-11-21', 
            '2016-11-23', 
            '2016-11-25', 
            '2016-11-27', 
            '2016-11-29', 
            '2016-12-01', 
            '2016-12-03', 
            '2016-12-05', 
            '2016-12-07', 
            '2016-12-09', 
            '2016-12-11', 
            '2016-12-13', 
            '2016-12-15', 
            '2016-12-17', 
            '2016-12-19', 
            '2016-12-21', 
            '2016-12-23', 
            '2016-12-25', 
            '2016-12-27', 
            '2016-12-29', 
            '2016-12-31'
        );
        $this->assertArraySubset($expected_results, $list_dates, '', sprintf('Generated date interval does not match the expected results. %s', var_export($list_dates, true)));
        unset($expected_results, $list_dates);

        $date_start = '2016-09-01';
        $date_stop = '2016-11-30';
        $list_dates = $DateInterval->getTheDates($date_start, $date_stop);
        $expected_results = array(
            '2016-09-02', 
            '2016-09-04', 
            '2016-09-06', 
            '2016-09-08', 
            '2016-09-10', 
            '2016-09-12', 
            '2016-09-14', 
            '2016-09-16', 
            '2016-09-18', 
            '2016-09-20', 
            '2016-09-22', 
            '2016-09-24', 
            '2016-09-26', 
            '2016-09-28', 
            '2016-09-30', 
            '2016-10-02', 
            '2016-10-04', 
            '2016-10-06', 
            '2016-10-08', 
            '2016-10-10', 
            '2016-10-12', 
            '2016-10-14', 
            '2016-10-16', 
            '2016-10-18', 
            '2016-10-20', 
            '2016-10-22', 
            '2016-10-24', 
            '2016-10-26', 
            '2016-10-28', 
            '2016-10-30', 
            '2016-11-01', 
            '2016-11-03', 
            '2016-11-05', 
            '2016-11-07', 
            '2016-11-09', 
            '2016-11-11', 
            '2016-11-13', 
            '2016-11-15', 
            '2016-11-17', 
            '2016-11-19', 
            '2016-11-21', 
            '2016-11-23', 
            '2016-11-25', 
            '2016-11-27', 
            '2016-11-29'
        );
        $this->assertArraySubset($expected_results, $list_dates, '', sprintf('Generated date interval does not match the expected results. %s', var_export($list_dates, true)));
        unset($date_start, $date_stop, $expected_results, $list_dates);

        $date_start = '2016-10-01';
        $date_stop = '2016-11-30';
        $list_dates = $DateInterval->getTheDates($date_start, $date_stop);
        $expected_results = array(
            '2016-10-02', 
            '2016-10-04', 
            '2016-10-06', 
            '2016-10-08', 
            '2016-10-10', 
            '2016-10-12', 
            '2016-10-14', 
            '2016-10-16', 
            '2016-10-18', 
            '2016-10-20', 
            '2016-10-22', 
            '2016-10-24', 
            '2016-10-26', 
            '2016-10-28', 
            '2016-10-30', 
            '2016-11-01', 
            '2016-11-03', 
            '2016-11-05', 
            '2016-11-07', 
            '2016-11-09', 
            '2016-11-11', 
            '2016-11-13', 
            '2016-11-15', 
            '2016-11-17', 
            '2016-11-19', 
            '2016-11-21', 
            '2016-11-23', 
            '2016-11-25', 
            '2016-11-27', 
            '2016-11-29'
        );
        $this->assertArraySubset($expected_results, $list_dates, '', sprintf('Generated date interval does not match the expected results. %s', var_export($list_dates, true)));
        unset($date_start, $date_stop, $expected_results, $list_dates);

        unset($date_begins, $date_end, $DateInterval, $interval_num, $interval_unit);
    }// testDateInterval2


    public function testDateInterval4()
    {
        $date_begins = '2016-08-01';
        $date_end = '2016-12-31';
        $interval_unit = 'D';
        $interval_num = 4;

        if (!isset($DateInterval)) {
            $DateInterval = new \Rundiz\DateInterval\DateInterval();
            $DateInterval->date_begins = $date_begins;
            $DateInterval->date_end = $date_end;
            $DateInterval->setInterval($interval_num, $interval_unit);
        }

        $list_dates = $DateInterval->getTheDates();
        $expected_results = array(
            '2016-08-01', 
            '2016-08-05', 
            '2016-08-09', 
            '2016-08-13', 
            '2016-08-17', 
            '2016-08-21', 
            '2016-08-25', 
            '2016-08-29', 
            '2016-09-02', 
            '2016-09-06', 
            '2016-09-10', 
            '2016-09-14', 
            '2016-09-18', 
            '2016-09-22', 
            '2016-09-26', 
            '2016-09-30', 
            '2016-10-04', 
            '2016-10-08', 
            '2016-10-12', 
            '2016-10-16', 
            '2016-10-20', 
            '2016-10-24', 
            '2016-10-28', 
            '2016-11-01', 
            '2016-11-05', 
            '2016-11-09', 
            '2016-11-13', 
            '2016-11-17', 
            '2016-11-21', 
            '2016-11-25', 
            '2016-11-29', 
            '2016-12-03', 
            '2016-12-07', 
            '2016-12-11', 
            '2016-12-15', 
            '2016-12-19', 
            '2016-12-23', 
            '2016-12-27', 
            '2016-12-31'
        );
        $this->assertArraySubset($expected_results, $list_dates, '', sprintf('Generated date interval does not match the expected results. %s', var_export($list_dates, true)));
        unset($expected_results, $list_dates);

        $date_start = '2016-09-01';
        $date_stop = '2016-11-30';
        $list_dates = $DateInterval->getTheDates($date_start, $date_stop);
        $expected_results = array(
            '2016-09-02', 
            '2016-09-06', 
            '2016-09-10', 
            '2016-09-14', 
            '2016-09-18', 
            '2016-09-22', 
            '2016-09-26', 
            '2016-09-30', 
            '2016-10-04', 
            '2016-10-08', 
            '2016-10-12', 
            '2016-10-16', 
            '2016-10-20', 
            '2016-10-24', 
            '2016-10-28', 
            '2016-11-01', 
            '2016-11-05', 
            '2016-11-09', 
            '2016-11-13', 
            '2016-11-17', 
            '2016-11-21', 
            '2016-11-25', 
            '2016-11-29'
        );
        $this->assertArraySubset($expected_results, $list_dates, '', sprintf('Generated date interval does not match the expected results. %s', var_export($list_dates, true)));
        unset($date_start, $date_stop, $expected_results, $list_dates);

        $date_start = '2016-10-01';
        $date_stop = '2016-11-30';
        $list_dates = $DateInterval->getTheDates($date_start, $date_stop);
        $expected_results = array(
            '2016-10-04', 
            '2016-10-08', 
            '2016-10-12', 
            '2016-10-16', 
            '2016-10-20', 
            '2016-10-24', 
            '2016-10-28', 
            '2016-11-01', 
            '2016-11-05', 
            '2016-11-09', 
            '2016-11-13', 
            '2016-11-17', 
            '2016-11-21', 
            '2016-11-25', 
            '2016-11-29'
        );
        $this->assertArraySubset($expected_results, $list_dates, '', sprintf('Generated date interval does not match the expected results. %s', var_export($list_dates, true)));
        unset($date_start, $date_stop, $expected_results, $list_dates);

        unset($date_begins, $date_end, $DateInterval, $interval_num, $interval_unit);
    }// testDateInterval4


    public function testDateInterval31()
    {
        $date_begins = '2016-08-01';
        $date_end = '2016-12-31';
        $interval_unit = 'D';
        $interval_num = 31;

        if (!isset($DateInterval)) {
            $DateInterval = new \Rundiz\DateInterval\DateInterval();
            $DateInterval->date_begins = $date_begins;
            $DateInterval->date_end = $date_end;
            $DateInterval->setInterval($interval_num, $interval_unit);
        }

        $list_dates = $DateInterval->getTheDates();
        $expected_results = array(
            '2016-08-01', 
            '2016-09-01', 
            '2016-10-02', 
            '2016-11-02', 
            '2016-12-03'
        );
        $this->assertArraySubset($expected_results, $list_dates, '', sprintf('Generated date interval does not match the expected results. %s', var_export($list_dates, true)));
        unset($expected_results, $list_dates);

        $date_start = '2016-09-01';
        $date_stop = '2016-11-30';
        $list_dates = $DateInterval->getTheDates($date_start, $date_stop);
        $expected_results = array(
            '2016-09-01', 
            '2016-10-02', 
            '2016-11-02'
        );
        $this->assertArraySubset($expected_results, $list_dates, '', sprintf('Generated date interval does not match the expected results. %s', var_export($list_dates, true)));
        unset($date_start, $date_stop, $expected_results, $list_dates);

        $date_start = '2016-10-01';
        $date_stop = '2016-11-30';
        $list_dates = $DateInterval->getTheDates($date_start, $date_stop);
        $expected_results = array(
            '2016-10-02', 
            '2016-11-02'
        );
        $this->assertArraySubset($expected_results, $list_dates, '', sprintf('Generated date interval does not match the expected results. %s', var_export($list_dates, true)));
        unset($date_start, $date_stop, $expected_results, $list_dates);

        unset($date_begins, $date_end, $DateInterval, $interval_num, $interval_unit);
    }// testDateInterval31


}
