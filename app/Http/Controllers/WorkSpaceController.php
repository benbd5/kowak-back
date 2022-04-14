<?php

namespace App\Http\Controllers;

use App\Models\WorkSpace;
use App\Http\Requests\StoreWorkSpaceRequest;

class WorkSpaceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreWorkSpaceRequest $request)
    {
        $item = new WorkSpace;
        $item->fill($request->validated());
        $item->save();
        return response()->json(compact('item'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $item = WorkSpace::query()->findOrFail($id);
        return response()->json(compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @param StoreWorkSpaceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, StoreWorkSpaceRequest $request)
    {
        $item = WorkSpace::query()->findOrFail($id);
        $item->update($request->validated());
        return response()->json(compact('item'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
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