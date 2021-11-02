<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product as ProductModel;
class ProductController extends Controller
{
     public function principal(){
         $events = ProductModel::all();
        
        $data = [
            'events' => $events
        ];
        return view('product.product', []);
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

       $events->image = '';

       if($request->hasFile('image') && $request->file('image')->isValid()){

        $image = $request->image;

        $extension = $image->extension();

        $imageName = md5($image->getClientOriginalName().strtotime('now')).'.'.$extension;

        $request->image->move(public_path('img/products'), $imageName);

        $events->image = $imageName;
       }

       $events->save();

       //->with vai mensagem para sessão
       return redirect('/')->with('msg', 'Produto salvo com sucesso');
    }

    public function show($id){
        $model = ProductModel::findOrFail($id);

        $data = [
            'product' => $model
        ];

        return view('products.show', $data);
    }
}
