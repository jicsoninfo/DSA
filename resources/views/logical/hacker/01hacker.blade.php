<?php
echo "reverse an array of integers in PHP using the built-in array_reverse function." . "<br />";

$arr = [1,2,3];
$reversedArr = reverseArray($arr);

echo "<pre>";
print_r($reversedArr);
 
function reverseArray($arr){
    // return array_reverse($arr);
    $reversed = [];
    for($i = count($arr)-1; $i >= 0; $i--){
        $reversed[] = $arr[$i];
    }
    return $reversed;
}

?>


<?php
/*
You can reverse an array of integers in PHP using the built-in array_reverse function. Here’s a simple example:


function reverseArray($arr) {
    return array_reverse($arr);
}

// Example usage
$arr = [1, 2, 3];
$reversedArr = reverseArray($arr);

print_r($reversedArr);
?>
Output
When you run this code, it will display:

csharp
Copy code
Array
(
    [0] => 3
    [1] => 2
    [2] => 1
)
This will reverse the array [1, 2, 3] to [3, 2, 1]. If you want to reverse the array manually, you can use a loop as well:

php
Copy code
<?php
function reverseArray($arr) {
    $reversed = [];
    for ($i = count($arr) - 1; $i >= 0; $i--) {
        $reversed[] = $arr[$i];
    }
    return $reversed;
}

// Example usage
$arr = [1, 2, 3];
$reversedArr = reverseArray($arr);

print_r($reversedArr);


++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

====================Hourglass Sum Explanation==========================
An hourglass in a 2D array is defined as a shape that consists of values from the array arranged in the following pattern:

css
Copy code
a b c
  d
e f g
Where the indices can be represented in a 6x6 array as follows:

css
Copy code
arr[i][j] arr[i][j+1] arr[i][j+2]
          arr[i+1][j+1]
arr[i+2][j] arr[i+2][j+1] arr[i+2][j+2]
The hourglass sum is calculated as:

css
Copy code
hourglass_sum = arr[i][j] + arr[i][j+1] + arr[i][j+2]
                 + arr[i+1][j+1]
                 + arr[i+2][j] + arr[i+2][j+1] + arr[i+2][j+2]
Constraints
For a 6x6 array, the hourglass can start at indices ranging from (0,0) to (3,3), as these are the only starting points that allow the hourglass to fully fit within the boundaries of the array.

Sample Input
Given the following input:

Copy code
1 1 1 0 0 0
0 1 0 0 0 0
1 1 1 0 0 0
0 0 2 4 4 0
0 0 0 2 0 0
0 0 1 2 4 0
Example Hourglass Calculations
Hourglass starting at (0,0):

bash
Copy code
1 1 1
  1
1 1 1
Hourglass sum = 1 + 1 + 1 + 1 + 1 + 1 + 1 = 7
Hourglass starting at (0,1):

bash
Copy code
1 1 0
  0
1 1 0
Hourglass sum = 1 + 1 + 0 + 0 + 1 + 1 + 0 = 4
Hourglass starting at (1,1):

bash
Copy code
  1 0 0
    1
0 2 4
Hourglass sum = 0 + 1 + 0 + 1 + 2 + 4 = 8
Hourglass starting at (3,2):

bash
Copy code
2 4 4
  0
1 2 4
Hourglass sum = 2 + 4 + 4 + 0 + 1 + 2 + 4 = 19
Maximum Hourglass Sum Calculation
To find the maximum hourglass sum, you would iterate through each possible starting position, calculate the hourglass sum, and keep track of the maximum found.

PHP Implementation
Here's how you can implement the hourglass sum calculation in PHP:

php
Copy code
function hourglassSum($arr) {
    $maxSum = PHP_INT_MIN; // Initialize to the smallest possible integer

    for ($i = 0; $i < 4; $i++) {
        for ($j = 0; $j < 4; $j++) {
            // Calculate hourglass sum
            $top = $arr[$i][$j] + $arr[$i][$j+1] + $arr[$i][$j+2];
            $middle = $arr[$i+1][$j+1];
            $bottom = $arr[$i+2][$j] + $arr[$i+2][$j+1] + $arr[$i+2][$j+2];

            $hourglassSum = $top + $middle + $bottom;

            // Update max sum
            if ($hourglassSum > $maxSum) {
                $maxSum = $hourglassSum;
            }
        }
    }

    return $maxSum;
}

// Example input
$arr = [
    [1, 1, 1, 0, 0, 0],
    [0, 1, 0, 0, 0, 0],
    [1, 1, 1, 0, 0, 0],
    [0, 0, 2, 4, 4, 0],
    [0, 0, 0, 2, 0, 0],
    [0, 0, 1, 2, 4, 0],
];

$result = hourglassSum($arr);
echo "Maximum hourglass sum: " . $result; // Output: 19
Explanation of the Code
The function hourglassSum takes a 6x6 array as input.
It initializes maxSum to the smallest integer to ensure any hourglass sum found will be larger.
It loops through the valid starting indices (0 to 3 for both dimensions).
For each hourglass, it calculates the sum and updates maxSum if the current hourglass sum is greater.
Finally, it returns the maximum hourglass sum found.
This will give you the correct output, which is 19 for the provided example input. If you have any further questions or need more clarification, feel free to ask!
*/
?>