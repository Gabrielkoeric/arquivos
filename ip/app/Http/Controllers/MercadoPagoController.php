<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MercadoPagoController extends Controller
{
    public function iniciarPagamento(Request $request)
    {
        //dd($request);
        $id = $request->session()->get('pagamnto')['id'];
        $valor = $request->session()->get('pagamnto')['valor'];
        //dd("id é $id e valor é $valor");

        $publicKey = config('services.mercado_pago.public_key');
        $accessToken = config('services.mercado_pago.access_token');

        $url = "https://api.mercadopago.com/checkout/preferences?access_token={$accessToken}";
        //dd($url);

        $data = [
            "notification_url" => "https://developer.modetc.net.br/webhook",
            "external_reference" => "$id",
            "items" => [
                [
                    "title" => "Compra#$id",
                    "quantity" => 1,
                    "currency_id" => "BRL",
                    "unit_price" => $valor,
                    "picture_url" => "https://developer.modetc.net.br/storage/imagemProduto/pBPzPoMwELRZynqg0q98MLe1gNBCatdmDAdxawqc.jpg"
                ]
            ]
        ];
        $response = Http::post($url, $data);
        //dd($response);

// Verifique se a resposta foi bem-sucedida
        if ($response->status() == 201) {
            $responseData = $response->json();
            return redirect($responseData['init_point']);
            //dd($responseData);
        } else {
            // Lida com erros de requisição
            $responseBody = $response->body();
            return redirect($responseBody['init_point']);
            //dd($responseBody);
            //dd("deu ruin");
        }

    }

    public function webhook(Request $request)
    {

        $requestJson = json_encode([
            'headers' => $request->headers->all(),
            'content' => $request->getContent(),
            'query' => $request->query->all(),
            'request' => $request->request->all(),
            'server' => $request->server->all(),
            'cookies' => $request->cookies->all(),
            'files' => $request->files->all(),
        ], JSON_PRETTY_PRINT);

        // Registre a requisição completa nos logs
        Log::info('Requisição completa:', ['request' => $requestJson]);

        // Chave de acesso (access token) do Mercado Pago
        $accessToken = config('services.mercado_pago.access_token');

        $authorizationHeader = $request->header('Authorization');

        $signature = $request->header('X-Signature');

// Registre o cabeçalho de autorização nos logs para depuração
        Log::info('x-signature: ' . $signature);
        Log::info('Cabeçalho de Autorização:', ['Authorization' => $authorizationHeader]);
        Log::info('accessToken:', ['accessToken' => $accessToken]);

        // Verifique se o Access Token na requisição corresponde ao seu Access Token
        if ($request->header('Authorization') !== 'Bearer ' . $accessToken) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }


        // Obtenha os dados da notificação
        $notificationData = $request->all();

        // Registre os dados da notificação nos logs
        Log::info('Notificação recebida:', $notificationData);

        // Agora você pode prosseguir com o processamento dos dados da notificação

        // Responda à notificação, se necessário
        return response()->json(['status' => 'ok']);
    }

/*    public function webhook(Request $request)
    {

        $accessToken = config('services.mercado_pago.access_token');

        // Verifique se o Access Token na requisição corresponde ao seu Access Token
        if ($request->header('Authorization') !== 'Bearer ' . $accessToken) {
            $notificationData = $request->all();
            Log::info('Notificação recebida:', $notificationData);
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $notificationData = $request->all();
        Log::info('Notificação recebida:', $notificationData);
        // Agora você pode prosseguir com o processamento dos dados da notificação

        // Responda à notificação, se necessário
        return response()->json(['status' => 'ok']);
    }*/
}








