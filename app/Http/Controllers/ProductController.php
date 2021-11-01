<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product as ProductModel;
class ProductController extends Controller
{
    public function index(){
        $events = ProductModel::all();
        
        $data = [
            'events' => $events
        ];
        return view('welcome', $data);
    }

    public function store(Request $request)
    {

        /*
        Alerta: todo formulário deverá ter a diretiva @csrf -- abaixo da tag form
        */
       $events = new ProductModel();

       //exemplo como se no banco tivesse uma coluna denominada name,
       //no request do formulário deverá vir o mesmo campo.
       $events->name = $request->name;

       $events->save();

       return redirect('/');
    }
}
