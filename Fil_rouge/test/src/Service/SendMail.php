<?php

namespace App\Service;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Dompdf\Dompdf;
use Dompdf\Options;


class SendMail
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function generatePDF(): Dompdf
    {
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $options = new Options();
        $options->set('defaultFont', 'Courier');
        $dompdf->setOptions($options);
        // use the Twig environment to render the twig template
        $twig = new \Twig\Environment(new \Twig\Loader\FilesystemLoader([__DIR__.'/../../templates']));

        $dompdf->loadHtml(($twig->render('invoice/invoice.html.twig', [
            'firstname' => 'Fabien',
            'lastname' => 'Gentil',
            'street' => 'rue du Luxembourg',
            'city' => 'Roubaix',
            'zipcode' => '59000',
            'type' => 'Grande',
            'price' => '5 000',
            'description' => 'La maison était très sale'
        ])));

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();
         
        return $dompdf;
    }
    
    public function send(): void
    {
        // Generating the PDF
        $attachment = $this->generatePDF();

        // Creating the email
        $email = (new TemplatedEmail())
            ->from('amelie.gattepaille@gmail.com')
            ->to('amelie.gattepaille@gmail.com')
            ->subject('Votre facture')
            ->htmlTemplate('emails/invoiceEmail.html.twig')
            ->context([
                'expiration_date' => new \DateTime('+7 days'),
                'username' => 'foo',
            ])
            // Attach the PDF content
            ->attach($attachment->output(), 'Facture client.pdf', 'application/pdf');
          
        // Sending the email
        $this->mailer->send($email);
    }

    /* private function imageToBase64($path) {
        $path = $path;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    } */
}
