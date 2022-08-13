<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Driver;
use Illuminate\Support\Facades\Storage;
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

        $upload_folder = 'drivers';
        $image_id_card_file_name = $request->file('id_card_file_name');
        $image_driver_license_file_name = $request->file('driver_license_file_name');

        $image_uploaded_path_id_card_file_name = $image_id_card_file_name->store($upload_folder, 'public');
        $image_uploaded_path_driver_license_file_name = $image_driver_license_file_name->store($upload_folder, 'public');

        try {
            $driver = Driver::create([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'id_card_file_name' => $image_uploaded_path_id_card_file_name,
                'driver_license_file_name' => $image_uploaded_path_driver_license_file_name,
                'is_active' => true,
            ]);

            return response()->json([
                'message' => 'Succes to create driver',
                'data' => $driver,
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
            $driver = Driver::find($idInt);

            return response()->json([
                'message' => 'Succes to update status driver',
                'data' => $driver,
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

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:drivers,id',
            'name' => 'required',
        ]);

        $upload_folder = 'drivers';

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $idInt = intval($id);
        if ($idInt != $request->id) {
            return response()->json(['message' => 'Request invalid.'], 400);
        }

        $new_image_uploaded_path_id_card_file_name = "";
        if ($request->hasFile('id_card_file_name')) {
            $image_id_card_file_name = $request->file('id_card_file_name');
            $new_image_uploaded_path_id_card_file_name = $image_id_card_file_name->store($upload_folder, 'public');
            Storage::delete($upload_folder.$request->file('id_card_file_name'));
        } else {
            Storage::delete($upload_folder.$request->file('id_card_file_name'));
        }

        $new_image_uploaded_path_driver_license_file_name = "";
        if ($request->hasFile('driver_license_file_name')) {
            $image_driver_license_file_name = $request->file('driver_license_file_name');
            $new_image_uploaded_path_driver_license_file_name = $image_driver_license_file_name->store($upload_folder, 'public');
            Storage::delete($upload_folder.$request->file('driver_license_file_name'));
        } else {
            Storage::delete($upload_folder.$request->file('driver_license_file_name'));
        }

        try {
            $driver = Driver::find($idInt);
            $driver = $driver->update([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'id_card_file_name' => $new_image_uploaded_path_id_card_file_name,
                'driver_license_file_name' => $new_image_uploaded_path_driver_license_file_name,
            ]);

            return response()->json([
                'message' => 'Succes to update driver',
                'data' => $driver,
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

    public function find($id) {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|exists:drivers,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        try {
            $idInt = intval($id);
            $driver = Driver::find($idInt);

            return response()->json($driver, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Somethings wrong.'
            ], 500);
        }

        return response()->json([
            'message' => 'Somethings wrong.'
        ], 500);
    }

    public function getDrivers(Request $request) {
        $name = $request->query('name');

        $drivers = [];
        if (strlen($name) != 0) {
            $drivers = Driver::where('name', 'like', '%'.$name.'%')->get();
        } else {
            $drivers = Driver::all();
        }

        if (count($drivers) == 0) {
            return response()->json(['message' => 'Data is empty.'], 404);
        }

        return response()->json(['data' => $drivers], 200);
    }
}
