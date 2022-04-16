<?php

namespace App\Http\Controllers;

use App\Models\Appartenir;
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
        $item->fill($request->validated());
        $item->save();

        // Associate users with the workspace
        $user = auth()->user();
        $item->usersAppartenir()->attach($user);

        return response()->json(compact('item'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $item = WorkSpace::query()->findOrFail($id);
        return response()->json(compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $idWorkspace
     * @param StoreWorkSpaceRequest $request
     * @return JsonResponse
     */
    public function update($idWorkspace, StoreWorkSpaceRequest $request)
    {
        // Update the workspace if the user is the owner
        $idOfUserAuthenticated = Auth::id();
        // if the user is the owner of the workspace and update the workspace
        if(Appartenir::query()->where('workSpaceId', $idWorkspace)->where('userId', $idOfUserAuthenticated)->exists()) {
            $item = WorkSpace::query()->findOrFail($idWorkspace);
            $item->update($request->validated());
        }else{
            var_dump('You are not the owner of this workspace');
            var_dump($idOfUserAuthenticated);
            var_dump($idWorkspace);
            return response()->json(['error' => 'You are not the owner of this workspace'], 403);
        }

        return response()->json(compact('item'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $count = WorkSpace::destroy($id);
        if ($count) {
            return response()->json('OK');
        }
        return response()->json('Resource already deleted!', 410);
    }
}
