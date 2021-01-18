<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleOwner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_owners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id');
            $table->foreign('vehicle_id')->references('id')->on('vehicle');

            $table->string('names');
            $table->date('date_of_birth');
            $table->string('national_id')->nullable();
            $table->string('guardian_national_id')->nullable();
            $table->string('passport_no')->nullable();
            $table->string('postal_address');
            $table->string('physical_address');
            $table->string('telephone')->nullable();
            $table->enum('type', ['individual', 'company']);

            $table->enum('citizen', ['true', 'false']);
            $table->enum('owner_under_16', ['false', 'true']);
            
            $table->string('owner_permit_no')->nullable();
            $table->string('owner_exemption_certificate_no')->nullable();
            
            $table->string('nationality');

            $table->string('company_no')->nullable();
            $table->string('company_country')->nullable();
            $table->string('gov_department_no')->nullable();
            $table->string('parastatal_no')->nullable();
            $table->string('society_no')->nullable();
            
            $table->string('customs_clearance_certificate_no');
            $table->string('police_clearance_certificate_no');

            $table->string('transport_roadworthness_certificate_no');
            $table->date('transport_roadworthness_date');

            $table->string('financial_instution_name')->nullable();
            $table->string('financial_instution_no')->nullable();
            $table->date('loan_date')->nullable();

            $table->date('owned_since');
            $table->date('owned_till')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_owner');
    }
}
