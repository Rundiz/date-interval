<?php


namespace Rundiz\DateInterval\Tests;

class YearIntervalTest extends \PHPUnit\Framework\TestCase
{


    public function testYearInterval2()
    {
        $date_begins = '1999-06-01';
        $date_end = '2016-12-31';
        $interval_unit = 'Y';
        $interval_num = 2;

        if (!isset($DateInterval)) {
            $DateInterval = new \Rundiz\DateInterval\DateInterval();
            $DateInterval->date_begins = $date_begins;
            $DateInterval->date_end = $date_end;
            $DateInterval->setInterval($interval_num, $interval_unit);
        }

        $list_dates = $DateInterval->getTheDates();
        $expected_results = array(
            '1999-06-01', 
            '2001-06-01', 
            '2003-06-01', 
            '2005-06-01', 
            '2007-06-01', 
            '2009-06-01', 
            '2011-06-01', 
            '2013-06-01', 
            '2015-06-01'
        );
        $this->assertSame($expected_results, $list_dates);
        unset($expected_results, $list_dates);

        $date_start = '2002-06-01';
        $date_stop = '2016-11-30';
        $list_dates = $DateInterval->getTheDates($date_start, $date_stop);
        $expected_results = array(
            '2003-06-01', 
            '2005-06-01', 
            '2007-06-01', 
            '2009-06-01', 
            '2011-06-01', 
            '2013-06-01', 
            '2015-06-01'
        );
        $this->assertSame($expected_results, $list_dates);
        unset($date_start, $date_stop, $expected_results, $list_dates);

        $date_start = '2004-06-01';
        $date_stop = '2016-11-30';
        $list_dates = $DateInterval->getTheDates($date_start, $date_stop);
        $expected_results = array(
            '2005-06-01', 
            '2007-06-01', 
            '2009-06-01', 
            '2011-06-01', 
            '2013-06-01', 
            '2015-06-01'
        );
        $this->assertSame($expected_results, $list_dates);
        unset($date_start, $date_stop, $expected_results, $list_dates);

        unset($date_begins, $date_end, $DateInterval, $interval_num, $interval_unit);
    }// testYearInterval2


    public function testYearInterval3()
    {
        $date_begins = '1993-06-01';
        $date_end = '2016-12-31';
        $interval_unit = 'Y';
        $interval_num = 3;

        if (!isset($DateInterval)) {
            $DateInterval = new \Rundiz\DateInterval\DateInterval();
            $DateInterval->date_begins = $date_begins;
            $DateInterval->date_end = $date_end;
            $DateInterval->setInterval($interval_num, $interval_unit);
        }

        $list_dates = $DateInterval->getTheDates();
        $expected_results = array(
            '1993-06-01', 
            '1996-06-01', 
            '1999-06-01', 
            '2002-06-01', 
            '2005-06-01', 
            '2008-06-01', 
            '2011-06-01', 
            '2014-06-01'
        );
        $this->assertSame($expected_results, $list_dates);
        unset($expected_results, $list_dates);

        $date_start = '1996-06-01';
        $date_stop = '2016-11-30';
        $list_dates = $DateInterval->getTheDates($date_start, $date_stop);
        $expected_results = array(
            '1996-06-01', 
            '1999-06-01', 
            '2002-06-01', 
            '2005-06-01', 
            '2008-06-01', 
            '2011-06-01', 
            '2014-06-01'
        );
        $this->assertSame($expected_results, $list_dates);
        unset($date_start, $date_stop, $expected_results, $list_dates);

        $date_start = '1998-06-01';
        $date_stop = '2016-11-30';
        $list_dates = $DateInterval->getTheDates($date_start, $date_stop);
        $expected_results = array(
            '1999-06-01', 
            '2002-06-01', 
            '2005-06-01', 
            '2008-06-01', 
            '2011-06-01', 
            '2014-06-01'
        );
        $this->assertSame($expected_results, $list_dates);
        unset($date_start, $date_stop, $expected_results, $list_dates);

        unset($date_begins, $date_end, $DateInterval, $interval_num, $interval_unit);
    }// testYearInterval3


    public function testYearInterval5()
    {
        $date_begins = '1974-06-01';
        $date_end = '2016-12-31';
        $interval_unit = 'Y';
        $interval_num = 5;

        if (!isset($DateInterval)) {
            $DateInterval = new \Rundiz\DateInterval\DateInterval();
            $DateInterval->date_begins = $date_begins;
            $DateInterval->date_end = $date_end;
            $DateInterval->setInterval($interval_num, $interval_unit);
        }

        $list_dates = $DateInterval->getTheDates();
        $expected_results = array(
            '1974-06-01', 
            '1979-06-01', 
            '1984-06-01', 
            '1989-06-01', 
            '1994-06-01', 
            '1999-06-01', 
            '2004-06-01', 
            '2009-06-01', 
            '2014-06-01'
        );
        $this->assertSame($expected_results, $list_dates);
        unset($expected_results, $list_dates);

        $date_start = '1977-06-01';
        $date_stop = '2016-11-30';
        $list_dates = $DateInterval->getTheDates($date_start, $date_stop);
        $expected_results = array(
            '1979-06-01', 
            '1984-06-01', 
            '1989-06-01', 
            '1994-06-01', 
            '1999-06-01', 
            '2004-06-01', 
            '2009-06-01', 
            '2014-06-01'
        );
        $this->assertSame($expected_results, $list_dates);
        unset($date_start, $date_stop, $expected_results, $list_dates);

        $date_start = '1979-06-01';
        $date_stop = '2016-11-30';
        $list_dates = $DateInterval->getTheDates($date_start, $date_stop);
        $expected_results = array(
            '1979-06-01', 
            '1984-06-01', 
            '1989-06-01', 
            '1994-06-01', 
            '1999-06-01', 
            '2004-06-01', 
            '2009-06-01', 
            '2014-06-01'
        );
        $this->assertSame($expected_results, $list_dates);
        unset($date_start, $date_stop, $expected_results, $list_dates);

        unset($date_begins, $date_end, $DateInterval, $interval_num, $interval_unit);
    }// testYearInterval31


}
