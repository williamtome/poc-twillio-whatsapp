<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Twilio\TwiML\MessagingResponse;

class WhatsappMessageController extends Controller
{
    protected $message;
    public function create(Request $request)
    {
        $response = new MessagingResponse();
        $responseClient = strtolower($request->Body);
        $responded = false;
        if ($responseClient == strtolower('Oi') ||
            $responseClient == strtolower('Olá')) {
            $this->message = "Seja bem vindo. Sou o bot que irá lhe ajudar.\n Por favor, escolha a opção de atendimento que você deseja: \n 1 - Agendar consulta. \n 2 - Remarcação \n 3 - Cancelamento de consulta.";
            $response->message($this->message);
            $responded = true;
        } elseif ($responseClient == '1') {
            $this->message = "Escolha qual a especialidade que você precisa:\n1 - Clínico Geral\n2 - Pediatria\n3 - Fisioterapeuta";
            $response->message($this->message);
            $responded = true;
        } else {
            $this->message = 'Desculpe, mas não consegui entender.';
            $response->message($this->message);
        }



        echo $response;
    }
}
