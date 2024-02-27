<?php

// src/Controller/MailerController.php
namespace App\Controller;

use App\Service\SendMail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class MailerController extends AbstractController
{
    #[Route('/email')]
    public function sendEmail(SendMail $sendMail): Response
    {
        try {
            $sendMail->send();

            // Return a response indicating success
            return new Response('Email sent !', Response::HTTP_OK);
        } catch (TransportExceptionInterface $e) {
            // Handle the exception     
            // Return a response indicating failure
            return new Response('Failed to send email.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
