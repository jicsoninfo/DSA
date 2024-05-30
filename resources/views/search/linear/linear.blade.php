<?php
$a = array(45, 24, 8, 80, 62, 71, 10, 23, 43);
$val = 62; // value to be searched
$n = sizeof($a); // size of array
$n1 = count($a); // size of array

function linearSearch($a, $n, $val){
    for($i = 0; $i < $n; $i++){
        if($a[$i] == $val){
            return $i+1;
        }
    }
    return -1;
}

$res = linearSearch($a, $n, $val);
echo "The elements of the array are: ";
for($i = 0; $i < $n; $i++){
    echo " ", $a[$i];
}

echo "<br>", "Element to be searches is: ", $val;

if($res == -1){
    echo "<br>", "Element is not present in the array";
}else{
    echo "<br>", "Element is present at ", $res , " position of array";
}



?>