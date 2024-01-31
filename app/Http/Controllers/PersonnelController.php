<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $personnel = Cache::remember('personnel_all', 120, function () {
            return Personnel::all();
        });

        if ($personnel->isEmpty()) {
            return response()->json([
                "status" => false,
                "message" => "No personnel found",
                "data" => []
            ]);
        } else {
            return response()->json([
                "status" => true,
                "message" => $personnel->count() . " personnel found",
                "data" => [
                    "personnel" => $personnel
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
        if (!Personnel::where('name', '=', $data['name'])->exists()) {

            $personnel = new Personnel();
            $personnel->name = $data['name'];
            $personnel->responsibility_id = $data['responsibility_id'];
            if($personnel->save()){
                return response()->json([
                    "status" => true,
                    "message" => "Personnel " . $data['name'] . " added",
                    "data" => [
                        "survey" => $personnel
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
                "message" => "The Personnel already exist",
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
        $personnel = Personnel::find($id);
        if ($personnel) {
            return response()->json([
                "status" => true,
                "message" => "",
                "data" => $personnel
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Personnel with id: " . $id . " not found",
                "data" => []
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $data = $request->all();
        $rules = array(
            'name' => 'required',
            'responsibility_id' => 'required|numeric'
        );

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => "Something went wrong",
                "data" => $validator->errors()
            ]);
        } else {
            $personnel = Personnel::find($id);
            if ($personnel) {
                $personnel->name = $request['name'];
                $personnel->responsibility_id = $request['responsibility_id'];
                if($personnel->save()) {
                    return response()->json([
                        "status" => true,
                        "message" => "Personnel updated successfully",
                        "data" => $personnel
                    ]);
                } else {
                    return response()->json([
                        "status" => true,
                        "message" => "Personnel updated successfully",
                        "data" => $personnel
                    ]);
                }
            } else {
                return response()->json([
                    "status" => false,
                    "message" => "Personnel with id: " . $id . " not found",
                    "data" => []
                ]);
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $personnel = Personnel::find($id);
        if ($personnel) {
            $personnel->delete();
            return response()->json([
                "status" => true,
                "message" => "Personnel deleted successfully",
                "data" => $personnel
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Personnel with id: " . $id . " not found",
                "data" => []
            ]);
        }

    }
}
