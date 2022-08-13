<?php

namespace App\Repository;

use App\Models\District;

class DistrictRepository
{
    public function getAllByName(string $name)
    {
        return District::where('name', 'like', '%' . $name . '%')->get();
    }
}
