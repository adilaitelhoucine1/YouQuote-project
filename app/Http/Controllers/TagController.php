<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return response()->json($tags, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $tag = Tag::create($validated);

        return response()->json([
            "message" => "Tag created successfully",
            "tag" => $tag
        ], 201);
    }

    public function show(Tag $tag)
    {
        return response()->json($tag, 200);
    }

    public function update(Request $request, Tag $tag)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $tag->update($validated);

        return response()->json([
            "message" => "Tag updated successfully",
            "tag" => $tag
        ], 200);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return response()->json([
            "message" => "Tag deleted successfully"
        ], 200);
    }
}
