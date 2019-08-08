<?php 

function convert_Date_ToBR($date) {

$newDate = explode("-" , $date);

return $newDate[2]."/".$newDate[1]."/".$newDate[0];

}

function convert_Date_ToSQL($date) { 


$newDate = explode("/" , $date);

return $newDate[2]."-".$newDate[1]."-".$newDate[0];


}