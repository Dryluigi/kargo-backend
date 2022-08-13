<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateShipmentRequest;
use App\Models\Shipment;

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
}
