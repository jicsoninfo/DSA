<?php 

echo "Bolow program demonstrate how to reverse the string wihtout using function </br>";
$str = "Teststring123 the quick brown";
//$str = "5684231";
///$str = 5684231;
$str2="";


//echo strlen($str);
$strlength = strlen($str);
//echo $strlength;

for($i=$strlength-1; $i>=0; $i-- ){
    //echo $i;
    $str2 .= $str[$i];
    //echo $str2;

}
echo $str;
echo "<br>";
echo $str2;

echo "<br>=============================================<br>";
$num = 456213;
echo "Original number is :".$num;
echo "\r\n";
echo "Reverse of no. is ", reversDigits($num);

function reversDigits($num){
    $rev_num = 0;
    while($num>1){
        $rev_num = $rev_num * 10 + $num % 10;
        $num = (int)$num/10;
        // echo "<br>" . $rev_num ."<br>";
        echo "<br>". $num ."<br>";
        
    }
    return $rev_num;
}


echo "<br>==================================</br>";
echo "<br>below program sorting without function (selection sort)</br>";
$arr_selection = [65, 76, 5, 12, 22, 11, 10];
$total_len = count($arr_selection);
//$sorted_arr = [];


    function selection_sort($arr_selection, $len){
        for($i=0;$i<$len;$i++){
            $low=$i;
            for($j=$i+1;$j<$len;$j++){
                if($arr_selection[$j]<$arr_selection[$low]){
                    $low = $j;
                }
                    // Use strtolower for case-insensitive comparison
                // if (strtolower($arr_selection[$j]) < strtolower($arr_selection[$low])) {
                //         $low = $j;
                // }
                if($arr_selection[$i]>$arr_selection[$low]){
                    $temp = $arr_selection[$i];
                    $arr_selection[$i] = $arr_selection[$low];
                    //array_push($sorted_arr, $arr_selection[$low]);
                    $arr_selection[$low] = $temp;
                    //array_push($sorted_arr, $temp);
                }
            }
        }
        return $arr_selection;
    }
$after_sort = selection_sort($arr_selection, $total_len);
echo "<pre>";
print_r($after_sort);

echo "<br>==================================</br>";

echo "<br>==================================</br>";
echo "<br>below program sorting without function (selection sort string value)</br>";
$arr_selection = ['Gaurav', 'Vivek', 'Atul', 'prashant', 'gyan', 'mukesh', 'mohit'];
$total_len = count($arr_selection);
//$sorted_arr = [];


        function selection_sort_string($arr_selection, $len) {
            for ($i = 0; $i < $len; $i++) {
                $low = $i;
                for ($j = $i + 1; $j < $len; $j++) {
                    // Use strtolower for case-insensitive comparison
                    if (strtolower($arr_selection[$j]) < strtolower($arr_selection[$low])) {
                        $low = $j;
                    }
                }
                // Swap the found minimum element with the first element
                if ($low != $i) {
                    $temp = $arr_selection[$i];
                    $arr_selection[$i] = $arr_selection[$low];
                    $arr_selection[$low] = $temp;
                }
            }
            return $arr_selection;
        }

$after_sort = selection_sort_string($arr_selection, $total_len);
echo "<pre>";
print_r($after_sort);

echo "<br>==================================</br>";


echo "<br>below program sorting without function(bubble sort)</br>";
$arr_bubble = [56, 98, 63, 45, 16, 6, 49];
$total_arr_len = count($arr_bubble);

function bubble_sort($arr_bubble, $total_arr_len){
    for($i=0;$i<$total_arr_len-1;$i++){
        for($j=0; $j<$total_arr_len-1;$j++){
            if($arr_bubble[$j]>$arr_bubble[$j+1]){
                $temp = $arr_bubble[$j];
                $arr_bubble[$j] = $arr_bubble[$j+1];
                $arr_bubble[$j+1] = $temp;
            }
        }
    }
    return $arr_bubble;
}
echo "=============before sorting value=============";
echo "<pre>";
print_r($arr_bubble);
echo "=============after sorting value=============";
$after_bubble_sort = bubble_sort($arr_bubble, $total_arr_len);
echo "<pre>";
print_r($after_bubble_sort);


echo "<br>==================================</br>";
echo "<br>below program sorting without function(merge sort)</br>";



echo "<br>==================================</br>";
echo ("Pre increment and post increment") ."<br>";
$a = 10;
$a = $a++;
//$a = ++$a;
echo $a."<br />";
// echo $a ."<br>";
$a = $a++;
//$a1 = $a+2;
echo $a . "<br>";

$b = 10;
$b = $b--;
$b = --$b;
echo $b."<br />";

$x = 10; $y = 0; $z = 5;
$y = $z * $x++;
echo $y."<br/ >";
$y1 = $z * $x++;
echo $y1."<br/ >";


$i = 0;
echo $i++."<br/ >";
echo $i."<br/ >";
$j=0;
echo ++$j."<br/ >";
echo $j."<br/ >";

echo "<br>==================================</br>";
echo ("Unique value in array") ."<br>";
//PHP provides the built-in function array_unique(), which removes duplicate values from an array and returns an array with only unique values.
echo ("PHP provides the built-in function array_unique(), which removes duplicate values from an array and returns an array with only unique values.");
$array = [1, 2, 3, 4, 3, 2, 5];
$uniqueArray = array_unique($array);
print_r($uniqueArray);

echo ("If you want to remove the keys from the resulting array, you can combine array_unique() with array_values() to reindex the array.");
$array1 = [1, 2, 3, 4, 3, 2, 5];
$uniqueArray1 = array_values(array_unique($array1));

print_r($uniqueArray1);


echo ("You can also manually iterate over the array and track unique values using a temporary array to remove duplicates. This method gives you more control.");

$array2 = [1, 2, 3, 4, 3, 2, 5];
$uniqueArray2 = [];

foreach ($array2 as $value2) {
    if (!in_array($value2, $uniqueArray2)) {
        $uniqueArray2[] = $value2;
    }
}

print_r($uniqueArray2);


echo ("Another approach is to use array_flip(), which swaps the keys and values in the array. Since array keys are unique, this will automatically remove duplicates.");
$array3 = [1, 2, 3, 4, 3, 2, 5];
$uniqueArray3 = array_flip(array_flip($array3));

print_r($uniqueArray3);


echo ("Example with Non-Numeric Values (Potential Issue):");
$array4 = ['apple', 'banana', 'orange', 'banana', 'apple'];
$flipped4 = array_flip($array4);

print_r($flipped4);

echo ("For non-numeric values, you should use array_unique() instead, which will keep the first occurrence of each value.");
$array5 = ['apple', 'banana', 'orange', 'banana', 'apple'];
$uniqueArray5 = array_unique($array5);

print_r($uniqueArray5);

echo "<br>==================================</br>";

        echo "To delete a value from an array in PHP, you can use the following methods, depending on your requirements:" . "<br>";
        echo "1. Using unset() function" ."<br>";
        $array01 = [2,3,4,6,7];
		unset($array01[3]);
		print_r(array_values($array01));

        echo "2. Using array_splice() function" ."<br>" ;
		$array02 = [3,4,5,6,7,8,9];
		array_splice($array02, 3, 1);
		print_r($array02);

        echo "3. Using array_filter() function" ."<br>" ;
		$array03 = [6,7,8,9,10,11,12,13];
		$array03 = array_filter($array03, function($value01){
			return $value01 != 11;
		});
		print_r($array03);
        $array03 = array_values($array03);
        print_r($array03);

        echo "4. Using array_search() and unset() (for specific value)" ."<br>" ;
		$array04 = [3,4,5,6,7,8,9,10];
		$key04 = array_search(5, $array04);
		if($key04 != false){
			unset($array04[$key04]);
		}
		print_r($array04);

echo "<br>==================================</br>";
echo "<br>==================================</br>";
echo "<br>==================================</br>";
echo "<br>==================================</br>";
echo "<br>==================================</br>";
echo "<br>==================================</br>";





?>








<script>
    let str = "Teststring123 the quick brown";
    let strlength = str.length;
    let str2="";

    for(var i=strlength-1; i>=0; i--){
        str2 += str[i] 
    }
    console.log(str2);
</script>