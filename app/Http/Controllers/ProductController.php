<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductStoreRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // All Product
       $products = Product::all();

       // Return Json Response
       return response()->json([
          'products' => $products
       ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ProductStoreRequest $request)
    {
        try {

            // Create Product
            Product::create([
                'name' => $request->name,
                'quanty' => $request->quanty,
                'description' => $request->description,
                'category' => $request->category,
                'value' => $request->value
            ]);



            // Return Json Response
            return response()->json([
                'message' => "Product successfully created."
            ],200);
        } catch (\Exception $e) {
            // Return Json Response
            return response()->json([
                'message' => "Something went really wrong!"
            ],500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            // Create Product
            Product::create([
                'name' => $request->name,
                'quanty' => $request->quanty,
                'description' => $request->description,
                'category' => $request->category,
                'value' => $request->value
            ]);



            // Return Json Response
            return response()->json([
                'message' => "Product successfully created."
            ],200);
        } catch (\Exception $e) {
            // Return Json Response
            return response()->json([
                'message' => "Something went really wrong!"
            ],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Product Detail
       $product = Product::find($id);
       if(!$product){
         return response()->json([
            'message'=>'Product Not Found.'
         ],404);
       }

       // Return Json Response
       return response()->json([
          'product' => $product
       ],200);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(ProductStoreRequest $request, $id)
    {
        try {
            // Find product
            $product = Product::find($id);
            if(!$product){
              return response()->json([
                'message'=>'Product Not Found.'
              ],404);
            }


            $product->name = $request->name;
            $product->description = $request->description;
            $product->quanty = $request->quanty;
            $product->category = $request->category;
            $product->value = $request->value;


            // Update Product
            $product->save();

            // Return Json Response
            return response()->json([
                'message' => "Product successfully updated."
            ],200);
        } catch (\Exception $e) {
            // Return Json Response
            return response()->json([
                'message' => "Something went really wrong!"
            ],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
          // Detail
          $product = Product::find($id);
          if(!$product){
            return response()->json([
               'message'=>'Product Not Found.'
            ],404);
          }

          // Public storage
          $storage = Storage::disk('public');


          // Delete Product
          $product->delete();

          // Return Json Response
          return response()->json([
              'message' => "Product successfully deleted."
          ],200);
      }
    }




