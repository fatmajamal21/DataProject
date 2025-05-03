<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class productController extends Controller
{

    // DataProject/products/product
    public function index()
    {
        $products = Product::query()->orderBy('id', 'desc')->paginate(5);
        return view('Products.index', compact('products'));
    }
    public function edit($id)
    {
        $product = product::query()->findOrFail($id);
        return view('Products.edit', compact('product'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'qun' => 'required|integer',  // التأكد من أن الحقل يحتوي على قيمة صحيحة
        ]);

        $product = Product::findOrFail($request->id);
        $product->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => $request->price,
            'qun' => $request->qun, // تأكد من إرسال قيمة صالحة هنا
        ]);

        $product->save();
        dd($request);
        return redirect()->route('DataProject.product.index')->with('success', 'product updated successfully!');
    }


    public function delete($id)
    {
        $product = product::findOrFail($id);
        $product->delete();

        return redirect()->route('DataProject.product.index')->with('success', 'product deleted successfully!');
    }




    public function create()
    {
        return view('Products.create');
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required',
            'price' => 'required|numeric', // تأكد من أن السعر موجود وهو عدد
            'qun' => 'required|integer',
        ]);
        // dd($request);
        product::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => $request->price,
            'qun' => $request->qun,

        ]);

        return redirect()->route('DataProject.product.index')->with('success', 'product created successfully!');
    }
}
