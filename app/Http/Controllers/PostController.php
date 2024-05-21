<?php

namespace App\Http\Controllers;

use App\Models\PostModel;
use Validator;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = PostModel::all();
        return response()->json(["success" => true, "data" => $posts]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'body' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()]);
        }
        $data = ['title' => $request->title, 'body' => $request->body];
        $res = PostModel::create($data);
        if ($res) {
            return response()->json(["success" => true, "msg" => "Post Created"]);
        }

        return response()->json(["success" => false, "msg" => "error"]);
    }
}
