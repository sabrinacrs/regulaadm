<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cliente;
use Redirect;

class ClientesController extends Controller
{
    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->fill($request->all());
        $cliente->save();

        // $data = $request->getPost();
        //
        // $login = $data['email'];
        // $senha = $data['senha'];


        return response()->json($cliente, 201);
    }

    public function postData()
    {
      $vr = array('nome'=>'Nome do Fulano',
                'senha'=>'passworddouser',
                'email'=>'emaildouser@gmai.com',
                'login'=>'userlog');

      $teste = json_encode($vr);
      //response()->json($vr);
      // $response = json_decode($teste);

      return redirect()->action('ClientesController@store', array('cliente' => $teste));
    }

    // public function store(Request $request)
    // {
    //     // echo "entrou";
    //     // var_dump($request);
    //     // return ['nome'=>'Nome do Fulano',
    //     //           'senha'=>'passworddouser',
    //     //           'email'=>'emaildouser@gmai.com',
    //     //           'login'=>'userlog'];
    //
    //     // $data = Input::all(); //$data = $request->json()->all(); should also work
    //     //  $order = new Cliente();
    //     //  $order->nome = $data['nome'];
    //     //  $order->email = $data['email'];
    //     //  $order->login = $data['login'];
    //     //  $order->save();
    //     //
    //     //  $var_dump($order);
    //
    //     // $array = json_decode($json, true);
    //
    //     // var_dump($request->all());
    //     if($request->isMethod('post'))
    //     {
    //       $json = $request->get('cliente');
    //
    //       $cliente_json = json_decode($json, true);
    //
    //       $cliente= new Cliente();
    //       $cliente->fill($cliente_json);
    //       $cliente->save();
    //
    //       return response()->json($cliente, 201);
    //     }
    //     else {
    //       echo "Não rolou post";
    //     }
    //
    //
    // }

    // public function postData()
    // {
    //   $vr = array('nome'=>'Nome do Fulano',
    //             'senha'=>'passworddouser',
    //             'email'=>'emaildouser@gmai.com',
    //             'login'=>'userlog');
    //
    //   $teste = json_encode($vr);//response()->json($vr);
    //   // $response = json_decode($teste);
    //
    //   return redirect()->route('ClientesController@store', array('cliente' => $teste));
    //
    //   // return Redirect::action('ClientesController@store', array('nome'=>'Nome do Fulano',
    //   //           'senha'=>'passworddouser',
    //   //           'email'=>'emaildouser@gmai.com',
    //   //           'login'=>'userlog'));
    //     // $ch = curl_init();
    //     // curl_setopt($ch, CURLOPT_URL,"http://localhost/cottonappadmin/public/api/clientes/store");
    //     // curl_setopt($ch, CURLOPT_POST, 1);
    //     // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('nome'=>'email', 'senha'=>'pass', 'email'=>'pass', 'login'=>'passlogin')));
    //     // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     // $output = curl_exec ($ch);
    //     // curl_close ($ch);
    //     //
    //     // echo $output;
    //
    //     // $this->post('api/clientes/store', [
    //     //             'nome'=>'Nome do Fulano',
    //     //             'senha'=>'passworddouser',
    //     //             'email'=>'emaildouser@gmai.com',
    //     //             'login'=>'userlog'])
    //     //     ->seeStatusCode(200)
    //     //     ->seeJson(['nome'=>'Nome do Fulano',
    //     //               'senha'=>'passworddouser',
    //     //               'email'=>'emaildouser@gmai.com',
    //     //               'login'=>'userlog']);
    //
    //
    //     // return ['nome'=>'Nome do Fulano',
    //     //           'senha'=>'passworddouser',
    //     //           'email'=>'emaildouser@gmai.com',
    //     //           'login'=>'userlog'];
    //     //
    //     // $this->store();
    //
    //     // return Redirect::route('profile', array('user' => 1));
    //     // $redirect = new Redirect();
    //
    //
    // }
}
