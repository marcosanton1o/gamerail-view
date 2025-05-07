<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Company;
use App\Models\ProdCategory;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['manufacturer', 'category'])->get();
        $totalProducts = $products->count();
        return view('products.index', compact('products', 'totalProducts'));
    }

    public function create()
    {
        $companies = Company::all();
        $categories = ProdCategory::all();
        return view('products.create', compact('companies', 'categories'));
    }

    public function store(ProductRequest $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->manufacturer_id = $request->manufacturer_id;
        $product->description = $request->description;
        $product->release_date = $request->release_date;
        $product->category_id = $request->category_id; 
        $product->save();

        session()->flash('message', 'O produto: ' . $request->name . ' foi adicionado com sucesso!'); // Usar "name"
        return redirect('/products');
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $companies = Company::all();
        $categories = ProdCategory::all();
        return view('products.edit', compact('product', 'companies', 'categories'));
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());

        session()->flash('message', 'O produto: ' . $request->name . ' foi atualizado com sucesso!'); // Usar "name"
        return redirect()->route('products.index');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        session()->flash('message', 'O produto: ' . $product->name . ' foi deletado com sucesso!'); // Usar "name"
        return redirect('/products');
    }
}
