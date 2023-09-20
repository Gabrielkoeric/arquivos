<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = DB::table('ip')->orderBy('cidade')->get();
/*

                foreach ($dados as $dado)
                    if (is_null($dado->ip) || is_null($dado->cidade) || is_null($dado->continente) || is_null($dado->regiao) || is_null($dado->localizacao) || is_null($dado->empresa) || is_null($dado->postal) || is_null($dado->timezone))
                    {
                        $ip = $dado->ip;
                        $url = "https://ipinfo.io/$ip/json?token=5e2c5aa71f13aa";

                        // Faz a requisição HTTP
                        $response = file_get_contents($url);
                        $jsonData = json_decode($response);

                        $newData = [
                            'cidade' => "$jsonData->city",
                            'regiao' => "$jsonData->region",
                            'continente' => "$jsonData->country",
                            'localizacao' => "$jsonData->loc",
                            'empresa' => "$jsonData->org",
                            'postal' => "$jsonData->postal",
                            'timezone' => $jsonData->timezone,
                        ];

                        $isNull = false;
                        foreach ($newData as $value) {
                            if (is_null($value)) {
                                $isNull = true;
                                break;
                            }
                        }

                        if (!$isNull) {
                            DB::table('ip')
                                ->where('ip', $ip)
                                ->update($newData);
                        }
                    }*/
        return view('ip.index')->with('dados', $dados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ip.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //d($request);
        $arquivoIpPath = $request->file('arquivoIp')->store('arquivoIp', 'public');
        $request->arquivoIp = $arquivoIpPath;
        $nome = $request->input('nome');
        //dd("o arquivo é : $arquivoIpPath e o nome é $nome");

        $dados = [
            'nome' => $nome,
            'arquivoIp' => $arquivoIpPath
        ];
        //DB::table('incidente')->insert($dados);
        $idInserido = DB::table('incidente')->insertGetId($dados);
//dd($arquivoIpPath);

            // Abra o arquivo para leitura
        $fullFilePath = storage_path('app/public/' . $arquivoIpPath);

        $handle = fopen($fullFilePath, "r");


                while (($line = fgets($handle)) !== false) {
                    // Remova quaisquer caracteres de espaço em branco em branco no início ou no final
                    $ip = trim($line);
                    $existingIp = DB::table('ip')->where('ip', $ip)->first();

                    if (!$existingIp) {
                    //dd("IP: " . $ip);
                    // Exiba cada linha lida em vez de inserir no banco de dados
                     echo "IP: " . $ip . "<br>";
                    if (preg_match('/^(\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3})$/', $ip)) {
                        $url = "https://ipinfo.io/$ip/json?token=5e2c5aa71f13aa";

                        // Faz a requisição HTTP
                        $response = file_get_contents($url);
                        $jsonData = json_decode($response);

                        if (!empty($jsonData->city)) {
                            $newData = [
                                'ip' => "$ip",
                                'cidade' => "$jsonData->city",
                                'regiao' => "$jsonData->region",
                                'continente' => "$jsonData->country",
                                'localizacao' => "$jsonData->loc",
                                'empresa' => "$jsonData->org",
                                'postal' => "$jsonData->postal",
                                'timezone' => $jsonData->timezone,
                                'id_incidente' => $idInserido,
                            ];

                            DB::table('ip')->insert($newData);
                        }
                    }
                    }
                }

                fclose($handle);

        return redirect('/ip');
    }

    /*
    public function store(Request $request)
    {
        //dd($request);
        $imagemProdutoPath = $request->file('imagemProduto')->store('imagemProduto', 'public');
        $request->imagemProduto = $imagemProdutoPath;
        $nome = $request->input('nome');
        $quantidadeInicial = $request->input('quantidadeInicial');
        $quantidadeAtual = $request->input('quantidadeAtual');
        $valorCusto = $request->input('valorCusto');
        $valorVenda = $request->input('valorVenda');

        $produto_novo = new Estoques();
        $produto_novo->nome = $nome;
        $produto_novo->quantidade_inicial = $quantidadeInicial;
        $produto_novo->quantidade_atual = $quantidadeAtual;
        $produto_novo->valor_custo = $valorCusto;
        $produto_novo->valor_venda = $valorVenda;
        $produto_novo->imagemProduto = $imagemProdutoPath;
        $produto_novo->save();

        return redirect('/estoque')->with('mensagem.sucesso', 'Produto inserido com sucesso!');
    }
     */

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
}
