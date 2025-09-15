<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }
    public function send(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        
        $contact = ContactMessage::create($data);
try{
    Mail::raw("New message from {$data['name']} ({$data['email']}):\n\n{$data['message']}", function ($mail) use ($data) {
        $mail->to('Iqra.chaudhry78714@gmail.com')
             ->subject('Thanks for contacting us!');

        

        $mail->replyTo($data['email']);
   
        });
    }catch (\Exception $e){
        dd($e);
    }
        return redirect(ContactMessageResource::getUrl('index'))->with('success', 'Message sent successfully!');
    }
}
