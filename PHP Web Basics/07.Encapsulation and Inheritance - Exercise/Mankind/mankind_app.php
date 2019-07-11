<?php
spl_autoload_register();

$studentData = explode(' ', readline());
$workerData = explode(' ', readline());

[$studentFirstName, $studentLastName, $facultyNumber] = $studentData;
[$workerFirstName, $workerLastName, $weekSalary, $workHours] = $workerData;

try {
    $student = new Student($studentFirstName, $studentLastName, $facultyNumber);
    $worker = new Worker($workerFirstName, $workerLastName, $weekSalary, $workHours);
    echo $student . PHP_EOL . $worker;
} catch (Exception $e) {
    echo $e->getMessage();
}