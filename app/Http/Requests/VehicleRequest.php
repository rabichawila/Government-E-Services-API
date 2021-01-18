<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\Types\Nullable;

class VehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return [

            // vehicle
            'condition'                                 => 'required|in:new,used,rebuilt',
            'make'                                      => 'required',
            'model'                                     => 'required',
            'body_type'                                 => 'required',
            'chassis_no'                                => 'required',
            'year'                                      => 'required|date_format:Y-m-d',
            'local_manufactured'                        => 'required|in:true,false',
            'unladen_weight'                            => 'required',
            'gross_weight'                              => 'required',
            'axels'                                     => 'required',
            'seating_capacity'                          => 'required',
            'standing_capacity'                         => 'required',
            'engine_no'                                 => 'required',
            'engine_capacity'                           => 'required',
            'color'                                     => 'required',
            'fuel'                                      => 'required',

            // owner
            'names'                     => 'required',
            'date_of_birth'             => 'required|date_format:Y-m-d|',
            'national_id'               => 'nullable',
            'nationality'               => 'required',
            'citizen'                   => 'required|in:true,false',
            'owner_under_16'            => 'required|in:true,false',
            'guardian_national_id'      => 'nullable',
            'postal_address'            => 'required',
            'physical_address'          => 'required',
            'telephone'                 => 'nullable',
            'type'                      => 'required|in:individual,company',
            
            // foreigners
            'passport_no'                       => 'nullable',
            'owner_permit_no'                   => 'nullable',
            'owner_exemption_certificate_no'    => 'nullable',
            
            // companies
            'company_no'                => 'nullable',
            'company_country'           => 'nullable',
            'gov_department_no'         => 'nullable',
            'parastatal_no'             => 'nullable',
            'society_no'                => 'nullable',

            'customs_clearance_certificate_no'                => 'required',
            'police_clearance_certificate_no'                 => 'required',
            'transport_roadworthness_certificate_no'          => 'required',
            'transport_roadworthness_date'                    => 'required',

            'financial_instution_name'                    => 'nullable',
            'financial_instution_no'                      => 'nullable',
            'loan_date'                                   => 'nullable',


            'owned_since'    => 'required|date_format:Y-m-d|',
            'owned_till'    => 'nullable|date_format:Y-m-d|'
                    
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
