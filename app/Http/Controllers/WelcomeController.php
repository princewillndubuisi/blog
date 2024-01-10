<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $feauturedPosts = Cache::remember('feauturedPosts', Carbon::now()->addDay(), function() {
            return Post::published()->featured()->with('categories')->latest('published_at')->take(3)->get();
        });

        $latestPosts = Cache::remember('latestPosts', Carbon::now()->addDay(), function() {
            return Post::published()->with('categories')->latest('published_at')->take(9)->get();
        });

        return view('welcome', ['featuredPosts' => $feauturedPosts, 'latestPosts' => $latestPosts]);
    }
}
