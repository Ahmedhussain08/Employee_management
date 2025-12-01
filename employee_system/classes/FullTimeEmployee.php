<?php
require_once 'Employee.php';

class FullTimeEmployee extends Employee {
    private $designation;
    private $basic;
    private $bonus;

    public function __construct($name, $id, $designation, $basic, $bonus){
        parent::__construct($name, $id);
        $this->designation = $designation;
        $this->basic = floatval($basic);
        $this->bonus = floatval($bonus);
    }

    public function getDesignation(){ 
        return $this->designation; 
    }

    public function calculateGrossSalary(){
        return $this->basic + $this->bonus;
    }

    public function calculateTaxDeduction(){
        $gross = $this->calculateGrossSalary();
        if($gross > 100000) return $gross * 0.20;
        if($gross > 50000) return $gross * 0.10;
        return 0;
    }

    public function calculateSalary(){
        return $this->calculateGrossSalary() - $this->calculateTaxDeduction();
    }
}
?>
