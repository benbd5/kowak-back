<?php

namespace App\Http\Controllers;

use App\Models\WorkSpace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    // User can add a workSpace to their favorites
    public function like($slug)
    {
        $currentUser = Auth::user();
        $workSpace = WorkSpace::query()->find($slug);
        $currentUser->toggleFavorite($workSpace);

        // Check if the user has already liked the workSpace
        if (!$currentUser->hasFavorited($workSpace)) {
            return response()->json([
                'message' => 'WorkSpace was removed to your favorites !',
            ]);
        } else {
            return response()->json([
                'message' => 'WorkSpace was added to your favorites !',
            ]);
        }
    }

    // Get all the workSpaces that the user has added to their favorites
    public static function getFavorites()
    {
        $user = Auth::user();
        $favorites = $user->getFavoriteItems(WorkSpace::class)->get();
        $countFavorites = $user->favorites()->count();

        return response()->json([
            'message' => 'Favorites retrieved',
            'favorites' => $favorites,
            '$countFavorites' => $countFavorites,
        ]);
    }
}
