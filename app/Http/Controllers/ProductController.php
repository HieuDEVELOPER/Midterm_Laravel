<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.products.index", ["productList" => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.products.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = '';
        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'mimes:jpg,png,jpeg|max: 2048'
            ], [
                'image.mimes' => 'chi chap nhan file hinh anh',
                'image.max' => 'chi chap nhan hinh anh duoi 2MB'
            ]);
            $file = $request->file('image');
            $name = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('image');
            $file->move($destinationPath, $name);
        }
        $this->validate($request, [
            'name'=>'required',
            'price'=>'required',
            'description' => 'required',

        ], [

            'name.required' => 'ban chua nhap name',
            'price.required'=>'bạn chua nhập giá',
            'description.required' => 'ban chua nhan mo ta',



        ]);
        //handle file
        $file = $request->file("img");
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path("images"), $fileName);
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->img = $fileName;
        $product->save();
        return redirect()->route("products.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('pages.products.detail', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("pages.products.edit", ["product" => Product::find($id)]);
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
        $request->validate([], []);
        //handle file
        $file = $request->file("img");
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path("images"), $fileName);
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        $product->img = $fileName;
        $product->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        unlink("images/" . $product->img);
        $product->delete();
        return redirect()->route('products.index');
    }
}
