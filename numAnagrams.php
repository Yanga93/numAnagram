<?php
// Program to print all
// combination of size r
// in an array of size n

// The main function that prints
// all combinations of size r in
// arr[] of size n. This function
// mainly uses combinationUtil()
function printCombination($arr, $n, $r)
{
	// A temporary array to store
	// all combination one by one
	$data = Array();

	// Print all combination using
	// temprary array 'data[]'
	combinationUtil($arr, $n, $r,
					0, $data, 0);
}

/* arr[] ---> Input Array
n ---> Size of input array
r ---> Size of a combination
	to be printed
index ---> Current index in data[]
data[] ---> Temporary array to store
			current combination
i ---> index of current element in arr[] */
function combinationUtil($arr, $n, $r,
						$index, $data, $i)
{
	// Current cobination
	// is ready, print it
	if ($index == $r)
	{
		for ($j = 0; $j < $r; $j++)
			echo $data[$j], " ";
		echo "\n";
		return;
	}

	// When no more elements are
	// there to put in data[]
	if ($i >= $n)
		return;

	// current is included, put
	// next at next location
	$data[$index] = $arr[$i];
	combinationUtil($arr, $n, $r,
					$index + 1,
					$data, $i + 1);

	// current is excluded, replace
	// it with next (Note that i+1
	// is passed, but index is not changed)
	combinationUtil($arr, $n, $r,
					$index, $data, $i + 1);
}

// Driver Code
$arr = array(1, 2, 3, 4, 5);
$r = 3;
$n = sizeof($arr);
printCombination($arr, $n, $r);

// This code is contributed by ajit
?>
