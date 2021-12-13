<?php


namespace Rundiz\DateInterval\Tests;

class ErrorTest extends \PHPUnit\Framework\TestCase
{


    public function testIncorrectDateFormat()
    {
        $DateInterval = new \Rundiz\DateInterval\DateInterval();
        $DateInterval->date_format = '';
        $DateInterval->date_begins = '2018-01-01';
        $DateInterval->date_end = '2018-12-31';
        $DateInterval->setInterval(20, 'D');
        $DateInterval->getTheDates();
        $this->assertEquals('Y-m-d', $DateInterval->date_format);
    }// testIncorrectDateFormat


    public function testNoBeginsDate()
    {
        $DateInterval = new \Rundiz\DateInterval\DateInterval();
        $DateInterval->date_end = '2018-12-31';
        $DateInterval->setInterval(2, 'D');
        $DateInterval->getTheDates();
        $errorMessages = $DateInterval->getErrorMessage();
        $errorCodes = $DateInterval->getErrorCodes();
        $this->assertCount(1, $errorMessages);
        $this->assertCount(1, $errorCodes);
        $this->assertSame(['RDDINTV_NO_DATE_BEGINS'], $errorCodes);
        $DateInterval->reset();
        unset($errorCodes, $errorMessages);

        $DateInterval->date_begins = 'invalidDate';
        $DateInterval->date_end = '2018-12-31';
        $DateInterval->setInterval(2, 'D');
        $DateInterval->getTheDates();
        $errorMessages = $DateInterval->getErrorMessage();
        $errorCodes = $DateInterval->getErrorCodes();
        $this->assertCount(1, $errorMessages);
        $this->assertCount(1, $errorCodes);
        $this->assertSame(['RDDINTV_NO_DATE_BEGINS'], $errorCodes);
        $DateInterval->reset();
        unset($errorCodes, $errorMessages);

        $DateInterval->date_begins = '2018-02-30';
        $DateInterval->date_end = '2018-12-31';
        $DateInterval->setInterval(2, 'D');
        $DateInterval->getTheDates();
        $errorMessages = $DateInterval->getErrorMessage();
        $errorCodes = $DateInterval->getErrorCodes();
        $this->assertCount(1, $errorMessages);
        $this->assertCount(1, $errorCodes);
        $this->assertSame(['RDDINTV_INCORRECT_DATE_BEGINS'], $errorCodes);
        $DateInterval->reset();
        unset($errorCodes, $errorMessages);
    }// testNoBeginsDate


    public function testEndDate()
    {
        $DateInterval = new \Rundiz\DateInterval\DateInterval();
        $DateInterval->date_begins = '2018-12-31';
        $DateInterval->date_end = '2018-01-31';
        $DateInterval->setInterval(2, 'D');
        $DateInterval->getTheDates();
        $errorMessages = $DateInterval->getErrorMessage();
        $errorCodes = $DateInterval->getErrorCodes();
        $this->assertCount(1, $errorMessages);
        $this->assertCount(1, $errorCodes);
        $this->assertSame(['RDDINTV_DATE_BEGINS_MORE_THAN_DATE_END'], $errorCodes);
        $DateInterval->reset();
        unset($errorCodes, $errorMessages);

        $DateInterval->date_begins = '2018-01-01';
        $DateInterval->date_end = 'Incorrect!';
        $DateInterval->setInterval(2, 'D');
        $DateInterval->getTheDates();
        $errorMessages = $DateInterval->getErrorMessage();
        $errorCodes = $DateInterval->getErrorCodes();
        $this->assertCount(1, $errorMessages);
        $this->assertCount(1, $errorCodes);
        $this->assertSame(['RDDINTV_INCORRECT_DATE_END'], $errorCodes);
        $DateInterval->reset();
        unset($errorCodes, $errorMessages);

        $DateInterval->date_begins = '2018-01-01';
        $DateInterval->date_end = '2019-02-31';
        $DateInterval->setInterval(2, 'D');
        $DateInterval->getTheDates();
        $errorMessages = $DateInterval->getErrorMessage();
        $errorCodes = $DateInterval->getErrorCodes();
        $this->assertCount(1, $errorMessages);
        $this->assertCount(1, $errorCodes);
        $this->assertSame(['RDDINTV_INCORRECT_DATE_END'], $errorCodes);
        $DateInterval->reset();
        unset($errorCodes, $errorMessages);
    }// testEndDate


    public function testNoInterval()
    {
        $DateInterval = new \Rundiz\DateInterval\DateInterval();
        $DateInterval->date_begins = '2018-02-01';
        $DateInterval->date_end = '2018-12-31';
        $DateInterval->getTheDates();
        $errorMessages = $DateInterval->getErrorMessage();
        $errorCodes = $DateInterval->getErrorCodes();
        $this->assertCount(1, $errorMessages);
        $this->assertCount(1, $errorCodes);
        $this->assertSame(['RDDINTV_NO_INTERVAL_RANGE'], $errorCodes);
    }// testNoInterval


    public function testStartDate()
    {
        $DateInterval = new \Rundiz\DateInterval\DateInterval();
        $DateInterval->date_begins = '2018-01-01';
        $DateInterval->date_end = '2018-12-31';
        $DateInterval->setInterval(2, 'D');
        $DateInterval->getExactlyStartDate('2019-01-01');
        $errorMessages = $DateInterval->getErrorMessage();
        $errorCodes = $DateInterval->getErrorCodes();
        $this->assertCount(1, $errorMessages);
        $this->assertCount(1, $errorCodes);
        $this->assertSame(['RDDINTV_START_DATE_MORE_THAN_DATE_END'], $errorCodes);
        $DateInterval->reset();
        unset($errorCodes, $errorMessages);

        $DateInterval->date_begins = '2018-01-01';
        $DateInterval->date_end = '2018-12-31';
        $DateInterval->setInterval(2, 'D');
        $DateInterval->getTheDates('2019-01-01', '2019-12-31');
        $errorMessages = $DateInterval->getErrorMessage();
        $errorCodes = $DateInterval->getErrorCodes();
        $this->assertCount(1, $errorMessages);
        $this->assertCount(1, $errorCodes);
        $this->assertSame(['RDDINTV_START_DATE_MORE_THAN_DATE_END'], $errorCodes);
        $DateInterval->reset();
        unset($errorCodes, $errorMessages);

        $DateInterval->date_begins = '2018-01-01';
        $DateInterval->date_end = '2018-12-31';
        $DateInterval->setInterval(3, 'M');
        $DateInterval->getTheDates('2018-10-02', '2018-12-31');
        $errorMessages = $DateInterval->getErrorMessage();
        $errorCodes = $DateInterval->getErrorCodes();
        $this->assertCount(1, $errorMessages);
        $this->assertCount(1, $errorCodes);
        $this->assertSame(['RDDINTV_EXACT_START_DATE_MORE_THAN_DATE_END'], $errorCodes);
        $DateInterval->reset();
        unset($errorCodes, $errorMessages);

        $DateInterval->date_begins = '2018-01-01';
        $DateInterval->date_end = '2018-12-31';
        $DateInterval->setInterval(3, 'M');
        $DateInterval->getTheDates('2018-06-02', '2018-02-01');
        $errorMessages = $DateInterval->getErrorMessage();
        $errorCodes = $DateInterval->getErrorCodes();
        $this->assertCount(1, $errorMessages);
        $this->assertCount(1, $errorCodes);
        $this->assertSame(['RDDINTV_START_DATE_MORE_THAN_STOP_DATE'], $errorCodes);
        $DateInterval->reset();
        unset($errorCodes, $errorMessages);
    }// testStartDate


}