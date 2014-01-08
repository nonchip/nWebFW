<?php
$prof_start_time=microtime(true);

// bootstrap config start

define('_DEBUG',        true                );
define('_APP_PATH',     __DIR__.'/app'      );
define('_SYS_PATH',     __DIR__.'/nwebfw'   );

// bootstrap config end

include(_SYS_PATH.'/main.php');

$prof_end_time=microtime(true);

if(_DEBUG){
    echo 'Time: '.($prof_end_time-$prof_start_time).'  Mem: '.memory_get_peak_usage();
}
