<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $sProduct = Product::select('products.*','categories.category_name')
                    ->join('categories','products.category_id','=','categories.id')
                    ->paginate(10);

        return view('product.index',compact('sProduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sCategory = Category::where('status','=','1')->get();
        return view('product.create', compact('sCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|unique:products,product_name|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:1',
            'image' => 'required', // Image validation
            'category_id' => 'required|exists:categories,id',
            'status' => 'required',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Unique filename
            $image->move(public_path('products'), $imageName); // Move to public/products folder
            $imagePath = 'products/' . $imageName; // Store relative path in DB
        }

        Product::create([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $imagePath, 
            'category_id' => $request->category_id,
            'status' => $request->status,
        ]);

        return redirect()->route('product.index')->with('success', 'Product added successfully.');
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
        $sProduct = Product::find($id);
        $sCategory = Category::all();
        return view('product.edit',compact('sProduct','sCategory'));
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
        $sProduct = Product::findOrFail($id);

        // Validate input fields
        $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
        ]);

        // Update product details
        $sProduct->product_name = $request->product_name;
        $sProduct->description = $request->description;
        $sProduct->price = $request->price;
        $sProduct->quantity = $request->quantity;
        $sProduct->category_id = $request->category_id;
        $sProduct->status = $request->status;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($sProduct->image && file_exists(public_path($sProduct->image))) {
                unlink(public_path($sProduct->image));
            }

            // Store new image
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Unique filename
            $image->move(public_path('products'), $imageName); // Move to public/products folder
            $imagePath = 'products/' . $imageName;
            $sProduct->image = $imagePath;
        }

        $sProduct->save();

        return redirect()->route('product.index')->with('success', 'Product updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sProduct = Product::find($id)->delete();
        return redirect()->route('product.index')->with('success','Product Deleted Successfully');
    }
}
