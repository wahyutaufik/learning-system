<?php  
$table  = substr(strstr(strtolower(preg_replace('/\B([A-Z])/', ' $1', $module)), " "), 1);
$result = mysql_query("SELECT * FROM $table");

if (!$result) {
    echo 'Tidak bisa menjalankan Query, ' . mysql_error().'. </br>';
}

if (mysql_num_rows($result) > 0) {
    while ($row = mysql_fetch_assoc($result)) {
        $contents[] = $row;
    }
}