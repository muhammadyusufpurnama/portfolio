<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Storage;

class Project1Controller extends Controller
{
    public function index(Request $request) // Tambahkan Request $request
    {
        // 1. Ambil semua opsi unik untuk filter dropdown
        $brands = Car::distinct()->pluck('brand')->sort();
        $fuel_types = Car::distinct()->pluck('fuel_type')->sort();
        $gearbox_types = Car::distinct()->pluck('gearbox_type')->sort();
        $paint_types = Car::distinct()->pluck('paint_type')->sort();

        // 2. Mulai query builder
        $query = Car::query();

        // 3. Terapkan filter berdasarkan input dari form
        // Filter Pencarian (nama atau merk)
        if ($request->filled('search')) {
            $searchTerm = '%' . $request->search . '%';
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', $searchTerm)
                  ->orWhere('brand', 'like', $searchTerm);
            });
        }

        // Filter Dropdown Merk
        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        // Filter Dropdown Bahan Bakar
        if ($request->filled('fuel_type')) {
            $query->where('fuel_type', $request->fuel_type);
        }

        // Filter Dropdown Gearbox
        if ($request->filled('gearbox_type')) {
            $query->where('gearbox_type', $request->gearbox_type);
        }

        // Filter Dropdown Cat
        if ($request->filled('paint_type')) {
            $query->where('paint_type', $request->paint_type);
        }

        // 4. Eksekusi query
        $cars = $query->get();

        // 5. Kirim data ke view
        return view('portfolio.project1', compact(
            'cars',
            'brands',
            'fuel_types',
            'gearbox_types',
            'paint_types'
        ));
    }

    public function create()
    {
        return view('portfolio.cars.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255', // <-- TAMBAHKAN VALIDASI BRAND
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|string|max:255',
            'fuel_type' => 'required|string|max:255',
            'fuel_image' => 'nullable|string|max:255',
            'gearbox_type' => 'required|string|max:255',
            'gearbox_image' => 'nullable|string|max:255',
            'paint_type' => 'required|string|max:255',
            'paint_image' => 'nullable|string|max:255',
        ]);

        $carData = $validatedData;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('cars', 'public');
            $carData['image'] = 'storage/' . $imagePath;
        } else {
            $carData['image'] = null;
        }

        $carData['fuel_image'] = $request->input('fuel_image');
        $carData['gearbox_image'] = $request->input('gearbox_image');
        $carData['paint_image'] = $request->input('paint_image');

        Car::create($carData);

        return redirect()->route('portfolio.project1')->with('success', 'Mobil berhasil ditambahkan!');
    }
}
