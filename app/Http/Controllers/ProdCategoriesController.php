<?php
namespace App\Http\Controllers;
use App\Http\Requests\ProdCategoryRequest;
use App\Models\ProdCategory;

class ProdCategoriesController extends Controller
{
    public function index()
    {
        $prodCategories = ProdCategory::all();
        $totalProdCategories = $prodCategories->count();
        return view('prodCategories.index', compact('prodCategories', 'totalProdCategories'));
    }

    public function create()
    {
       return view('prodCategories.create');
    }

    public function store(ProdCategoryRequest $request)
{
    $prodCategory = new ProdCategory;
    $prodCategory->name = $request->name;
    $prodCategory->description = $request->description;
    $prodCategory->save();

    session()->flash('message', 'A categoria: ' . $request->name . ' foi adicionada com sucesso!');
    return redirect('/prodCategories');
}
    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        $prodCategory = ProdCategory::findOrFail($id);
            return view('prodCategories.edit', compact('prodCategory'));
        }

        public function update(ProdCategoryRequest $request, $id)
        {
                $prodCategory = prodCategory::findOrFail($id);
                $prodCategory->update($request->all());
        
            session()->flash('message', 'A categoria: ' . $request->name . ' foi atualizada com sucesso!');
            return redirect()->route('prodCategories.index');
        }

    public function destroy(string $id)
    {
        $prodCategories = ProdCategory::findOrFail($id);
        $prodCategories->delete();
        session()->flash('message', 'A categoria: ' . $prodCategories->name . ' foi deletada com sucesso!');
        return redirect('/prodCategories');
    }
}