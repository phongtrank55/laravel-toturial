<?php

namespace App\Http\Controllers;


use Storage;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Input;
// use Validator;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products = Product::all();
        $products = Product::with('category:id,title')->get(); //luon co id
        // return $products; 
        return View('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id');
        // $categories = [];
        return View('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
    
            // $path = $request->photo->path();

// $extension = $request->photo->extension();
// $path = $request->photo->storeAs('images', 'filename.jpg', 's3');
        // if ($request->file('photo')->isValid()) 
        // if ($request->hasFile('photo')) {
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required',
        //     'price' => 'required',
        //     'category_id' => 'required'
        // ]);

      

        // if ($validator->fails()) {
        //     return redirect()->route('product.create')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }
        $data = $request->all();
        if(isset($data['img'])){
            // $file = $request->file('photo');
            // return $file;
            $imgName =  time().'.'.$request->img->extension();
            $data['img'] = $imgName;
            // Storage::putFile('spares', $file);
            // $path = $request->img->storeAs('public/uploads', $imgName); //in Storage
            // Storage::putFile($imgName, $request->img);

            // return $path;
        }else{
            $data['img'] = 'product-default.png';
        }
        // return $request->all();
        $p = Product::create($data);
        // return $p->id;
        return redirect()->route('product.index');  
        


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($if)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $categories = Category::pluck('title', 'id');
        $product = Product::findOrFail($id);
        // $categories = [];
        return View('product.edit', compact('categories', 'product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $oldProduct = Product::findOrFail($id);
        $data = $request->all();
        if(isset($data['img'])){
            // $file = $request->file('photo');
            // return $file;
            $imgName =  time().'.'.$request->img->extension();
            $data['img'] = $imgName;
            // Storage::putFile('spares', $file);
            $path = $request->img->storeAs('public/uploads', $imgName); //in Storage

            //delete old file
            if($oldProduct->img != 'product-default.png'){
                Storage::delete("public/uploads/".$oldProduct->img);
                // return 'deleted';
            }
            
        }else{
            $data['img'] = $oldProduct->img;
        }
        $oldProduct->update($data);
        return redirect()->route('product.index');  

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::findOrFail($id);
        $product->delete();
        if($product->img != 'product-default.png'){
            Storage::delete("public/uploads/".$product->img);
            // return 'deleted';
        }
        return redirect()->route('product.index');  
    }
}
