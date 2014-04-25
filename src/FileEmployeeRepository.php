<?php

/**
 * Class FileEmployeeRepository
 */
class FileEmployeeRepository implements EmployeeRepository
{
    private $fileName;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @param XDate  $xDate
     *
     * @return array $employees
     */
    public function findEmployeesWhoseBirthdayIs(XDate $xDate)
    {
        $fileHandler = $this->getFileHandler();
        $employees   = [];

        while ($employeeData = fgetcsv($fileHandler, null, ',')) {
            $employee = $this->getEmployee($employeeData);
            if ($employee->isBirthday($xDate)) {
                $employees[] = $employee;
            }
        }

        return $employees;
    }

    private function getFileHandler()
    {
        $fileHandler = fopen($this->fileName, 'r');
        fgetcsv($fileHandler);

        return $fileHandler;
    }

    /**
     * @param array $employeeData
     *
     * @return Employee
     */
    private function getEmployee($employeeData)
    {
        $employeeData = array_map('trim', $employeeData);
        $employee = new Employee($employeeData[1], $employeeData[0], $employeeData[2], $employeeData[3]);

        return $employee;
    }
} 