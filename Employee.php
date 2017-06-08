<?php

class Employee {

    private $firstName = '';
    private $lastName = '';
    private $annualSalary = '';
    private $superRate = '';
    private $paymentStartDate = '';

    /**
     * Employee constructor.
     * @param $firstName
     * @param $lastName
     * @param $annualSalary
     * @param $superRate
     * @param $paymentStartDate
     */
    public function __construct($firstName, $lastName, $annualSalary, $superRate, $paymentStartDate)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->annualSalary = $annualSalary;
        $this->superRate = $superRate;
        $this->paymentStartDate = $paymentStartDate;
    }


    /**
     * Getter for the property firstName.
     * @return [string]
     */
    public function getFirstName ()
    {
        return $this->firstName;
    }

    /**
     * Getter for the property $lastName.
     * @return [string]
     */

    public function getLastName() {
        return $this->lastName;
    }

    /**
     * Getter for the property $annualSalary.
     * @return [integer]
     */
    public function getAnnualSalary () {
        return $this->annualSalary;
    }

    /**
     * Getter for the property $lastName.
     * @return [string]
     */
    public function getPaymentStartDate() {
        return $this->paymentStartDate;
    }

    /**
     * Getter for the property $superRate.
     * @return [integer]
     */
    public function getSuperRate() {
        return $this->superRate;
    }
}
?>