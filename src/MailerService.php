<?php

/**
 * Interface MailerService
 */
interface MailerService
{
    /**
     * @param string $sender
     * @param string $subject
     * @param string $body
     * @param mixed  $recipient
     *
     * @return mixed
     */
    public function sendMessage($sender, $subject, $body, $recipient);
} 