<?php

$service = new BirthdayService(
    new FileEmployeeRepository('employee_data.txt'),
    new SwiftMailerService(Swift_Mailer::newInstance(Swift_SmtpTransport::newInstance('localhost', 25)))
);
$service->sendGreetings(new XDate('2008/10/08'));