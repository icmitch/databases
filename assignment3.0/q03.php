<?php
include 'top.php';

 //now print out each record
    $query = 'SELECT DISTINCT fldCourseName, tblSections.fldStart, tblSections.fldDays FROM tblCourses, tblSections, tblTeachers  WHERE pmkCourseId = fnkCourseId AND fnkTeacherNetId = pmkNetId AND tblTeachers.fldLastName = "Horton" ORDER BY tblSections.fldStart ASC';
    $info2 = $thisDatabaseReader->select($query, "", 1, 3, 2, 0, false, false);
    $columns=3;
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