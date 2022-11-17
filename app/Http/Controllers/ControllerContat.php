<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContatoEmail;

class ControllerContat extends Controller
{
    public function enviaMsg(Request $request)
    {
       Mail::to($request->email)
          ->bcc('pedrovitorbistec@gmail.com')
          ->send(new ContatoEmail($request));
       return redirect('/contato')->with('mensagem','O seu formulário foi enviado com sucesso');
    }
}

