<?php
function subcombi($arr, $arr_size, $count)
{
   $combi_arr = array();
   if ($count > 1) {
      for ($i = $count - 1; $i < $arr_size; $i=$i+1) {
         $highest_index_elem_arr = array($i => $arr[$i]);
         foreach (subcombi($arr, $i, $count - 1) as $subcombi_arr)
         {
             $combi_arr[] = $subcombi_arr + $highest_index_elem_arr;
         }
      }
   } else {
      for ($i = $count - 1; $i < $arr_size; $i=$i+1) {
         $combi_arr[] = array($i => $arr[$i]);
      }
   }

   return $combi_arr;
}

function combinations($arr, $count)
{
   if ( !(0 <= $count && $count <= count($arr))) {
      return false;
   }


   return $count ? subcombi($arr, count($arr), $count) : array();
}

$numeri="55.77.03.04.30.06.47.71";

$numeri_ar=explode(".",$numeri);
$numeri_ar=array_unique($numeri_ar);


for ($combx = 2; $combx < 6; $combx++)
{
$combi_ar = combinations($numeri_ar, $combx);
}
//full cominations array is ready
//print_r($combi_ar);


//get archivio content
$archivio = file_get_contents('archivio.txt');
$archivio_ar = explode("\n",$archivio);

//save only the first 30 rows
$archivio_ar = array_slice($archivio_ar, 0, 30, true);

//echo $archivio;
print_r($archivio_ar);

$wantedCombinations = [];

//now we will test for each combination
foreach($combi_ar as $combination){
//we make a test for each line
foreach($archivio_ar as $dataset_row){
    $dataset_row_ar = explode(".",$dataset_row);
    $intersect_ar = array_intersect($combination, $dataset_row_ar);
    //we count intersection, if less than 3, we save it
    if( count($intersect_ar) < 3 ){
        $wantedCombinations[] = $combination; break;
    }
}
}


//echo $wantedCombinations;
print_r($wantedCombinations);

 ?>
