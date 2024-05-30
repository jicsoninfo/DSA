<?php
function binarySearh($a , $beg, $end, $val){
    if($end >= $beg){
        $mid = floor(($beg + $end)/2);
        // echo $mid;
        if($a[$mid] == $val){
            return $mid+1; // if the item to be searched is present at middle
        }else if($a[$mid] < $val){ // if the item to be searched is smaller than middle, then it can only be left subarray
            return binarySearh($a, $mid+1, $end, $val);
        }else{ // if the item to be searched is greater than middle, then it can only be in right subarray
            return binarySearh($a, $beg, $mid-1, $val);
        }
    }
    return -1;
}

$a = array(7, 9, 21, 26, 36, 43, 48, 54, 68); //given array
$val = 68; // value to be searched
$n = sizeof($a); // size of array
$res = binarySearh($a, 0, $n-1, $val); // store result

echo "The elements of the array are: ";
for($i = 0; $i < $n; $i++){
    echo " ", $a[$i];
}

echo "<br>", "Element to be searched is: ", $val;

if($res == -1){
    echo "<br>", "Element is not present in the array";
}else{
    echo "<br>", "Element is present at ", $res , " position of array";
}

?>