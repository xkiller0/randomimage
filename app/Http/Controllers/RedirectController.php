<?php

namespace App\Http\Controllers;

use App\Models\redirect;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class RedirectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function redirectUrl($randomCharacters) {

        // Define the target URL as a variable
        $targetUrl = 'https://www.google.com';

        // Create a Faker instance
        $faker = Faker::create();

        // Generate a large block of Lorem Ipsum text
        $loremIpsum = $faker->paragraphs(30, true); // 50 paragraphs
        $loremIpsum_small = $faker->name('male');

        // HTML content with hidden Lorem Ipsum in the body, and also in the title
        $htmlContent = <<<HTML
<html>
<head>
    <meta http-equiv="refresh" content="0;url=$targetUrl">
    <title>$loremIpsum_small - $randomCharacters</title>
    <style>
        .hidden-text {
            visibility: hidden;
            height: 0;
            width: 0;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="hidden-text">$loremIpsum</div>
</body>
</html>
HTML;

        return response($htmlContent, 200)
            ->header('Content-Type', 'text/html');
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
    public function show(redirect $redirect)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(redirect $redirect)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, redirect $redirect)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(redirect $redirect)
    {
        //
    }
}
