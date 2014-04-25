<?php

/**
 * Interface EmployeeRepository
 */
interface EmployeeRepository
{
    /**
     * @param XDate $xDate
     *
     * @return Employee
     */
    public function findEmployeesWhoseBirthdayIs(XDate $xDate);
} 