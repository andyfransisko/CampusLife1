<?php

 $start = new DateTime('2019-11-11');
    $end   = new DateTime('2019-12-31');
    
    //$start->modify($dow); // Move to first occurence
    //$end->add(new DateInterval('2019-12-31')); // Move to 1 year from start
    
    $interval = new DateInterval("P1W");
    $period   = new DatePeriod($start, $interval, $end);
  
  
    foreach ($period as $date) {
    echo $date->format('Y-m-d'). "<br>";
}
    

?>