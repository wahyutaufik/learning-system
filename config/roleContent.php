<?php 
$result = mysql_query("SELECT * FROM privillege");

if (!$result) {
    echo 'Tidak bisa menjalankan Query, ' . mysql_error().'. </br>';
}

if (mysql_num_rows($result) > 0) {
    while ($row = mysql_fetch_assoc($result)) {
    	unset($row['id']);
        $contents[] = $row;
    }
    foreach ($contents as $key => $group) {
    	$groups[] = $group['groups'];
    }
    $str = implode(',', $groups);
	$grp = explode(',', implode(',',array_unique(explode(',', $str))));
}
?>