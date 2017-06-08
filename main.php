<?php

include('PayslipProcessor.php');
include('PayslipOutter.php');
include('Employee.php');
include('PayslipInfo.php');

if (isset($_POST['csv_input'])) {
    $csvFile = 'test.csv';
    $employees = PayslipProcessor::readCSV($csvFile);
    $processor = new PayslipProcessor($employees);
    $payslipDetails = $processor->generatePayslip();
    $out = new PayslipOutter();
    $out->csvOutPut($payslipDetails);
} else {
    $firstName = !empty($_POST['first_name']) ? $_POST['first_name'] : '';
    $lastName = !empty($_POST['last_name']) ? $_POST['last_name'] : '';
    $annualSalary = !empty($_POST['annual_salary']) ? $_POST['annual_salary'] : '';
    $superRate =  !empty($_POST['super_rate']) ? $_POST['super_rate'] : '';
    $paymentStartDate = !empty($_POST['payment_start_date']) ? $_POST['payment_start_date'] : '';

    $employee = new Employee($firstName, $lastName, $annualSalary, $superRate, $paymentStartDate);
    $out = new PayslipOutter();
    $processor = new PayslipProcessor([$employee]);
    $payslipDetails = $processor->generatePayslip();
    $out->stringOutPut($payslipDetails[0]);

}

?>