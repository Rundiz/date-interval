<?php


if (!function_exists('convertByte')) {
    function convertByte($size) {
        $unit = array('b', 'kb', 'mb', 'gb', 'tb', 'pb');
        return @round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . ' ' . $unit[$i];
    }// convertByte
}


if (!function_exists('listDates')) {
    /**
     * display dates or errors.
     * 
     * @param mixed $list_dates
     */
    function listDates($list_dates)
    {
        if ($list_dates == false || !is_array($list_dates)) {
            echo "\t".'<h3>Error!</h3>'."\n";
            foreach ($okvdint->getErrorMessage() as $err_msg) {
                echo "\t\t".$err_msg.'<br>'."\n";
            }
            unset($err_msg);
        } else {
            foreach ($list_dates as $each_date) {
                echo "\t".$each_date.'<br>'."\n";
            }
            unset($each_date);
        }
    }// listDates
}


if (!function_exists('pageBenchmark')) {
    function pageBenchmark()
    {
        echo '<div style="font-size: 0.7rem; margin-top: 20px;">'."\n";
        echo 'Page loaded in ' . (microtime(true) - $_SERVER['REQUEST_TIME_FLOAT']) . ' seconds!<br>'."\n";
        echo 'Memory max usage '.convertByte(memory_get_peak_usage(true)).'<br>'."\n";
        echo 'Memory usage '.convertByte(memory_get_usage(true)).'<br>'."\n";
        echo '</div>'."\n";
    }// pageBenchmark
}