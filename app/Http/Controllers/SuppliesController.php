<?php

namespace App\Http\Controllers;

use App\Models\Supplies;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SuppliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $supp = Supplies::all();
        if ($supp->isEmpty()) {
            return response()->json([
                "status" => false,
                "message" => "No supplies found",
                "data" => []
            ]);
        } else {
            return response()->json([
                "status" => true,
                "message" => $supp->count() . " supply found",
                "data" => [
                    "responsibility" => $supp
                ]
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->all();
        if (!Supplies::where('description', '=', $data['description'])->exists()) {

            $supp = new Supplies();
            $supp->description = $data['description'];
            $supp->stock = $data['stock'];
            $supp->stock_min = $data['stock_min'];
            $supp->stock_max = $data['stock_max'];

            if($supp->save()){
                return response()->json([
                    "status" => true,
                    "message" => "Supply " . $data['description'] . " added",
                    "data" => [
                        "survey" => $supp
                    ]
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    "message" => "An unexpected error has occurred",
                    "data" => []
                ]);
            }
        } else {
            return response()->json([
                "status" => false,
                "message" => "The Supply already exist",
                "data" => []
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $supp = Supplies::find($id);
        if ($supp) {
            return response()->json([
                "status" => true,
                "message" => "",
                "data" => $supp
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Supply with id: " . $id . " not found",
                "data" => []
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        $data = $request->all();
        $rules = array(
            'description' => 'required',
            'stock' => 'required|numeric',
            'stock_min' => 'required|numeric',
            'stock_max' => 'required|numeric',
        );

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => "Something went wrong",
                "data" => $validator->errors()
            ]);
        } else {
            $supp = Supplies::find($id);
            if ($supp) {
                $supp->description = $request['description'];
                $supp->stock = $data['stock'];
                $supp->stock_min = $data['stock_min'];
                $supp->stock_max = $data['stock_max'];
                if($supp->save()) {
                    return response()->json([
                        "status" => true,
                        "message" => "Supply updated successfully",
                        "data" => $supp
                    ]);
                } else {
                    return response()->json([
                        "status" => false,
                        "message" => "The Supply can't be added",
                        "data" => []
                    ]);
                }
            } else {
                return response()->json([
                    "status" => false,
                    "message" => "Supply with id: " . $id . " not found",
                    "data" => []
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $supp = Supplies::find($id);
        if ($supp) {
            $supp->delete();
            return response()->json([
                "status" => true,
                "message" => "Supply deleted successfully",
                "data" => $supp
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Supply with id: " . $id . " not found",
                "data" => []
            ]);
        }
    }
}
