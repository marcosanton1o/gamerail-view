<?php
namespace App\Http\Controllers;
use App\Http\Requests\GameCategoryRequest;
use App\Models\GameCategory;

class GameCategoriesController extends Controller
{
    public function index()
    {
        $gameCategories = GameCategory::all();
        $totalGameCategories = $gameCategories->count();
        return view('gameCategories.index', compact('gameCategories', 'totalGameCategories'));
    }

    public function create()
    {
       return view('gameCategories.create');
    }

    public function store(GameCategoryRequest $request)
{
    $gameCategory = new GameCategory;
    $gameCategory->name = $request->name;
    $gameCategory->description = $request->description;
    $gameCategory->save();

    session()->flash('message', 'A categoria: ' . $request->name . ' foi adicionada com sucesso!');
    return redirect('/gameCategories');
}
    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        $gameCategory = GameCategory::findOrFail($id);
            return view('gameCategories.edit', compact('gameCategory'));
        }

        public function update(GameCategoryRequest $request, $id)
        {
                $gameCategory = GameCategory::findOrFail($id);
                $gameCategory->update($request->all());
        
            session()->flash('message', 'A categoria: ' . $request->name . ' foi atualizada com sucesso!');
            return redirect()->route('gameCategories.index');
        }

    public function destroy(string $id)
    {
        $gameCategories = GameCategory::findOrFail($id);
        $gameCategories->delete();
        session()->flash('message', 'A categoria: ' . $gameCategories->name . ' foi deletada com sucesso!');
        return redirect('/gameCategories');
    }
}