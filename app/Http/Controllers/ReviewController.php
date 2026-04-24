<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        
        return view('admin.pages.reviews.index', compact('reviews'));
    }

    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'reviewer' => 'required|string|max:255',
            'description' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'reviewable_id' => 'required|integer',
            'reviewable_type' => 'required|string',
        ]);
        

        Review::create($validated);

        return redirect()->back()->with('success', 'Review submitted successfully and is pending approval.');
    }

    public function toggleApproval(Review $review)
    {
        $review->is_approved = !$review->is_approved;
        $review->save();

        return redirect()->back()->with('success', 'Review approval status updated successfully.');
    }
}