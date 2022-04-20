<?php

namespace App\Http\Controllers;

use App\Models\Appartenir;
use App\Models\Features;
use App\Models\Users;
use App\Models\WorkSpace;
use App\Http\Requests\StoreWorkSpaceRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkSpaceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $page = WorkSpace::query()->paginate();
        return response()->json(compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreWorkSpaceRequest $request
     * @return JsonResponse
     */
    public function store(StoreWorkSpaceRequest $request)
    {
        $item = new WorkSpace;
        $features = new Features();
        $item->fill($request->validated());
//        $features->fill($request->validated());
//        var_dump($item);
//        var_dump($features);
//        $item->features()->save();
        $item->save();
        // Associate users with the workspace
        $user = auth()->user();
        $item->usersAppartenir()->attach($user);

        // Save workspace with features

        return response()->json(compact('item'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $idWorkspace
     * @return JsonResponse
     */
    public function show(int $idWorkspace)
    {
        // Get the user associated with the id of the Workspace in the table appartenir
        $item= WorkSpace::with('usersAppartenir')->with('features')->findOrFail($idWorkspace);

        return response()->json(compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $idWorkspace
     * @param StoreWorkSpaceRequest $request
     * @return JsonResponse
     */
    public function update(int $idWorkspace, StoreWorkSpaceRequest $request)
    {
        // Update the workspace if the user is the owner
        $idOfUserAuthenticated = Auth::id();
        // if the user is the owner of the workspace and update the workspace
        if(Appartenir::query()->where('workSpaceId', $idWorkspace)->where('userId', $idOfUserAuthenticated)->exists()) {
            $item = WorkSpace::query()->findOrFail($idWorkspace);
            $item->update($request->validated());
        }else{
            return response()->json(['error' => 'You are not the owner of this workspace'], 403);
        }

        return response()->json(compact('item'));
    }

    /**
     * Delete the workspace if the user is the owner of the workspace
     * and delete the relation in the table appartenir
     *
     * @param int $idWorkspace
     * @return JsonResponse
     */
    public function destroy(int $idWorkspace)
    {
        $idOfUserAuthenticated = Auth::id();

        // delete the workspace if the user is the owner
        if(Appartenir::query()->where('workSpaceId', $idWorkspace)->where('userId', $idOfUserAuthenticated)->exists()) {
            // delete the relation between the workspace and the user
            $count = Appartenir::query()->where('workSpaceId', $idWorkspace)->delete();

            if ($count) {
                // delete the workspace and detach the users associated with the pivot table appartenir
                WorkSpace::query()->findOrFail($idWorkspace)->delete();
                return response()->json('OK');
            }
        } else {
            return response()->json(['error' => 'You are not the owner of this workspace'], 403);
        }
        return response()->json('Resource already deleted!', 410);
    }
}
