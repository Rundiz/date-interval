<?php
/**
 * 
 * @version 1.0.1
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
     * the begins date.
     * 
     * @var string accepted standard date format.
     */
    public $date_begins;

    /**
     * the end date.
     * 
     * @var string accepted standard date format.
     */
    public $date_end;

    /**
     * specify the date format to use while get the dates. default value is Y-m-d
     * 
     * @var type 
     */
    public $date_format = 'Y-m-d';

    /**
     * store error messages as array.
     * 
     * @var array
     */
    private $error_message = [];

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
    protected $max_loop = 10000;


    public function __destruct() {
        $this->reset();
    }// __destruct


    /**
     * get the error message.
     * 
     * @return array
     */
    public function getErrorMessage()
    {
        return $this->error_message;
    }// getErrorMessage


    /**
     * get the exactly start date within interval.
     * 
     * @param string $start_date accept standard date format
     * @return string return the exactly start date.
     */
    public function getExactlyStartDate($start_date)
    {
        if (!$this->validateRequiredValues()) {
            return false;
        }

        $datecheck1 = new \DateTime($this->date_begins);
        $datecheck2 = new \DateTime($start_date);
        $interval = $datecheck1->diff($datecheck2);

        switch ($this->interval_range) {
            case 'Y':
                $diff = $interval->format('%y');
                $diff_divide_intval = bcdiv($diff, $this->interval_num, 2);
                break;
            case 'M':
                $diff = ceil($interval->y * 12 + $interval->m + $interval->d / 30);
                $diff_divide_intval = bcdiv($diff, $this->interval_num, 2);
                break;
            case 'W':
                $diff = $interval->format('%a');
                $diff_divide_intval = bcdiv($diff, (7*$this->interval_num), 2);
                break;
            default:
                $diff = $interval->format('%a');
                $diff_divide_intval = bcdiv($diff, $this->interval_num, 2);
        }

        $diff_divide_intval_integer = ceil($diff_divide_intval);
        unset($datecheck1, $datecheck2, $diff_divide_intval, $interval);

        $date = new \DateTime($this->date_begins);
        $date->add(new \DateInterval('P'.($diff_divide_intval_integer*$this->interval_num).$this->interval_range));
        unset($diff_divide_intval_integer);
        return $date->format($this->date_format);
    }// getExactlyStartDate


    /**
     * get the dates in interval range.
     * 
     * @param string $start_date start displaying date (optional). accepted standard date format.
     * @param string $stop_date stop displaying date (optional). accepted standard date format.
     * @return mixed return array if success, return false if failed and you can use getErrorMessage() to get the error message.
     */
    public function getTheDates($start_date = '', $stop_date = '')
    {
        if (!$this->validateRequiredValues()) {
            return false;
        }

        $output = [];

        if ($start_date != null && strtotime($start_date) !== false) {
            $next_interval_date = $this->getExactlyStartDate($start_date);
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

            $date = new \DateTime($start_loop_date);
            $date->add(new \DateInterval('P'.$this->interval_num.$this->interval_range));
            $next_interval_date = $date->format($this->date_format);

            if ($stop_date != null && strtotime($stop_date) !== false && new \DateTime($next_interval_date) > new \DateTime($stop_date)) {
                // if stop date is specified and checked that over stop date.
                $over_max_loop = true;
            } elseif ($this->date_end != null && strtotime($this->date_end) !== false && new \DateTime($next_interval_date) > new \DateTime($this->date_end)) {
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
        $this->error_message = [];
        $this->interval_num = '';
        $this->interval_range = '';
        $this->max_loop = 10000;
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
     * validate required values.
     * 
     * @return boolean
     */
    private function validateRequiredValues()
    {
        if ($this->date_begins == null || strtotime($this->date_begins) === false) {
            $this->error_message = array_merge($this->error_message, ['No begins date or invalid date format.']);
            return false;
        }

        if (!is_numeric($this->interval_num) || $this->interval_range == null) {
            $this->error_message = array_merge($this->error_message, ['No interval and range specified.']);
            return false;
        }

        $this->error_message = [];
        return true;
    }// validateRequiredValues


}