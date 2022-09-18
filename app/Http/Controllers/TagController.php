<?php

namespace App\Http\Controllers;

//model tag
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Load data tag successfully',
            'data' => Tag::all()
        ], 200);
    }

    public function store(Request $request)
    {
        $message = 'Tag created successfully';
        $status = "success";
        try {
            Tag::create([
                'name_tags' => $request->name_tags,
            ]);
        } catch (\Throwable $th) {
            $status = "error";
            $message = $th->getMessage();
        }

        return response([
            'status' => $status,
            'message' => $message,
        ], 200);
    }

    public function show($id)
    {
        $message = "Load data tag successfully";
        $status = "success";
        $tag = Tag::find($id);

        if (!$tag) {
            $status = "error";
            $message = "Data tag not found";
        }

        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $tag
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $message = 'Tag updated successfully';
        $status = "success";
        try {
            Tag::find($id)->update([
                'name_tags' => $request->name_tags,
            ]);
        } catch (\Throwable $th) {
            $status = "error";
            $message = $th->getMessage();
        }

        return response()->json([
            'status' => $status,
            'message' => $message,
        ], 200);
    }

    public function destroy($id)
    {
        $message = 'Tag deleted successfully';
        $status = "success";
        try {
            Tag::find($id)->delete();
        } catch (\Throwable $th) {
            $status = "error";
            $message = $th->getMessage();
        }

        return response()->json([
            'status' => $status,
            'message' => $message,
        ], 200);
    }
}
