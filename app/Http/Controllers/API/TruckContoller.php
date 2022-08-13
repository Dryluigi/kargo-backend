<?php

namespace App\Http\Controllers\API;

use App\Models\Truck;
use Illuminate\Http\Request;
use App\Helpers\DataFormater;
use App\Http\Controllers\Controller;
use Dflydev\DotAccessData\Data;
use Exception;

class TruckContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DataFormater::responseApi(200,"success",Truck::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $this->validate($request,[
                "license_number" => ['required'],
                "license_type" => ['required'],
                "truck_type" => ['required'],
                "production_year" => ['required']
            ]);

            $truck = Truck::create([
                "license_number" => $request->license_number,
                "license_type" => $request->license_type,
                "truck_type" => $request->truck_type,
                "production_year" => $request->production_year
            ]);

            return  DataFormater::responseApi(200,'Success Stored Data',$truck);
        }catch(Exception $error){
            return DataFormater::responseApi(400,$error->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Truck $truck)
    {
        try{
            return DataFormater::responseApi(200,"success",$truck);
        }catch(Exception $error){
            return DataFormater::responseApi(400,$error->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        try{
            $truck = Truck::findOrFail($id);

            $this->validate($request,[
                "license_number" => ['required'],
                "license_type" => ['required'],
                "truck_type" => ['required'],
                "production_year" => ['required'],
                
            ]);

            $truck->update([
                "license_number" => $request->license_number,
                "license_type" => $request->license_type,
                "truck_type" => $request->truck_type,
                "production_year" => $request->production_year,
                // "is_active" => $request->is_active
            ]);

            return  DataFormater::responseApi(200,'Success Updated Data',$truck);
        }catch(Exception $error){
            return DataFormater::responseApi(400,$error->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
