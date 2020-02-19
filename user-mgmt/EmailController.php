<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\PlainMail;
use App\Mail\HTMLMail;
use Mail;

class EmailController extends Controller
{
    public function plainEmail() { 
        $data = [ 
            'name' => 'Test User Name', 
            'message' => 'Test Message', 
            'subject' => 'Test Subject - Plain Email', 
            'from' => 'veli.rexhepi@domain.com', 
            'from_name' => 'Test From Name', 
        ]; 
        
        Mail::to('veli.rexhepi@domain.com', 'Veli Rexhepi')
            ->send(new PlainMail($data)); 
            
        return "Plain Email Sent. Check your inbox."; 
    } 
    
    public function htmlEmail() { 
        $data = [ 
            'name' => 'Test User Name', 
            'message' => 'Test Message', 
            'subject' => 'Test Subject - HTML Email', 
            'from' => 'veli.rexhepi@domain.com', 
            'from_name' => 'Test From Name', 
        ]; 
        
        Mail::to('veli.rexhepi@domain.com', 'Veli Rexhepi')
            ->send(new HTMLMail($data)); 
            
        return "HTML Email Sent. Check your inbox."; 
    }

    public function beautyEmail() { 
        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class); 
        $beautymail->send('emails.beautymail', ['name' => 'Test User - Beautymail'], 
        function ($message) { 
            $message ->from('veli.rexhepi@domain.com') 
                ->to('veli.rexhepi@domain.com', 'Veli rexhepi') 
                ->subject('Welcome!'); 
            }
        ); 
        
        return "Beauty Email Sent. Check your inbox."; 
    }
}