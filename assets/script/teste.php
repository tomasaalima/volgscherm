<?php
 $init = "172.26.120.10";
 $end = "172.26.140.19";
 
while(runRange($init, $end)){
    $init = runRange($init, $end);


    echo $init,"<br>";
    echo $end."<br><br>";
}

function runRange($rangeA, $rangeB){

    if($rangeA == $rangeB){
        return false;
    }else{
        $A = explode(".", $rangeA);
        $B = explode(".", $rangeB);

        if($A[3] == 255 and $A[2] == 255 and $A[1] == 255){

            $A[0] += 1;
            $A[1] = 0;
            $A[2] = 0;
            $A[3] = 0;

            return implode(".", $A);
        }else if ($A[3] == 255 and $A[2] == 255){
           
            $A[1] += 1;
            $A[2] = 0;
            $A[3] = 0;

            return implode(".", $A);
        }else if ($A[3] == 255){
            $A[2] += 1;
            $A[3] = 0;

            return implode(".", $A);
        }else{
            $A[3] += 1;

            return implode(".", $A);
        }  
    }
}