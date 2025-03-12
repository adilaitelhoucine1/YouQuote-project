<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuoteController extends Controller
{
    /**
     * Display a listing of the quotes.
     */
    public function index(Request $request)
    {
        $quotes=Quote::all();
        return response()->json([$quotes],200);
    }

    /**
     * Store a newly created quote.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
            'source' => 'nullable|string|max:255',
        ]);
        
        $quote = Quote::create($validated);
        
        return response()->json([
            "message" => "quote est bien cree . $quote->content"
        ], 201);
    }

    /**
     * Display the specified quote.
     */
    public function show(Quote $quote)
    {
        return response()->json($quote, 200);
    }

    /**
     * Update the specified quote.
     */
    public function update(Request $request, Quote $quote)
    {
        $validated = $request->validate([
            'content' => 'sometimes|required|string',
            'author' => 'nullable|string|max:255',
            'source' => 'nullable|string|max:255',
        ]);
        
        $quote->update($validated);
        
        return response()->json([
            "message" => "Quote updated successfully",
            "quote" => $quote
        ], 200);
    }

    /**
     * Remove the specified quote.
     */
    public function destroy(Quote $quote)
    {
        $quote->delete();
        
        return response()->json([
            "message" => "Quote deleted successfully"
        ], 200);
    }

    /**
     * Get random quotes.
     */
    public function random(Request $request)
    {
      
    }

    /**
     * Get most popular quotes.
     */
    public function popular(Request $request)
    {
    }
}