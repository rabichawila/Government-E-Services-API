<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Http\Resources\VehicleCollection;
use App\Models\Vehicle;
use App\Models\VehicleOwner;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::paginate(12);

        return VehicleCollection::collection($vehicles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleRequest $request)
    {
        $vehicle = new Vehicle;

        // vehicle details
        $vehicle->condition             = $request->condition;
        $vehicle->make                  = $request->make;
        $vehicle->reg_no                = strtoupper(uniqid('BW-'));
        $vehicle->model                 = $request->model;
        $vehicle->body_type             = $request->body_type;
        $vehicle->chassis_no            = $request->chassis_no;
        $vehicle->year                  = $request->year;
        $vehicle->local_manufactured    = $request->local_manufactured;
        $vehicle->unladen_weight        = $request->unladen_weight;
        $vehicle->gross_weight          = $request->gross_weight;
        $vehicle->axels                 = $request->axels;
        $vehicle->seating_capacity      = $request->seating_capacity;
        $vehicle->standing_capacity     = $request->standing_capacity;
        $vehicle->engine_no             = $request->engine_no;
        $vehicle->engine_capacity       = $request->engine_capacity;
        $vehicle->color                 = $request->color;
        $vehicle->fuel                  = $request->fuel;


        $vehicle->save();


        $vehicleOwner = new VehicleOwner();
        // owner details
        $vehicleOwner->names                  = $request->names;
        $vehicleOwner->vehicle_id             = $vehicle->id;
        $vehicleOwner->date_of_birth          = $request->date_of_birth;
        $vehicleOwner->national_id            = $request->national_id;
        $vehicleOwner->nationality            = $request->nationality;
        $vehicleOwner->citizen                = $request->citizen;
        $vehicleOwner->owner_under_16         = $request->owner_under_16;
        $vehicleOwner->guardian_national_id   = $request->guardian_national_id;
        $vehicleOwner->postal_address         = $request->postal_address;
        $vehicleOwner->physical_address       = $request->physical_address;
        $vehicleOwner->type                   = $request->type;

        // foreigners
        $vehicleOwner->passport_no                       = $request->passport_no;
        $vehicleOwner->owner_permit_no                   = $request->owner_permit_nol;
        $vehicleOwner->owner_exemption_certificate_no    = $request->owner_exemption_certificate_no;
                    
        // companies
        $vehicleOwner->company_no                = $request->company_no;
        $vehicleOwner->company_country           = $request->company_country;
        $vehicleOwner->gov_department_no         = $request->gov_department_no;
        $vehicleOwner->parastatal_no             = $request->parastatal_no;
        $vehicleOwner->society_no                = $request->society_no;
        $vehicleOwner->telephone                 = $request->telephone;


        $vehicleOwner->customs_clearance_certificate_no                = $request->customs_clearance_certificate_no;
        $vehicleOwner->police_clearance_certificate_no                 = $request->police_clearance_certificate_no;
        $vehicleOwner->transport_roadworthness_certificate_no          = $request->transport_roadworthness_certificate_no;
        $vehicleOwner->transport_roadworthness_date                    = $request->transport_roadworthness_date;

        $vehicleOwner->financial_instution_name                    = $request->financial_instution_name;
        $vehicleOwner->financial_instution_no                      = $request->financial_instution_no;
        $vehicleOwner->loan_date                                   = $request->loan_date;



        $vehicleOwner->owned_since   = $request->owned_since;
        $vehicleOwner->owned_till    = $request->owned_till;

        $vehicleOwner->save();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }
    
}
