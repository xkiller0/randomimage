<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager as Image; // Use ImageManagerStatic


class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function showImage($randomCharacters)
    {
        // Path to the trump.png file in storage/app/public/
        $filePath = 'public/trump-w-gold.png';

        // Check if the file exists in storage
        if (!Storage::exists($filePath)) {
            return response()->json(['error' => 'Image not found'], 404);
        }

        // Create a Faker instance
        $faker = Faker::create();

        // Generate random metadata
        $randomTitle = $faker->sentence;
        $randomDescription = $faker->paragraph;
        $randomKeywords = $faker->words(5, true); // 5 random keywords

        // Get the image's content
        $file = Storage::get($filePath);

        // Get the file's mime type
        $mimeType = Storage::mimeType($filePath);

        // Return the image with custom headers for metadata
        return response($file, 200)
            ->header('Content-Type', $mimeType)
            ->header('X-Image-Title', $randomTitle)
            ->header('X-Image-Description', $randomDescription)
            ->header('X-Image-Keywords', $randomKeywords);
    }


    public function showImage_nometadata($randomCharacters)
    {
        // Path to the trump.png file in storage/app/public/
        $filePath = 'public/trump-w-gold.png';

        // Check if the file exists in storage
        if (!Storage::exists($filePath)) {
            return response()->json(['error' => 'Image not found'], 404);
        }

        // Create a Faker instance
        $faker = Faker::create();

        // Generate random metadata
        $randomTitle = $faker->sentence;
        $randomDescription = $faker->paragraph;
        $randomKeywords = $faker->words(5, true); // 5 random keywords

        // Get the image's content
        $file = Storage::get($filePath);


        // Optionally add metadata (this is illustrative; not all formats support custom metadata)
        $randomCookie1 = $faker->word;
        $randomCookie2 = Str::random(10); // Random 10-character string

        // Encode the image to Base64
        $mimeType = Storage::mimeType($filePath);

        // Create the response
        $response = response($file, 200)
            ->header('Content-Type', $mimeType)
            ->header('X-Image-Title', $randomTitle)
            ->header('X-Image-Description', $randomDescription)
            ->header('X-Image-Keywords', $randomKeywords);

        // Set cookies with random values
        $response->cookie('__cf_bm_'. Str::random(3), $randomCookie1, 60); // Cookie expires in 60 minutes
        $response->cookie('_umsid_' . Str::random(4), $randomCookie2, 60); // Cookie expires in 60 minutes

        return $response;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(image $image)
    {
        //
    }
}
