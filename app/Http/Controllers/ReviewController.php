<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
        public function index()
        {
            $reviews = Review::with(['user', 'attraction'])->latest()->get();

            return view('admin.pages.reviews.index', compact('reviews'));
        }      
}  