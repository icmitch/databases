<?php
include 'top.php';

 //now print out each record
    $query = 'SELECT fldFirstName, fldLastName FROM tblTeachers WHERE pmkNetId LIKE "r%" and pmkNetId LIKE "%o"';
    $info2 = $thisDatabaseReader->select($query, "", 1, 1, 4, 0, false, false);
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