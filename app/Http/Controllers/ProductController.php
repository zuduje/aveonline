<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function create(ProductRequest $request){
        $ref = $request->has('reference')?$request->get('reference'):0;
        $product_name = $request->has('product_name')?$request->get('product_name'):"";
        $observation = $request->has('observation')?$request->get('observation'):"";
        $price = $request->has('price')?$request->get('price'):0;
        $amount = $request->has('amount')?$request->get('amount'):0;
        $taxes = $request->has('taxes')?$request->get('taxes'):0;
        $state = $request->get('state');
        $image = $request->hasFile('image')?$request->file('image'):null;
        $path = resource_path().'/receipts/';
        $image->storeAs($path,$image->getClientOriginalName());
        $product = new Product();
        $product->reference = $ref;
        $product->observation = $observation;
        $product->product_name = $product_name;
        $product->price = $price;
        $product->amount = $amount;
        $product->taxes = $taxes;
        $product->status = $state === "on"?true:false;
        $product->image_name = $image->getClientOriginalName();
        $product->save();
        $url = env('URL_API', '');
        $response = Http::get($url.'0');
        $objectResult = $response->json();
        $histories = $objectResult['response']['guias'][0]['historicos'];
        return view('welcome',[
            'info' => $objectResult,
            'histories' => $histories
        ]);
    }

    public function update(Request $request){
        $ref = $request->has('ref')?$request->get('ref'):0;
        $url = env('URL_API', '');
        $response = Http::get($url.$ref);
        $objectResult = $response->json();
        $histories = $objectResult['response']['guias'][0]['historicos'];
        return view('welcome',[
            'info' => $objectResult,
            'histories' => $histories
        ]);
    }

    public function delete(){

    }

    public function read($ref = 0){
        $url = env('URL_API', '');
        $response = Http::get($url.$ref);
        $objectResult = $response->json();
        $histories = $objectResult['response']['guias'][0]['historicos'];
        return view('welcome',['info' => $objectResult, 'histories' => $histories]);
    }
}
