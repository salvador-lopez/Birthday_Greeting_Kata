<?php

class BirthdayService
{
    /**
     * @var EmployeeRepository
     */
    private $employeeRepository;

    /**
     * @var MailerService
     */
    private $mailer;

    /**
     * @param EmployeeRepository $employeeRepository
     * @param $mailer
     */
    public function __construct($employeeRepository, $mailer)
    {
        $this->employeeRepository = $employeeRepository;
        $this->mailer = $mailer;
    }

    public function sendGreetings(XDate $xDate)
    {
        $employees = $this->findEmployeesWhoseBirthdayIs($xDate);

        foreach ($employees as $employee) {
            $this->sendGreetingsMessage($employee);
        }
    }

    /**
     * @param XDate  $xDate
     *
     * @return array $employees
     */
    private function findEmployeesWhoseBirthdayIs(XDate $xDate)
    {
        $employees = $this->employeeRepository->findEmployeesWhoseBirthdayIs($xDate);

        return $employees;
    }

    /**
     * @param Employee $employee
     */
    private function sendGreetingsMessage($employee)
    {
        $recipient = $employee->getEmail();
        $body      = sprintf('Happy Birthday, dear %s!', $employee->getFirstName());
        $subject   = 'Happy Birthday!';

        $this->mailer->sendMessage('sender@here.com', $subject, $body, $recipient);
    }
}