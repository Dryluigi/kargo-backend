<?php

namespace App\Http\Controllers\Api;

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
                "license_number" => 'required',
                "license_type" => 'required',
                "truck_type" => 'required',
                "production_year" => 'required',
                "stnk_file" => "nullable|image",
                "kir_file" => "nullable|image"
            ]);

            $truck = Truck::create([
                "license_number" => $request->license_number,
                "license_type" => $request->license_type,
                "truck_type" => $request->truck_type,
                "production_year" => $request->production_year
            ]);

            if(!empty($truck) && $request->stnk_file){
                $stnk_file_name = time().'.'.$request->stnk_file->extension();
                $request->stnk_file->move(public_path('images'),$stnk_file_name);
                $path = "public/images/$stnk_file_name";
                $truck->update([
                    "stnk_file_name"=>$path
                ]);
            }

            if(!empty($truck) && $request->kir_file){
                $kir_file_name = time().'.'.$request->kir_file->extension();
                $request->kir_file->move(public_path('images'),$kir_file_name);
                $path = "public/images/$kir_file_name";
                $truck->update([
                    "kir_file_name"=>$path
                ]);
            }

            return  DataFormater::responseApi(200,'Success Stored Data',$truck);
        }catch(Exception $error){
            return DataFormater::responseApi(400,$error->getMessage());
        }
    }

    public function search($license_number){
        $truck = Truck::where('license_number','like','%'.$license_number.'%')->get();
        return DataFormater::responseApi(200,"success",$truck);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $truck = Truck::findOrFail($id);
            return DataFormater::responseApi(200,"success",$truck);
        }catch(Exception $error){
            return DataFormater::responseApi(400,"data empty");
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
    public function changeStatus($id,$status)
    {
        try{
            if($status ==0 || $status == 1){
                $truck = Truck::findOrFail($id);

                $truck->update([
                    "is_active" => $status
                ]);
                if($status){
                    return  DataFormater::responseApi(200,'Success Deactivate Unit',$truck);
                }else{
                    return  DataFormater::responseApi(200,'Success Activated Unit',$truck);
                }
            }else{
                return  DataFormater::responseApi(400,'Wrong data format status');
            }            
        }catch(Exception $error){
            return DataFormater::responseApi(400,$error->getMessage());
        }
    }

    public function filter($truck_type)
    {
        try{
           $truck = Truck::whereIn('truck_type',explode(",",$truck_type))->get();  
           return  DataFormater::responseApi(200,'Success',$truck);       
        }catch(Exception $error){
            return DataFormater::responseApi(400,$error->getMessage());
        }
    }

    public function sorted($column_name,$sort_type){
        return DataFormater::responseApi(200,"success",Truck::orderBy("$column_name","$sort_type")->get());
    }
    

}
