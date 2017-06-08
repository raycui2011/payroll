<?php
class PayslipInfo {

    private $name= '';
    private $payPeriod = '';
    private $incomeTax= '';
    private $grossIncome = '';
    private $netIncome = '';
    private $super = '';


    /**
     * Setter for the property $name.
     * param $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * Getter for the property $name.
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Setter for the property $incomeTax.
     * param $incomeTax
     */
    public function setIncomeTax($incomeTax) {
        $this->incomeTax = $incomeTax;
    }

    /**
     * Getter for the property $incomeTax.
     */
    public function getIncomeTax() {
        return $this->incomeTax;
    }

    /**
     * Setter for the property $grossIncome.
     * param $grossIncome
     */
    public function setGrossIncome($grossIncome) {
        $this->grossIncome = $grossIncome;
    }

    /**
     * Getter for the property $grossIncome.
     */
    public function getGrossIncome() {
        return $this->grossIncome;
    }

    /**
     * Setter for the property $netIncome.
     * param $netIncome
     */
    public function setNetIncome($netIncome) {
        $this->netIncome = $netIncome;
    }

    /**
     * Getter for the property $netIncome.
     */
    public function getNetIncome() {
        return $this->netIncome;
    }

    /**
     * Setter for the property $super.
     * param $supser
     */
    public function setSuper($super) {
        $this->super = $super;
    }

    /**
     * Getter for the property $super.
     */
    public function getSuper() {
        return $this->super;
    }

    /**
     * Setter for the property $payPeriod.
     * param $payPeriod
     */
    public function setPayPeriod($payPeriod) {
        $this->payPeriod = $payPeriod;
    }

    /**
     * Getter for the property $payPeriod.
     */
    public function getPayPeriod() {
        return $this->payPeriod;
    }

}
?>