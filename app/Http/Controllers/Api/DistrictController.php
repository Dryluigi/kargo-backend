<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repository\DistrictRepository;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    private DistrictRepository $districtRepository;

    public function __construct(DistrictRepository $districtRepository)
    {
        $this->districtRepository = $districtRepository;
    }

    public function getAll(Request $request)
    {
        return $this->districtRepository->getAllByName($request->query('name') ?? '');
    }
}
