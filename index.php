<?php

ini_set('auto_detect_line_endings', TRUE);

$csv = fopen('test.csv', 'r');
$arr = array();
while (($row = fgetcsv($csv)) !== FALSE):
    $arr[] = $row;
endwhile;
fclose($csv);
unset($arr[0]);

foreach ($arr as $key=>$single):
    $new[$key]['fname'] = $single[0];
    $new[$key]['lname'] = $single[1];
    $new[$key]['email'] = $single[2];
endforeach;

/*
turn this on when you have a database connection

$stmt = $db->prepare('INSERT INTO users (fname, lname, email) VALUES (?,?,?');
$stmt->bind_param('sss', $fname, $lname, $email);

foreach ($new as $single):
    $fname = $single['fname'];
    $lname = $single['lname'];
    $email = $single['email'];
    $stmt->execute();
endforeach;

$stmt->close();
$db->close();
*/