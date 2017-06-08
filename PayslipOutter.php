<?php
class PayslipOutter {

    protected $employees;


    /**
     * This function is used to output the payslip into a string.
     * param[object]
     *
     */
    public function stringOutPut(PayslipInfo $payslipInfo) {

        $payslipString = sprintf("%s,%s,%u,%u,%u,%u", $payslipInfo->getName(), $payslipInfo->getPayPeriod(), $payslipInfo->getGrossIncome(),
            $payslipInfo->getIncomeTax(), $payslipInfo->getNetIncome(), $payslipInfo->getSuper());

        echo $payslipString;
    }

    /**
     * This function is used to output the payslip into a csv file.
     * param [array] $payslips
     */
    public function csvOutPut($payslips) {
        $payslipsArray = [];

        foreach ($payslips as $payslipObject) {
            $payslipsArray[] = (array)$payslipObject;
        }
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename='. 'testing.csv');
        header('Pragma: no-cache');
        header("Expires: 0");

        $outstream = fopen("php://output", "w");

        foreach($payslipsArray as $payslip)
        {
            fputcsv($outstream, $payslip);
        }

        fclose($outstream);
    }
}
?>