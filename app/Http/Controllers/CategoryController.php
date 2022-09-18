<?php

namespace App\Http\Controllers;

//model category
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Load data category successfully',
            'data' => Category::all()
        ], 200);
    }

    public function store(Request $request)
    {
        $message = 'Category created successfully';
        $status = "success";
        try {
            Category::create([
                'title_categories' => $request->title_categories,
                'content_categories' => $request->content_categories,
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
        $message = "Load data category successfully";
        $status = "success";
        $category = Category::find($id);

        if (!$category) {
            $status = "error";
            $message = "Data category not found";
        }

        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $category
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $message = 'Category updated successfully';
        $status = "success";
        try {
            Category::find($id)->update([
                'title_categories' => $request->title_categories,
                'content_categories' => $request->content_categories,
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
        $message = 'Category deleted successfully';
        $status = "success";
        try {
            Category::find($id)->delete();
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