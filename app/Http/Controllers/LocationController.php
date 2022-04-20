<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Http\Requests\StoreLocationRequest;
use App\Models\WorkSpace;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{

    /**
     * Display a listing of rent of the user.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $idOfUserAuthenticated = Auth::id();
        if(Location::query()->where('userId', $idOfUserAuthenticated)->exists()) {
            $locations = Location::query()->where('userId', $idOfUserAuthenticated)->get();
            return response()->json($locations);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLocationRequest $request
     * @return JsonResponse
     */
    public function store(StoreLocationRequest $request)
    {
        $item = new Location;

        // Current user may rent a workspace
        $idOfUserAuthenticated = Auth::id();

        // Fill the model with the request data and id of the user authenticated
        $item->fill($request->validated())->fill([
            'userId' => $idOfUserAuthenticated
        ]);
        $item->save();
        return response()->json(compact('item'));
    }

    /**
     * Display a specific location of the authenticated user
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id)
    {
        $idOfUserAuthenticated = Auth::id();
        if(Location::query()->where('locationId', $id)->where('userId', $idOfUserAuthenticated)->exists()) {
            // Get the location of the authenticated user
            $item = Location::query()->where('locationId', $id)->where('userId', $idOfUserAuthenticated)->first();
            return response()->json(compact('item'));
        }else{
            return response()->json(['error' => 'It\'s not your rent'], 403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @param StoreLocationRequest $request
     * @return JsonResponse
     */
    public function update(int $id, StoreLocationRequest $request)
    {
        $idOfUserAuthenticated = Auth::id();
        // Update the workspace if the user is the owner
        // Update the location with the request data and id of the user authenticated
        if(Location::query()->where('locationId', $id)->where('userId', $idOfUserAuthenticated)->exists()) {
            $item = Location::query()->where('locationId', $id)->where('userId', $idOfUserAuthenticated)->first();
            var_dump($request->all());

            // @todo: update do not work
            $item->fill($request->validated())->fill([
                'userId' => $idOfUserAuthenticated
            ]);

            $item->update($request->all());
//            $item->fill($request->validated())->fill([
//                'userId' => $idOfUserAuthenticated,
//                'locationId' => $id,
//                'workSpaceId' => 2
//            ]);
//            $item->save();
            return response()->json(compact('item'));
        }
        else{
            return response()->json(['error' => 'You are not the owner of this rent'], 403);
        }

//        if(Location::query()->where('workSpaceId', $id)->where('userId', $idOfUserAuthenticated)->exists()) {
//            $item = Location::query()->findOrFail($id);
//            $item->update($request->validated());
//        }
//        return response()->json(compact('item'));

//        $item = Location::query()->findOrFail($id);
//        $item->update($request->validated());
//        return response()->json(compact('item'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        $count = Location::destroy($id);
        if ($count) {
            return response()->json('OK');
        }
        return response()->json('Resource already deleted!', 410);
    }
}
