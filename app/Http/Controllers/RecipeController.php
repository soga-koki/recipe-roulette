<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Recipe;


class RecipeController extends Controller
{
    public function random($category)
    {
        $recipe = Recipe::where('category', $category)->inRandomOrder()->first();

        if (!$recipe) {
            return redirect('/')->with('error', '該当のカテゴリにレシピが見つかりませんでした。');
        }

        return view('recipes.show', ['recipe' => $recipe]);
    }

    public function index()
    {
        $recipes = Recipe::all();
        return view('admin.recipes.index', ['recipes' => $recipes]);
    }

    public function create()
    {
        return view('admin.recipes.create');
    }

    // public function store(Request $request)
    // {

    //     Log::info('Store method called');
    //     Log::info('Request data:', $request->all());
    //     $data = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'category' => 'required|string|max:255',
    //         'ingredients' => 'required|string', // 材料のバリデーション
    //         'instructions' => 'required|string', // 調理手順のバリデーション
    //     ]);
    
    //     Recipe::create($data);
    
    //     return redirect()->route('admin.dashboard')->with('success', 'レシピが正常に追加されました');
    // }
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();  // 認証済みのユーザーIDを取得
        $recipe = Recipe::create($data);
        return redirect()->route('admin.dashboard');
    }

    public function edit(Recipe $recipe)
    {
        return view('admin.recipes.edit', compact('recipe'));
    }

    // public function update(Request $request, Recipe $recipe)
    // {

    //     Log::info('Update method called');
    //     Log::info('Request data:', $request->all());
    //     $data = $request->validate([
    //         'title' => 'required|max:255',
    //         'category' => 'required|in:そば,うどん,パスタ,どんぶり',
    //         'ingredients' => 'required',
    //         'instructions' => 'required'
    //     ]);

    //     $recipe->update($data);
    //     return redirect()->route('admin.dashboard')->with('success', 'レシピが正常に更新されました');
    // }

    public function update(Request $request, $id)
    {
        Log::info('Update method called');
        Log::info('Request data:', $request->all());
        $recipe = Recipe::find($id);
        $recipe->update($request->all());
        // 管理者ダッシュボードに遷移
        return redirect()->route('admin.dashboard');
    }
    

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect()->route('admin.dashboard')->with('success', 'レシピが正常に削除されました');
    }
}
