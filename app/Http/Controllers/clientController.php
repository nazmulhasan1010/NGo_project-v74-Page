<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class clientController extends Controller
{
    public function message(Request $request)
    {
        $this->validate($request, [
            'clientName' => 'required',
            'clientMail' => 'required',
        ]);
        try {
            $message = new Message();
            $message->name = $request->clientName;
            $message->email = $request->clientMail;
            $message->message = $request->clientMessage;
            $message->contact = $request->clientContact;
            $message->save();
            return redirect()->back();
        } catch (\Exception $e) {

        }

    }

    public function download($path): \Symfony\Component\HttpFoundation\StreamedResponse
    {
        return Storage::download('public/notice/' . $path);
    }
}
