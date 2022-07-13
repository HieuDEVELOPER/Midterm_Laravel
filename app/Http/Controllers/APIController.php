<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;


use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        // return response()->json($Products, Response::HTTP_OK);
        $Products = Product::all();
        if (count($Products) > 0) {
            return response()->json(["status" => "200", "success" => true, "count" => count($Products), "data" => $Products]);
        } else {
            return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! no record found"]);
        }
        // return $Products;
    }
    public function searchByName(Request $request)
    {
   
        $result = DB::table('product')
        ->where('name', 'like', '%'. $request->name .'%')->whereBetween('price', [$request->min, $request->max])
        ->get();
        return response()->json(["data"=>   $result]);
    }
    public function searchSum()
    {
        $sum = DB::table('product')->select(DB::raw('type,count(type) as quantity'))->groupBy('type')->get();
        if (count($sum) > 0) {
            return response()->json(["status" => "200", "success" => true, "count" => count($sum), "data" =>  $sum]);
        } else {
            return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! no record found"]);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { {
            $validation = Validator::make(
                $request->all(),
                [
                    'make' => 'required',
                    'model' => 'required',
                    // 'name'=>'required',
                    'produced_on' => 'required|date',
                    'image' => 'mimes:jpeg,jpg,png,gif|max:10000'
                ]
            );

            if ($validation->fails()) {
                $response = array('status' => 'error', 'errors' => $validation->errors()->toArray());
                return response()->json($response);
            }
            //nếu dùng $this->validate() thì lấy về lỗi: $errors = $validate->errors();

            //kiểm tra file tồn tại
            $name = '';

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $name = time() . '_' . $file->getClientOriginalName();
                $destinationPath = public_path('image'); //project\public Product, //public_path(): trả về đường dẫn tới thư mục public
                $file->move($destinationPath, $name); //lưu hình ảnh vào thư mục public/images/Products
            }

             $Product = new Product();
             $Product->make = $request->make;
             $Product->model = $request->model;
            //  Product -> name = $request->name;
             $Product->image = $name;
             $Product->produced_on = $request->produced_on;
             $Product->save();
            if ( $Product) {
                return response()->json(["status" => "200", "success" => true, "message" => " Product record created successfully", "data" =>  $Product]);
            } else {
                return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! failed to create."]);
            }
        }
    }

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
        $validation = Validator::make(
            $request->all(),
            [
                'make' => 'required',
                'model' => 'required',
                // 'name'=>'required',
                'produced_on' => 'required|date',
                'image' => 'mimes:jpeg,jpg,png,gif|max:10000'
            ]
        );

        if ($validation->fails()) {
            $response = array('status' => 'error', 'errors' => $validation->errors()->toArray());
            return response()->json($response);
        }
        //nếu dùng $this->validate() thì lấy về lỗi: $errors = $validate->errors();

        //kiểm tra file tồn tại
        $name = '';

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('image'); //project\public Product, //public_path(): trả về đường dẫn tới thư mục public
            $file->move($destinationPath, $name); //lưu hình ảnh vào thư mục public/images/Products
        }

         $Product = Product::find($id);
         $Product->make = $request->make;
         $Product->model = $request->model;
        //  Product -> name = $request->name;
         $Product->image = $name;
         $Product->produced_on = $request->produced_on;
         $Product->save();
        if ( $Product) {
            return response()->json(["status" => "200", "success" => true, "message" =>  "Product record created successfully", "data" =>  $Product]);
        } else {
            return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! failed to create."]);
        }
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
