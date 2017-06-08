<?php
/**
 * Created by PhpStorm.
 * User: Ray Cui
 */

class PayslipProcessor {

    protected $employees = [];

    /**
     * Payslip constructor.
     */
    public function __construct($employee)
    {
        $this->employees = $employee;
    }

    /**
     * This function is used to calculate the employee's income tax ,gross income, net income etc.
     *
     *.Return [string]
     */
    public function generatePayslip() {
        $payslipInfo = [];
        $incomeTax =  '';
        $grossIncome = '';
        $annualSalary = '';
        $netIncome = '';
        $super = '';

        $taxableIncomeData = [
            '0' => [
                'from' => '0',
                'to' => '18200',
                'taxBase' => '0',
                'taxRate' => '0',
            ],
            '1' => [
                'from' => '18201',
                'to' => '37000',
                'taxBase' => '0',
                'taxRate' => '0.19',
            ],
            '2' => [
                'from' => '37001',
                'to' => '80000',
                'taxBase' => '3572',
                'taxRate' => '0.325',
            ],
            '3' => [
                'from' => '80001',
                'to' => '180000',
                'taxBase' => '17547',
                'taxRate' => '0.37',
            ],
            '4' => [
                'from' => '180001',
                'to' => '-1',
                'taxBase' => '54547',
                'taxRate' => '0.45',
            ],
        ];
        foreach ($this->employees as $index => $employee) {
            $payslipObj = new PayslipInfo();
            $annualSalary = $employee->getAnnualSalary();
            foreach ($taxableIncomeData as $index => $taxData) {
                if (($annualSalary >= 180001) || ($annualSalary >= $taxData['from'] && $annualSalary <= $taxData['to'])) {
                    $incomeTax = round((($annualSalary - $taxData['from'] - 1) * $taxData['taxRate'] + $taxData['taxBase']) / 12);
                }
            }
            $grossIncome = round($annualSalary / 12 );
            $netIncome = $grossIncome - $incomeTax;
            $super = round(($grossIncome * $employee->getSuperRate()) / 100);
            $payslipObj->setName($employee->getFirstName() . ' ' . $employee->getLastName());
            $payslipObj->setPayPeriod($employee->getPaymentStartDate());
            $payslipObj->setGrossIncome($grossIncome);
            $payslipObj->setNetIncome($netIncome);
            $payslipObj->setSuper($super);
            $payslipObj->setIncomeTax($incomeTax);

            $payslipInfo[] = $payslipObj;
        }

        return $payslipInfo;
    }

    /**
     * This function is used to convert a csv file into array.
     * @param [string] $csvFile
     * @return [array]
     */
    public static function readCSV($csvFile) {
        //Open the file.
        $fileHandle = fopen($csvFile, "r");
        $content = [];
        $returnResult = [];
        //Loop through the CSV rows.
        while (($row = fgetcsv($fileHandle, 0, ",")) !== FALSE) {
            $content[] = $row;
        }
        foreach ($content as $key => $data) {
            $employee = new Employee($data[0], $data[1], $data[2], $data[3], $data[4]);
            $returnResult[] = $employee;
        }
        return $returnResult;
    }

    /**
     * Get a pay period list start from 1 July 2012 to 30 Jun 2013
     *
     * Return [array]
     */
    public static function getPayPeriodList() {
        return [
            '1 Jul - 31 Jul', '1 Aug - 31 Aug', '1 Sep - 30 Sep', '1 Oct - 31 Oct',
            '1 Nov - 30 Nov', '1 Dec - 31 Dec', '1 Jan - 31 Jan', '1 Feb - 28 Feb',
            '1 Mar - 31 Mar', '1 Apr - 30 Apr', '1 May - 31 May', '1 Jun - 30 Jun'
        ];
    }
}
?>