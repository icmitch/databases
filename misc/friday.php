<?php
include 'top.php';


    $start_number = 10;
    $how_many = 50;
 //now print out each record
    $query = 'SELECT pmkStudentId, fldFirstName, fldLastName, fldStreetAddress, fldCity, fldState, fldZip, fldGender FROM tblStudents ORDER BY fldLastName, fldFirstName DESC LIMIT ?,?';
    $data = array($start_number, $how_many);
    $info2 = $thisDatabaseReader->select($query, $data, 0, 1, 0, 0, false, false);
    $columns=8;
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