<?php

namespace App\Http\Controllers;
use PDF;
use Mail;

use Illuminate\Http\Request;

class PDFController extends Controller
{
        public function index()
        {
            $data["email"] = "shivamsmartitventures@gmail.com";
            $data["title"] = "From Smart It Ventures";
            $data["body"] = "This is Demo";
            $data["image"] = "https://bucket-dev-sss.s3.us-east-1.amazonaws.com/images/ink-pinned/1664179189.png";
    
            $pdf = PDF::loadView('emails.myTestMail', $data);
    
            Mail::send('emails.myTestMail', $data, function($message)use($data, $pdf) {
                $message->to($data["email"], $data["email"])
                        ->subject($data["title"])
                        ->attachData($pdf->output(), "text.pdf");
            });
    
            dd('Mail sent successfully');
        }
    
}
