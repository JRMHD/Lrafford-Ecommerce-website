<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller; // Add this line

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $products = $user->products;

        return view('home', compact('user', 'products'));
    }

    /**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'nullable|file|mimes:mp4|max:20480',
        ]);

        // Handle image and video upload
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('product_images', 'public');
            }
        }

        $videoPath = null;
        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('product_videos', 'public');
        }

        // Create product
        $product = new Product([
            'category' => $request->input('category'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'images' => $images,
            'video' => $videoPath,
        ]);

        // Associate product with the user
        Auth::user()->products()->save($product);

        return redirect()->route('home')->with('success', 'Product created successfully');
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category' => 'required|string',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'nullable|file|mimes:mp4|max:20480',
        ]);

        // Handle image and video upload
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('product_images', 'public');
            }
        }

        $videoPath = null;
        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('product_videos', 'public');
        }

        // Update product
        $product->update([
            'category' => $request->input('category'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'images' => $images,
            'video' => $videoPath,
        ]);

        return redirect()->route('home')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // Delete product and associated images
        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->path);
        }

        if ($product->video) {
            Storage::disk('public')->delete($product->video);
        }

        $product->delete();

        return redirect()->route('home')->with('success', 'Product deleted successfully');
    }
}
