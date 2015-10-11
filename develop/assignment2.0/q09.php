<?php
include 'top.php';

 //now print out each record
    $query = 'SELECT fldBuilding, SUM(fldNumStudents) AS num_students FROM tblSections WHERE fldDays IN ("M  W  F ", "  W R   ","  W     ") GROUP BY fldBuilding';
    $info2 = $thisDatabaseReader->select($query, "", 1, 0, 6, 0, false, false);
    $columns=2;
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