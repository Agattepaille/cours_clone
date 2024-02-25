<?php
namespace App\Service;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

class SendMail
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function send(
       /*  string $from,
        string $to,
        string $subject,
        string $template,
        array $context */
    ): void
    {
        //On crée le mail
        $email = (new TemplatedEmail())
            ->from('amelie.gattepaille@gmail.com')
            ->to('amelie.gattepaille@gmail.com','jeremydecreton@live.fr','mathilde.brx@gmail.com','dylan.rohart@hotmail.fr')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
    // path of the Twig template to render
    ->htmlTemplate('emails/welcome.html.twig')

    // change locale used in the template, e.g. to match user's locale
    //->locale('fr')

    // pass variables (name => value) to the template
    ->context([
        'expiration_date' => new \DateTime('+7 days'),
        'username' => 'foo',
    ]);

        // On envoie le mail
        $this->mailer->send($email);
    }
}