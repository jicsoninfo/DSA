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
echo "<br>below program sorting without function selection sort</br>";
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