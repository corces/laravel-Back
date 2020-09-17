<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Mail\ConfirmarUsuario;
use Illuminate\Support\Facades\Mail;
class UsuarioController extends Controller{
    
    public function show(Request $request){
        return Usuario::all();
    }

    public function destroy(Request $request){
        return Usuario::destroy($request->id);
    }

    public function update(Request $request){
        
        $usuario = $request->all();
        Usuario::where('id', $request->id)
        ->update([
            'nombre'     => $usuario['nombre'],
            'rut'        => $usuario['rut'],
            'telefono'   => $usuario['telefono'],
            'correo'     => $usuario['correo']
        ]);
    }

    public function confirmar(Request $request){
        return self::soapCliente($request->id, 'confirmar');
       // return 'Usuario Confirmado';
    }

    public function create(Request $request){

        $validacion = 'no se pudo registrado el usuario';
        if(self::soapCliente($request->rut, 'validar') == 0){
            $usuario = Usuario::create($request->all());
            Mail::to($usuario['correo'])->queue(new ConfirmarUsuario($usuario));
            $validacion = 'usuario registrado correctamente';
        }
        return $validacion;
    }

    public function soapCliente($rut, $funcion){
        $datos ='';
        $cliente = new \SoapClient('http://localhost:8001/wsdl?wsdl', [
            'encoding' => 'UTF-8',
            'trace' => true
        ]);
        
        if($funcion == 'validar'){
            $datos = $cliente->validarUsuario($rut);
        }else{
            $datos = $cliente->confirmarUsuario($rut);
        } 
        return $datos;
        
    }

}
