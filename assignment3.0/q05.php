<?php
include 'top.php';

 //now print out each record
    $query = 'SELECT DISTINCT fldFirstName, fldLastName, SUM(fldNumStudents) AS total FROM tblTeachers, tblSections, tblCourses WHERE tblSections.fnkCourseId = tblCourses.pmkCourseID AND tblCourses.fldDepartment = "CS" AND pmkNetId = fnkTeacherNetId AND fldType NOT LIKE "LAB" AND fldNumStudents > 0 GROUP BY fldLastName ORDER BY total DESC';
    $info2 = $thisDatabaseReader->select($query, "", 1, 6, 4, 1, false, false);
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