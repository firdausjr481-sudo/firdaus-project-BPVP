<?php

namespace App\Http\Controllers;

use App\Models\zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
   
    public function index()
    {
        $zones = zone::all();
        return view('admin.pages.zones.index', compact('zones'));
    }

    
    public function create()
    {
        return view('admin.pages.zones.create');
    }

  
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price_range' => 'required',
            'image'=> 'nullable|image|max:2048|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('image')){
                $imagePath = $request->file('image')->store('images','public');
                $validated['image'] = basename($imagePath);
            }
            Zone::create($validated);

            return redirect('/admin/zones')->with('success','Zone created successfully.');
    }

   
    public function show(string $id)
    {
        $zone = zone::findOrFail($id);
        return view('admin.pages.zones.show', compact('zone'));
    }

    
    public function edit(string $id)
    {
        $zone = zone::findOrFail($id);
        return view('admin.pages.zones.edit', compact('zone'));
    }

  
    public function update(Request $request, string $id)
    {
        $zone = zone::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price_range' => 'required',
            'image'=> 'nullable|image|max:2048|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('image')){
                $imagePath = $request->file('image')->store('images','public');
                $validated['image'] = basename($imagePath);
            }
            $zone->update($validated);

            return redirect('/admin/zones')->with('success','Zone updated successfully.');
    }

    
    public function destroy(string $id)
    {
        $zone = zone::findOrFail($id);
        $zone->delete();

        return redirect('/admin/zones')->with('success','Zone deleted successfully.');
    }

    public function showZone(string $id)
    {
        $zone = zone::findOrFail($id);
        return view('landing.pages.detail-zone', compact('zone'));
    }

}
