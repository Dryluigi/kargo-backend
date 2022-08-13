<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateShipmentRequest;
use App\Models\Shipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    // TODO : Complete create after trucks and drivers complete
    public function create(CreateShipmentRequest $request)
    {
        $shipment = new Shipment($request->only(['origin_id', 'destination_id', 'loading_date']));
        $shipment->shipment_number = 'DO-' . time();
        $shipment->status = 'Created';
        $shipment->save();

        return [
            'message' => 'Shipment created successfully'
        ];
    }

    public function getAll()
    {
        return Shipment::with(['origin', 'destination', 'driver', 'truck'])->get();
    }

    public function allocate(Request $request, Shipment $shipment)
    {
        $shipment->update($request->only(['truck_id', 'driver_id']));

        return [
            'message' => 'Shipment allocated successfully',
        ];
    }

    public function updateStatus(Request $request, Shipment $shipment)
    {
        $shipment->update($request->only(['status']));

        return [
            'message' => 'Shipment status updated successfully',
        ];
    }
}