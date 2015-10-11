<?php
include 'top.php';

 //now print out each record
    $query = 'SELECT DISTINCT tblSections.fldCRN, tblStudents.fldFirstName, tblStudents.fldLastName FROM tblCourses, tblSections, tblEnrolls, tblStudents WHERE tblCourses.pmkCourseId = tblSections.fnkCourseId AND tblStudents.pmkStudentId = tblEnrolls.fnkStudentId AND tblSections.fldCRN = tblEnrolls.fnkSectionId AND tblCourses.fldCourseNumber = "148" ORDER BY fldCRN, tblStudents.fldFirstName, tblStudents.fldLastName';
    $info2 = $thisDatabaseReader->select($query, "", 1, 4, 2, 0, false, false);
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