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
       
    }

    /**
     * Display the specified quote.
     */
    public function show(Quote $quote)
    {
        
    }

    /**
     * Update the specified quote.
     */
    public function update(Request $request, Quote $quote)
    {
 
    }

    /**
     * Remove the specified quote.
     */
    public function destroy(Quote $quote)
    {
   
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