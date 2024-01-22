<?php

namespace App\Http\Controllers;

use App\Models\Responsibilities;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResponsibilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $resp = Responsibilities::all();
        if ($resp->isEmpty()) {
            return response()->json([
                "status" => false,
                "message" => "No responsibilities found",
                "data" => []
            ]);
        } else {
            return response()->json([
                "status" => true,
                "message" => $resp->count() . " responsibilities found",
                "data" => [
                    "responsibility" => $resp
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
        if (!Responsibilities::where('responsibility', '=', $data['responsibility'])->exists()) {

            $resp = new Responsibilities();
            $resp->responsibility = $data['responsibility'];

            if($resp->save()){
                return response()->json([
                    "status" => true,
                    "message" => "Responsibility " . $data['responsibility'] . " added",
                    "data" => [
                        "survey" => $resp
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
                "message" => "The Responsibility already exist",
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
        $resp = Responsibilities::find($id);
        if ($resp) {
            return response()->json([
                "status" => true,
                "message" => "",
                "data" => $resp
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Responsibility with id: " . $id . " not found",
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
            'responsibility' => 'required'
        );

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => "Something went wrong",
                "data" => $validator->errors()
            ]);
        } else {
            $resp = Responsibilities::find($id);
            if ($resp) {
                $resp->responsibility = $request['responsibility'];
                if($resp->save()) {
                    return response()->json([
                        "status" => true,
                        "message" => "Responsibility updated successfully",
                        "data" => $resp
                    ]);
                } else {
                    return response()->json([
                        "status" => false,
                        "message" => "The Responsibility can not be updated",
                        "data" => $resp
                    ]);
                }
            } else {
                return response()->json([
                    "status" => false,
                    "message" => "Responsibility with id: " . $id . " not found",
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
        $resp = Responsibilities::find($id);
        if ($resp) {
            $resp->delete();
            return response()->json([
                "status" => true,
                "message" => "Responsibility deleted successfully",
                "data" => $resp
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Responsibility with id: " . $id . " not found",
                "data" => []
            ]);
        }
    }
}
