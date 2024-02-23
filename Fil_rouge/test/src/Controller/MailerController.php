<?php

// src/Controller/MailerController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class MailerController extends AbstractController
{
    #[Route('/email')]
    public function sendEmail(MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from('amelie.gattepaille@gmail.com')
            ->to('amelie.gattepaille@gmail.com')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<
            p>See Twig integration for better HTML integration!</p>');

        // ...
        try {
            $mailer->send($email);
            
            // Return a response indicating success
            return new Response('Email sent !', Response::HTTP_OK);
            var_dump($email);
        } catch (TransportExceptionInterface $e) {
            // Handle the exception
            
            // Return a response indicating failure
            return new Response('Failed to send email.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}