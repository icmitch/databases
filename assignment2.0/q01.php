<?php
include 'top.php';

 //now print out each record
    $query = 'SELECT pmkNetId FROM tblTeachers';
    $info2 = $thisDatabaseReader->select($query, "", 0, 0, 0, 0, false, false);
$columns=1;
    $highlight = 0; // used to highlight alternate rows
   
    print "<table>";
    foreach ($info2 as $rec) {
        $highlight++;
        if ($highlight % 2 != 0) {
            $style = ' odd ';
        } else {
            $style = ' even ';
        }
        print '<tr class="' . $style . '">';
        for ($i = 0; $i < $columns; $i++) {
            print '<td>' . $rec[$i] . '</td>';
        }
        print '</tr>';
    }

    // all done