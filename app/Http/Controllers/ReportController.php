<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use App\Models\Products;
use App\Models\Supplies;
use App\Models\Tools;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Get all stocks from products.
     *
     * @return JsonResponse
     */
    public function stock_levels(): JsonResponse
    {
        $result = Products::all();

        if ($result->isEmpty()) {
            return response()->json([
                "status" => false,
                "message" => "No products found",
                "data" => []
            ]);
        } else {
            return response()->json([
                "status" => true,
                "message" => $result->count() . " products found",
                "data" => [
                    "products" => $result
                ]
            ]);
        }
    }

    /**
     * Get all tools that need replenishment.
     *
     * @return JsonResponse
     */
    public function restock(): JsonResponse
    {
        $result = Tools::query()->whereRaw('stock < stock_min')->get();

        if ($result->isEmpty()) {
            return response()->json([
                "status" => false,
                "message" => "No products need replenishment",
                "data" => []
            ]);
        } else {
            return response()->json([
                "status" => true,
                "message" => $result->count() . " products found",
                "data" => [
                    "products" => $result
                ]
            ]);
        }
    }

    /**
     *  Which Personnel are in charge of which products?.
     *
     * @return JsonResponse
     */
    public function in_charge(): JsonResponse
    {
        $result = Personnel::with('products')->get();

        if ($result->isEmpty()) {
            return response()->json([
                "status" => false,
                "message" => "No records found",
                "data" => []
            ]);
        } else {
            return response()->json([
                "status" => true,
                "message" => $result->count() . " personnel found",
                "data" => [
                    "products" => $result
                ]
            ]);
        }
    }
}
