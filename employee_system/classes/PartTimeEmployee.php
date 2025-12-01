<?php
require_once 'Employee.php';

class PartTimeEmployee extends Employee {
    private $designation;
    private $hours;
    private $rate;

    public function __construct($name, $id, $designation, $hours, $rate){
        parent::__construct($name, $id);
        $this->designation = $designation;
        $this->hours = floatval($hours);
        $this->rate = floatval($rate);
    }

    public function getDesignation(){ 
        return $this->designation; 
    }

    public function calculateGrossSalary(){
        return $this->hours * $this->rate;
    }

    public function calculateTaxDeduction(){
        $gross = $this->calculateGrossSalary();
        // Slightly lower thresholds for part-time
        if($gross > 80000) return $gross * 0.15;
        if($gross > 40000) return $gross * 0.08;
        return 0;
    }

    public function calculateSalary(){
        return $this->calculateGrossSalary() - $this->calculateTaxDeduction();
    }
}
?>
