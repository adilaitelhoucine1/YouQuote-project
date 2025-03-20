<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class QuoteController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        $quotes = Quote::all();
        return response()->json([$quotes], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
            'source' => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'tags_id' => 'nullable|array',
            'tags_id.*' => 'exists:tags,id',
        ]);

        $quote = Quote::create([
            'content' => $validated['content'],
            'author' => $validated['author'],
            'source' => $validated['source'],
            'category_id' => $validated['category_id'],
            'user_id' => Auth::id(),
        ]);

        if (!empty($validated['tags_id'])) {
            $quote->tags()->sync($validated['tags_id']);
        }

        return response()->json([
            "message" => "Quote created successfully",
            "quote" => $quote
        ], 201);
    }

    public function show(Quote $quote)
    {
        $quote->increment('view_count');
        $quote->save();
        return response()->json($quote, 200);
    }

    public function update(Request $request, Quote $quote)
    {
        if ($request->has('tags')) {
           return response()->json([
            "message" => "ttttttttttttttttags",
            "quote" => $quote
        ], 200);
    }
        $this->authorize('update', $quote);

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

    public function destroy(Quote $quote)
    {
        $this->authorize('delete', $quote);

        $quote->delete();

        return response()->json([
            "message" => "Quote deleted successfully"
        ], 200);
    }

    public function random(Request $request, $count)
    {
        $quotes = Quote::inRandomOrder()->limit($count)->get();
        // foreach($quotes as $quote){
        //     $quote->view_count++;
        //     $quote->save();
        // }
        return response()->json($quotes, 200);
    }

    public function GetQuoteWithLength(Request $request, $length)
    {
        $quotes = Quote::all();
        foreach ($quotes as $quote) {
            if (str_word_count($quote->content) == $length) {
                $matchedQuotes[] = $quote;
            }
        }
        if (empty($matchedQuotes)) {
            return response()->json([
                "message" => "There is no Quote with This Length"
            ], 200);
        }

        return response()->json([$matchedQuotes], 200);
    }

    public function GetPopularQuote()
    {
        $quote = Quote::orderBy('view_count', 'desc')->first();

        if (!$quote) {
            return response()->json([
                "message" => "No quotes found"
            ], 404);
        }

        return response()->json([
            "quote_most_popular" => $quote
        ], 200);
    }

    public function Approved($quote){
        $quote = Quote::findOrFail($quote);
        $quote->status = 'approved';
        $quote->save();

        return response()->json([
            "message" => "Quote approved successfully",
            "quote" => $quote
        ], 200);
    }
    public function Rejected($quote){
        $quote = Quote::findOrFail($quote);
        $quote->status = 'rejected';
        $quote->save();

        return response()->json([
            "message" => "Quote Rejected",
            "quote" => $quote
        ], 200);
    }
  

    public function checkIfLiked($quoteId, $userId)
    {
        $quote = Quote::findOrFail($quoteId);
        
        $isLiked = $quote->likedByUsers()->where('user_id', $userId)->exists();
        
        return $isLiked;
    }

    public function Like($quoteId)
    {
        $quote = Quote::find($quoteId);

        if (!$quote) {
            return response()->json(["message" => "Quote not found"], 404);
        }

        $user = Auth::user();

   
        $isLiked = $this->checkIfLiked($quoteId, $user->id);

        if (!$isLiked) {
            $quote->likedByUsers()->attach($user->id);
            $quote->likes_count++;
            $quote->save();

            return response()->json([
                "message" => "Quote liked successfully",
                "liked" => true,
                "quote" => $quote
            ], 200);
        }

        $quote->likedByUsers()->detach($user->id);
        $quote->likes_count--;
        $quote->save();

        return response()->json([
            "message" => "Like removed from quote",
            "liked" => false,
            "quote" => $quote
        ], 200);
    }
}