<?php
namespace App\Service;

use Dompdf\Dompdf;
use Dompdf\Options;

class InvoiceGenerator
{    
    public function generatePDF($htmlContent, $outputFilename)
    {
        // Configure Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        // Instantiate Dompdf
        $dompdf = new Dompdf($options);

        // Load HTML content
        $dompdf->loadHtml($htmlContent);

        // (Optional) Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to a file
        $dompdf->stream($outputFilename);
    }
}
