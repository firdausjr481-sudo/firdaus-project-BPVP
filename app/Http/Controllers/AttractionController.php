<?php

namespace App\Http\Controllers;
use App\Models\Attraction;
use App\Models\Zone;
use Illuminate\Http\Request;

class AttractionController extends Controller
{
        public function index(Request $request)
        {
           $attractions = Attraction::all();
           return view('admin.pages.attractions.index', compact('attractions'));
        }

        public function create()
        {
            $zones=Zone::all();
            return view('admin.pages.attractions.create',compact('zones'));
        }

        public function store(Request $request)
        {
           
            $validated = $request->validate([
                'name' => 'required',
                'description' => 'nullable',
                'zone_id' => 'required|exists:zones,id',
                'price_range' => 'required',
                'image' => 'nullable|image|max:2048|mimes:jpg,jpeg,png',
            ]);
            

                if ($request->hasFile('image')) {
                    $imagePath = $request->file('image')->store('images', 'public');
                    $validated['image'] = basename($imagePath);
                }

            Attraction::create($validated);

            return redirect('/admin/attractions')->with('success', 'Attraction created successfully.');
        }

        public function edit(string $id)
        {
            $attraction = Attraction::find($id);
            return view('admin.pages.attractions.edit', compact('attraction'));
        }

        public function update(Request $request, string $id)
        {
            $validated = $request->validate([
                'name' => 'required',
                'description' => 'nullable',
                'price_range' => 'required',
                'image' => 'nullable|image|max:2048|mimes:jpg,jpeg,png',
            ]);

            $attraction = Attraction::find($id);
            $attraction->update($validated);

            return redirect('/admin/attractions')->with('success', 'Attraction updated successfully.');
        }

        public function destroy(string $id)
        {
            $attraction = Attraction::find($id);
            $attraction->delete();

            return redirect('/admin/attractions')->with('success', 'Attraction deleted successfully.');
        }

        public function show(string $id)
        {
            $attraction = Attraction::find($id);
            return view('admin.pages.attractions.show', compact('attraction'));
        }

        public function showAttraction(Attraction $attraction)
        {
            return view('landing.pages.detail-attraction', compact('attraction'));
        }
}