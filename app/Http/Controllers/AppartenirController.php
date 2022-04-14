<?php

namespace App\Http\Controllers;

use App\Models\Appartenir;
use App\Http\Requests\StoreAppartenirRequest;

class AppartenirController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $page = Appartenir::query()->paginate();
        return response()->json(compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAppartenirRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreAppartenirRequest $request)
    {
        $item = new Appartenir;
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
        $item = Appartenir::query()->findOrFail($id);
        return response()->json(compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @param StoreAppartenirRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, StoreAppartenirRequest $request)
    {
        $item = Appartenir::query()->findOrFail($id);
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
        $count = Appartenir::destroy($id);
        if ($count) {
            return response()->json('OK');
        }
        return response()->json('Resource already deleted!', 410);
    }
}
