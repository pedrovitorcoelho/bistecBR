<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


Route::get('/token', function (Request $request) {
    $token = $request->session()->token();
 
    $token = csrf_token();
 
    // ...
});

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function contato() {
        return View::make('pages.contato');
       }
       public function postContato() {
       $rules = array( 'nome' => 'required', 'email' => 'required|email', 'texto' => 'required' );
       $validation = Validator::make(Input::all(), $rules);
       $data = array();
        $data['nome'] = Input::get("nome");
        $data['email'] = Input::get("email");
        $data['texto'] = Input::get("texto");
       if($validation->passes()) {
        Mail::send('emails.contato', $data, function($message) {
        $message->from(Input::get('email'), Input::get('nome'));
        $message->to('contato@billjr.com.br') ->subject('Contato Bill Jr.');
        });
       return Redirect::to('contato') ->with('message', 'Mensagem enviada com sucesso!');
        }
       return Redirect::to('contato') 
        ->withInput() 
        ->withErrors($validation) 
        ->with('message', 'Erro! Preencha todos os campos corretamente.');
       }


}

