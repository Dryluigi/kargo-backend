<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Driver;
use Validator;

class DriverController extends Controller
{
    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone_number' => 'required|unique:drivers,phone_number',
            'id_card_file_name' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'driver_license_file_name' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        if (strlen($request->name) == 0) {
            return response()->json(["message': 'field 'name' cant empty."], 400);
        }

        if (strlen($request->phone_number) == 0) {
            return response()->json(["message': 'field 'phone_number' cant empty."], 400);
        }

        // TODO: Simpan file yang dikirim ke storage
        try {
            $driver = Driver::create([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'id_card_file_name' => $request->id_card_file_name,
                'driver_license_file_name' => $request->driver_license_file_name,
                'is_active' => true,
            ]);

            return response()->json([
                'message' => 'Succes to create driver',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Somethings wrong.',
            ], 500);
        }

        return response()->json([
            'message' => 'Somethings wrong.'
        ], 500);
    }

    public function updateStatus(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:drivers,id',
            'is_active' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $idInt = intval($id);
        if ($idInt != $request->id) {
            return response()->json(['message' => 'Request invalid.'], 400);
        }

        try {
            Driver::where('id', $idInt)
                ->update(['is_active' => $request->is_active]);
            return response()->json([
                'message' => 'Succes to update status driver',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Somethings wrong.',
            ], 500);
        }

        return response()->json([
            'message' => 'Somethings wrong.',
        ], 500);
    }
}
