<?php


namespace Rundiz\DateInterval\Tests;

class FunctionalTest extends \PHPUnit\Framework\TestCase
{


    public function testGetExactlyStartDate()
    {
        $DateInterval = new \Rundiz\DateInterval\DateInterval();

        $DateInterval->date_begins = '2018-08-01';
        $DateInterval->date_end = '2018-12-31';
        $DateInterval->setInterval(2, 'D');
        $this->assertEquals('2018-08-01', $DateInterval->getExactlyStartDate($DateInterval->date_begins));
        $this->assertEquals('2018-08-01', $DateInterval->getExactlyStartDate('2018-03-01'));// start date less than begins date.
        $this->assertEquals('2018-09-02', $DateInterval->getExactlyStartDate('2018-09-01'));
        $this->assertEquals('2018-10-02', $DateInterval->getExactlyStartDate('2018-10-01'));
        $this->assertEquals('2018-11-01', $DateInterval->getExactlyStartDate('2018-11-01'));
        $this->assertEquals('2018-12-01', $DateInterval->getExactlyStartDate('2018-12-01'));

        $DateInterval->setInterval(4, 'D');
        $this->assertEquals('2018-08-01', $DateInterval->getExactlyStartDate($DateInterval->date_begins));
        $this->assertEquals('2018-09-02', $DateInterval->getExactlyStartDate('2018-09-01'));
        $this->assertEquals('2018-10-04', $DateInterval->getExactlyStartDate('2018-10-01'));
        $this->assertEquals('2018-11-01', $DateInterval->getExactlyStartDate('2018-11-01'));
        $this->assertEquals('2018-11-05', $DateInterval->getExactlyStartDate('2018-11-04'));
        $this->assertEquals('2018-12-03', $DateInterval->getExactlyStartDate('2018-12-01'));
        $this->assertEquals('2018-12-03', $DateInterval->getExactlyStartDate('2018-12-02'));
        $DateInterval->reset();

        $DateInterval->date_begins = '2019-03-01';
        $DateInterval->setInterval(3, 'D');
        $this->assertEquals('2019-03-01', $DateInterval->getExactlyStartDate($DateInterval->date_begins));
        $this->assertEquals('2019-03-04', $DateInterval->getExactlyStartDate('2019-03-02'));
        $this->assertEquals('2019-04-03', $DateInterval->getExactlyStartDate('2019-04-01'));
        $DateInterval->reset();

        $DateInterval->date_begins = '2018-04-01';
        $DateInterval->date_end = '2018-12-31';
        $DateInterval->setInterval(3, 'W');
        $this->assertEquals('2018-04-01', $DateInterval->getExactlyStartDate($DateInterval->date_begins));
        $this->assertEquals('2018-06-03', $DateInterval->getExactlyStartDate('2018-06-01'));
        $this->assertEquals('2018-07-15', $DateInterval->getExactlyStartDate('2018-07-01'));
        $this->assertEquals('2018-08-05', $DateInterval->getExactlyStartDate('2018-08-01'));
        $this->assertEquals('2018-09-16', $DateInterval->getExactlyStartDate('2018-09-05'));
        $this->assertEquals('2018-10-07', $DateInterval->getExactlyStartDate('2018-10-01'));
        $this->assertEquals('2018-11-18', $DateInterval->getExactlyStartDate('2018-11-07'));
        $DateInterval->reset();

        $DateInterval->date_begins = '2018-04-01';
        $DateInterval->date_end = '2018-12-31';
        $DateInterval->setInterval(3, 'M');
        $this->assertEquals('2018-04-01', $DateInterval->getExactlyStartDate($DateInterval->date_begins));
        $this->assertEquals('2018-07-01', $DateInterval->getExactlyStartDate('2018-06-01'));
        $this->assertEquals('2018-10-01', $DateInterval->getExactlyStartDate('2018-07-02'));
        $this->assertEquals('2018-10-01', $DateInterval->getExactlyStartDate('2018-08-01'));
        $this->assertFalse($DateInterval->getExactlyStartDate('2018-10-02'));
        $this->assertFalse($DateInterval->getExactlyStartDate('2018-10-03'));
        $this->assertFalse($DateInterval->getExactlyStartDate('2018-10-20'));
        $DateInterval->reset();

        $DateInterval->date_begins = '2000-01-01';
        $DateInterval->date_end = '2018-12-31';
        $DateInterval->setInterval(3, 'Y');
        $this->assertEquals('2000-01-01', $DateInterval->getExactlyStartDate($DateInterval->date_begins));
        $this->assertEquals('2003-01-01', $DateInterval->getExactlyStartDate('2002-01-01'));
        $this->assertEquals('2009-01-01', $DateInterval->getExactlyStartDate('2006-06-01'));
        $this->assertEquals('2009-01-01', $DateInterval->getExactlyStartDate('2006-06-30'));
        $this->assertEquals('2018-01-01', $DateInterval->getExactlyStartDate('2015-06-30'));
        $this->assertFalse($DateInterval->getExactlyStartDate('2018-07-25'));
        $this->assertFalse($DateInterval->getExactlyStartDate('2019-01-01'));
        $DateInterval->reset();
    }// testGetExactlyStartDate


}