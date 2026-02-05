<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use JobMetric\UnitConverter\Enums\UnitTypeEnum;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(config('unit.tables.unit'), function (Blueprint $table) {
            $table->id();

            $table->string('type')->index();
            /**
             * type of measurement unit
             *
             * @extends UnitTypeEnum
             * expected values: weight, length, currency, number, crypto, volume, temperature, area, pressure, speed,
             *                  force, time, torque, energy, frequency, power, acceleration, data_transfer, data_storage,
             *                  angle, density, mass_flow, volumetric_flow, electric_current, heat_transfer_coefficient
             *
             * examples:
             * - weight: gram, kilogram, ton, pound, ounce
             * - length: meter, centimeter, kilometer, inch, foot, yard, mile
             * - volume: liter, milliliter, gallon, quart
             * - temperature: Celsius, Fahrenheit, Kelvin
             */

            $table->decimal('value', 20, 10)->default(0);
            /**
             * conversion value relative to base unit
             *
             * - base unit for each type must have value = 1
             * - other units are calculated relative to base unit
             * - used for conversion: result = input_value * from_unit.value / to_unit.value
             *
             * examples:
             * - base unit (gram): value = 1
             * - kilogram: value = 1000 (1 kg = 1000 g)
             * - ton: value = 1000000 (1 ton = 1000000 g)
             */

            $table->boolean('status')->default(true)->index();
            /**
             * active status of unit
             *
             * - true = active, can be used for conversions
             * - false = inactive, hidden from selection but preserved in database
             */

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('unit.tables.unit'));
    }
};
