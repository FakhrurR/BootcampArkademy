<?php

function sortNumber($number){
    
    $number = preg_replace("([a-zA-Z]+)","",$number);
    
    $check = strlen($number);
    
    if($check == 0){
        echo "No Number found in parameter";
    }
    else {
        for($i = 1; $i<$check ; $i++){
            for($j = 0 ; $j<$check-$i ; $j++){
                if($number[$j] > $number[$j+1]){
                    $asc = $number[$j];
                    $number[$j] = $number[$j+1];
                    $number[$j+1] = $asc;
                }
            }
        }
        
        for($k = 0 ; $k<$check;$k++){
            echo $number[$k];
        }
    }
        
}
sortNumber("48172a94");
sortNumber("abc");
sortNumber("94a");