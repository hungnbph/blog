<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $products = Product::paginate(5);
        return view('products.list', ['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('products.create', ['category'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required',
            'image_url'=> 'required',
            'description'=> 'required',
            'price'=> 'required|numeric|min:0|not_in:0',
            'sale_percent'=> 'required|numeric|min:0|lt:price',

        ],[
            'name.required'=> '*không được để trống name product *',
            'image_url.required'=> '*không được để trống ảnh *',
            'description.required'=> '*không được để trống  mổ tả*',
            'price.required'=> '*không được để trống giá *',
            'sale_percent.required'=> '*không được để trống  giá sale *',
            'price.min' => 'giá phải lớn hơn 0',
            'sale_percent.lt'=> ' giá phải nhỏ hơn giá gốc'

        ]);
        $product = new Product;
        $product->fill($request->all());
        if ($request->hasFile('image_url')) {
            $originalFileName = $request->image_url->getClientOriginalName();
            $fileName = uniqid() . '_' . str_replace(' ', '_', $originalFileName);
            $path = $request->file('image_url')->store('images','public', $fileName);
            $product->image_url = $path;
        }
        if ($product->save()) {
            return redirect()->route('products.index')->with('notify', 'Thêm sản phẩm thành công');
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $comments = Comment::with(['user', 'product'])->where('product_id', $product->id)->orderBy('id', 'DESC')->get();
        return view('products.show', compact('product', 'comments')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category = Category::all();
        return view('products.edit',[ 'category'=> $category], ['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
            'name'=> 'required',
            'image_url'=> 'required',
            'description'=> 'required',
            'price'=> 'required|numeric|min:0|not_in:0',
            'sale_percent'=> 'required|numeric|min:0|lt:price',

        ],[
            'name.required'=> '*không được để trống name product *',
            'image_url.required'=> '*không được để trống ảnh *',
            'description.required'=> '*không được để trống  mổ tả*',
            'price.required'=> '*không được để trống giá *',
            'sale_percent.required'=> '*không được để trống  giá sale *',
            'price.min' => 'giá phải lớn hơn 0',
            'sale_percent.lt'=> ' giá phải nhỏ hơn giá gốc'

        ]);
        if ($request->hasFile('image_url')) {
            $originalFileName = $request->image_url->getClientOriginalName();
            $fileName = uniqid() . '_' . str_replace(' ', '_', $originalFileName);
            $path = $request->file('image_url')->store('images','public', $fileName);
            $product->image_url = $path;
        }
           $product->update($request->all()) ;
            return redirect()->route('products.index')->with('notify', 'Sửa sản phẩm thành công');
            
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product){
            $product->delete();
        }
        return redirect()->route('products.index');
    }
}
