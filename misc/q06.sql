<?php
include 'top.php';

 //now print out each record
    $query = 'SELECT fldCourseName FROM tblCourses WHERE fldCourseName LIKE "data%" or fldCourseName LIKE "%data" and fldDepartment NOT LIKE "CS"';
    $info2 = $thisDatabaseReader->select($query, "", 1, 3, 6, 0, false, false);
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
