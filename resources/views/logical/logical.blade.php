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