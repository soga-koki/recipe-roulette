<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Comment;
use Illuminate\Http\Request;



class CommentController extends Controller
{

    public function store(Request $request, $recipeId)
    {
        $request->validate([
            'text' => 'required',
        ]);
    
        $comment = new Comment();
        $comment->text = $request->input('text');
        $comment->user_id = auth()->user()->id;
        $comment->recipe_id = $recipeId;
        $comment->save();
    
        return response()->json([
            'message' => 'コメントが追加されました',
            'comment' => $comment->text,
            'user' => auth()->user()->name,
        ]);
    }
    


    public function edit(Comment $comment)
    {
        return view('admin.comments.edit', ['comment' => $comment]);
    }

    public function update(Request $request, Comment $comment)
    {
        $validatedData = $request->validate([
            'text' => 'required',
        ]);

        $comment->update($validatedData);
        return redirect()->route('admin.dashboard')->with('success', 'コメントが正常に更新されました');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('admin.dashboard')->with('success', 'コメントが正常に削除されました');
    }

}
