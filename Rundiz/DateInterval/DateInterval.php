<?php
/**
 * 
 * @version 1.0.3
 * @author Vee W.
 * @license http://opensource.org/licenses/MIT
 * 
 */


namespace Rundiz\DateInterval;

/**
 * Rundiz\DateInterval\DateInterval class is the date/week/month/year calculation to set to begining date, the start displaying date, number of interval and range and return the exactly start displaying date.<br>
 * For example: begining date is 2015-08-01; start displaying date is 2015-09-01; interval and range is every 3 days; the exactly start displaying date should be 2015-09-03.
 */
class DateInterval
{


    /**
     * The begins date.
     * 
     * @var string Accepted standard date format. If you enter the date format other than `Y-m-d`, please specify your format at `$DateInterval->date_format` property.
     */
    public $date_begins;

    /**
     * The end date.
     * 
     * @var string Accepted standard date format. If you enter the date format other than `Y-m-d`, please specify your format at `$DateInterval->date_format` property.
     */
    public $date_end;

    /**
     * specify the date format to use while get the dates. default value is Y-m-d
     * 
     * @var type 
     */
    public $date_format = 'Y-m-d';

    /**
     * Contain error codes.
     * 
     * Keep this property private or protected to prevent modify/override/remove from outside.
     * 
     * @since 1.0.3
     * @var array If there is at least one error, it will be set to here. 
     */
    private $error_codes = [];

    /**
     * Contain error messages.
     * 
     * Keep this property private or protected to prevent modify/override/remove from outside.
     * 
     * @var array
     */
    private $error_messages = [];

    /**
     * interval number.
     * 
     * @var integer 
     */
    private $interval_num;

    /**
     * interval range. such as Y, M, W, D
     * 
     * @var string 
     */
    private $interval_range;

    /**
     * the max loop will be use while generate dates by interval with or without end date.
     * 
     * @var integer 
     */
    protected $max_loop = 30000;


    public function __destruct() {
        $this->reset();
    }// __destruct


    /**
     * Get the `\DateTime` object.
     * 
     * Also set the time to all zero. (This class work only about date).
     * 
     * @since 1.0.3
     * @param string $dateString The date string.
     * @return \DateTime|false Return \DateTime object or false on failure.
     */
    private function getDateTimeObject($dateString)
    {
        if (!is_string($dateString)) {
            $dateString = '';
        }

        $DateTime = \DateTime::createFromFormat($this->date_format, $dateString);
        if ($DateTime instanceof \DateTime) {
            $DateTime->setTime(0, 0, 0);
        }

        return $DateTime;
    }// getDateTimeObject


    /**
     * Get the error codes.
     * 
     * The array format will be:
     * <pre>
     * array(
     *     0 => 'RDDINTV_XXX',// where XXX refer to the list of error below.
     *     1 => 'RDDINTV_XXX',
     *     ...
     * );
     * </pre>
     * 
     * The error codes and description.
     * 
     * RDDINTV_NO_DATE_BEGINS = No begins date or invalid date format.
     * RDDINTV_INCORRECT_DATE_BEGINS = Incorrect begins date value. For example: 2018-02-30.
     * RDDINTV_INCORRECT_DATE_END = Incorrect end date value. For example: 2018-02-30.
     * RDDINTV_DATE_BEGINS_MORE_THAN_DATE_END = Begins date is more than end date.
     * RDDINTV_NO_INTERVAL_RANGE = No interval or range specified.
     * RDDINTV_START_DATE_MORE_THAN_DATE_END = The start loop date is more than end date.
     * RDDINTV_EXACT_START_DATE_MORE_THAN_DATE_END = The exact start date is more than end date.
     * RDDINTV_START_DATE_MORE_THAN_STOP_DATE = The start date is more than stop date.
     * 
     * @since 1.0.3
     * @return array Return array with the format described above.
     */
    public function getErrorCodes()
    {
        return $this->error_codes;
    }// getErrorCodes


    /**
     * Get the error message.
     * 
     * The array format will be:
     * <pre>
     * array(
     *     0 => 'Error message',
     *     1 => 'Error message',
     *     ...
     * );
     * </pre>
     * 
     * To display custom error message or using translation, please use `getErrorCodes()` method instead.
     * 
     * @return array
     */
    public function getErrorMessage()
    {
        return $this->error_messages;
    }// getErrorMessage


    /**
     * Get the exactly start date within interval.
     * 
     * @param string $start_date Accept standard date format
     * @return string|false Return the exactly start date. Return false if failed validate or something incorrect.
     */
    public function getExactlyStartDate($start_date)
    {
        if (!$this->validateCorrectPropertiesValues()) {
            return false;
        }
        if (!$this->validateRequiredValues()) {
            return false;
        }

        $DateBegins = $this->getDateTimeObject($this->date_begins);
        $StartDate = $this->getDateTimeObject($start_date);

        if (!empty($this->date_end)) {
            // if end date had entered and valid.
            $DateEnd = $this->getDateTimeObject($this->date_end);
            if ($StartDate > $DateEnd) {
                $this->error_codes = array_merge($this->error_codes, ['RDDINTV_START_DATE_MORE_THAN_DATE_END']);
                $this->error_messages = array_merge($this->error_messages, ['The start date is more than end date.']);
                unset($DateBegins, $DateEnd, $StartDate);
                return false;
            }
        }

        if ($StartDate < $DateBegins) {
            // if start listing date is less than begins date, use begins date.
            // example: begins: 2018-10-01, start: 2018-05-01
            return $this->date_begins;
        }

        $Interval = $DateBegins->diff($StartDate);

        switch ($this->interval_range) {
            case 'Y':
                $diff = $Interval->format('%y');
                $diff_divide_intval = bcdiv($diff, $this->interval_num, 2);
                break;
            case 'M':
                $diff = ceil($Interval->y * 12 + $Interval->m + $Interval->d / 30);
                $diff_divide_intval = bcdiv($diff, $this->interval_num, 2);
                break;
            case 'W':
                $diff = $Interval->format('%a');
                $diff_divide_intval = bcdiv($diff, (7*$this->interval_num), 2);
                break;
            default:
                $diff = $Interval->format('%a');
                $diff_divide_intval = bcdiv($diff, $this->interval_num, 2);
        }

        $diff_divide_intval_integer = ceil($diff_divide_intval);
        unset($diff_divide_intval, $Interval);

        // after this the `$DateBegins` will be next date to get start.
        $DateBegins->add(new \DateInterval('P'.($diff_divide_intval_integer*$this->interval_num).$this->interval_range));
        
        if ($DateBegins >= $StartDate) {
            // if next date is more than or equal to start listing date.
            unset($diff_divide_intval_integer, $StartDate);
            $exactlyStartDate = $DateBegins->format($this->date_format);
        } else {
            // if next date is less than start listing date.
            // example: next date: 2018-10-01, start date: 2018-11-01
            $DateBegins->add(new \DateInterval('P'.$this->interval_num.$this->interval_range));
            unset($diff_divide_intval_integer, $StartDate);
            $exactlyStartDate = $DateBegins->format($this->date_format);
        }

        unset($DateBegins);

        if (isset($DateEnd)) {
            $ExactStartDate = $this->getDateTimeObject($exactlyStartDate);
            if ($ExactStartDate > $DateEnd) {
                unset($DateEnd, $exactlyStartDate);
                $this->error_codes = array_merge($this->error_codes, ['RDDINTV_EXACT_START_DATE_MORE_THAN_DATE_END']);
                $this->error_messages = array_merge($this->error_messages, ['The exact start date is more than end date.']);
                return false;
            }
            unset($DateEnd, $ExactStartDate);
        }

        return $exactlyStartDate;
    }// getExactlyStartDate


    /**
     * get the dates in interval range.
     * 
     * @param string $start_date Start displaying date (optional). Accepted standard date format. Use the same format as specified in `date_format` property.
     * @param string $stop_date Stop displaying date (optional). Accepted standard date format. Use the same format as specified in `date_format` property.
     * @return mixed Return array if success, return false if failed and you can use getErrorMessage() to get the error message.
     */
    public function getTheDates($start_date = '', $stop_date = '')
    {
        if (!$this->validateCorrectPropertiesValues()) {
            return false;
        }
        if (!$this->validateRequiredValues()) {
            return false;
        }

        if (!empty($start_date) && (strtotime($start_date) === false || date($this->date_format, strtotime($start_date)) != $start_date)) {
            $start_date = '';
        }
        if (!empty($stop_date) && (strtotime($stop_date) === false || date($this->date_format, strtotime($stop_date)) != $stop_date)) {
            $stop_date = '';
        }

        if (!empty($start_date) && !empty($stop_date)) {
            $StartDate = $this->getDateTimeObject($start_date);
            $StopDate = $this->getDateTimeObject($stop_date);
            if ($StartDate > $StopDate) {
                unset($StartDate, $StopDate);
                $this->error_codes = array_merge($this->error_codes, ['RDDINTV_START_DATE_MORE_THAN_STOP_DATE']);
                $this->error_messages = array_merge($this->error_messages, ['The start date is more than stop date.']);
                return false;
            }
            unset($StartDate, $StopDate);
        }

        $output = [];

        if (!empty($start_date) && strtotime($start_date) !== false && date($this->date_format, strtotime($start_date)) == $start_date) {
            $next_interval_date = $this->getExactlyStartDate($start_date);
            if ($next_interval_date === false) {
                return false;
            }
            $output[] = $next_interval_date;
        } else {
            $output[] = $this->date_begins;
        }

        $i = 0;
        $over_max_loop = false;

        do {
            if (isset($next_interval_date)) {
                $start_loop_date = $next_interval_date;
            } else {
                $start_loop_date = $this->date_begins;
            }

            $date = $this->getDateTimeObject($start_loop_date);
            $date->add(new \DateInterval('P'.$this->interval_num.$this->interval_range));
            $next_interval_date = $date->format($this->date_format);

            if ($stop_date != null && strtotime($stop_date) !== false && $this->getDateTimeObject($next_interval_date) > $this->getDateTimeObject($stop_date)) {
                // if stop date is specified and checked that over stop date.
                $over_max_loop = true;
            } elseif (!empty($this->date_end) && strtotime($this->date_end) !== false && $this->getDateTimeObject($next_interval_date) > $this->getDateTimeObject($this->date_end)) {
                // if end date is specified and checked that over end date.
                $over_max_loop = true;
            } else {
                // still in the max loop or stop date or end date. set the date to output.
                $output[] = $next_interval_date;
            }

            unset($date, $start_loop_date);

            $i++;
            if ($i > $this->max_loop) {
                // prevent overload too much loop.
                $over_max_loop = true;
            }
        } while ($over_max_loop == false);
        unset($i, $next_interval_date, $over_max_loop);

        return $output;
    }// getTheDates


    /**
     * reset all values and begin again.
     */
    public function reset()
    {
        $this->date_begins = '';
        $this->date_end = '';
        $this->date_format = 'Y-m-d';
        $this->error_codes = [];
        $this->error_messages = [];
        $this->interval_num = '';
        $this->interval_range = '';
        $this->max_loop = 30000;
    }// reset


    /**
     * set interval and range.
     * 
     * @param integer $number number of interval.
     * @param string $range range of interval. the values can be y for year, m for month, w for week, d for day.
     */
    public function setInterval($number, $range = 'day')
    {
        $number = intval($number);

        if (mb_strtolower($range) == 'year' || mb_strtolower($range) == 'years' || mb_strtolower($range) == 'y') {
            $range = 'Y';
        } elseif (mb_strtolower($range) == 'month' || mb_strtolower($range) == 'months' || mb_strtolower($range) == 'm') {
            $range = 'M';
        } elseif (mb_strtolower($range) == 'week' || mb_strtolower($range) == 'weeks' || mb_strtolower($range) == 'w') {
            $range = 'W';
        } else {
            $range = 'D';
        }

        $this->interval_num = $number;
        $this->interval_range = $range;
    }// setInterval


    /**
     * Validate correct properties values.
     * 
     * @since 1.0.3
     * @return boolean
     */
    private function validateCorrectPropertiesValues()
    {
        if (!is_string($this->date_format) || empty($this->date_format) || date($this->date_format) === false) {
            $this->date_format = 'Y-m-d';
        }

        if (!empty($this->date_end)) {
            if (
                (
                    strtotime($this->date_end) === false ||
                    (
                        strtotime($this->date_end) !== false &&
                        date($this->date_format, strtotime($this->date_end)) != $this->date_end
                    )
                )
            ) {
                $this->error_codes = array_merge($this->error_codes, ['RDDINTV_INCORRECT_DATE_END']);
                $this->error_messages = array_merge($this->error_messages, ['The end date is incorrect value.']);
                return false;
            }

            if (
                $this->getDateTimeObject($this->date_begins) > $this->getDateTimeObject($this->date_end)
            ) {
                $this->error_codes = array_merge($this->error_codes, ['RDDINTV_DATE_BEGINS_MORE_THAN_DATE_END']);
                $this->error_messages = array_merge($this->error_messages, ['The begins date is more than end date.']);
                return false;
            }
        }

        return true;
    }// validateCorrectPropertiesValue


    /**
     * Validate required values.
     * 
     * @return boolean
     */
    private function validateRequiredValues()
    {
        if (
            empty($this->date_begins) || 
            strtotime($this->date_begins) === false
        ) {
            $this->error_codes = array_merge($this->error_codes, ['RDDINTV_NO_DATE_BEGINS']);
            $this->error_messages = array_merge($this->error_messages, ['No begins date or invalid date format.']);
            return false;
        }

        if (
            strtotime($this->date_begins) !== false &&
            date($this->date_format, strtotime($this->date_begins)) !== $this->date_begins
        ) {
            $this->error_codes = array_merge($this->error_codes, ['RDDINTV_INCORRECT_DATE_BEGINS']);
            $this->error_messages = array_merge($this->error_messages, ['Incorrect begins date value.']);
            return false;
        }

        if (!is_numeric($this->interval_num) || $this->interval_range == null) {
            $this->error_codes = array_merge($this->error_codes, ['RDDINTV_NO_INTERVAL_RANGE']);
            $this->error_messages = array_merge($this->error_messages, ['No interval or range specified.']);
            return false;
        }

        $this->error_messages = [];
        return true;
    }// validateRequiredValues


}