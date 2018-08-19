<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentController extends Controller
{
    public function index()
    {
    	$comment = Comment::where('parent_id', 0)->get();

    	return view('admin.comment.index', compact('comment'));
    }

    public function checkChild(Request $request)
    {
        try {
        	$id = intval($request->id);
        	$comment = Comment::findOrFail($id);
    		$count = Comment::getReply($id)->count();
    		if ($count > 0) {
    			return response()->json(1); 
    		}

    		return response()->json(0);
        } catch (ModelNotFoundException $e) {
            return response()->json('fail');
        }
    }

    public function delete(Request $request)
    {
        try {
            $listId = $request->allVals;
            foreach ($listId as $key => $value) {
                $comment = Comment::findOrFail($value);
                $comment->replies()->delete();
                $comment->delete();
            }
            
            return response()->json('ok');
        } catch (ModelNotFoundException $e) {
            return response()->json('fail');
        }
    }

    public function deleteReply(Request $request)
    {
        try {
            $listId = $request->allVals;
            foreach ($listId as $key => $value) {
                $comment = Comment::findOrFail($value);
                $comment->delete();
            }
            
            return response()->json('ok');
        } catch (ModelNotFoundException $e) {
            return response()->json('fail');
        }
    }

    public function view(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        return view('admin.comment.reply', compact('comment'));
    }
}
