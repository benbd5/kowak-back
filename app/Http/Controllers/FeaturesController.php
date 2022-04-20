<?php

namespace App\Http\Controllers;

use App\Models\Features;
use App\Http\Requests\StoreFeaturesRequest;
use Illuminate\Http\JsonResponse;

class FeaturesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $page = Features::query()->paginate();
        return response()->json(compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFeaturesRequest $request
     * @return JsonResponse
     */
    public function store(StoreFeaturesRequest $request)
    {
        $item = new Features;

        // Attach attributes to the workspace

        $item->fill($request->validated());
        $item->save();
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
        $item = Features::query()->findOrFail($id);
        return response()->json(compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @param StoreFeaturesRequest $request
     * @return JsonResponse
     */
    public function update($id, StoreFeaturesRequest $request)
    {
        $item = Features::query()->findOrFail($id);
        $item->update($request->validated());
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
        $count = Features::destroy($id);
        if ($count) {
            return response()->json('OK');
        }
        return response()->json('Resource already deleted!', 410);
    }
}
