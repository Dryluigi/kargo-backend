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
        return [
            [
                'id' => 1,
                'shipment_number' => 'DO-1390123',
                'license' => 'B 12312 UTT',
                'driver' => [
                    'name' => 'Budi'
                ],
                'origin' => [
                    'id' => 1,
                    'name' => 'Jakarta'
                ],
                'destination' => [
                    'id' => 2,
                    'name' => 'Surabaya'
                ],
                'loading_date' => '2022-08-10',
                'status' => 'Created'
            ],
            [
                'id' => 2,
                'shipment_number' => 'DO-1390124',
                'license' => 'L 12322 UTB',
                'driver' => [
                    'name' => 'Harto'
                ],
                'origin' => [
                    'id' => 5,
                    'name' => 'Yogyakarta'
                ],
                'destination' => [
                    'id' => 2,
                    'name' => 'Surabaya'
                ],
                'loading_date' => '2022-04-10',
                'status' => 'At Origin'
            ],
        ];
    }
}
