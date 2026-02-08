<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(config('unit-converter.tables.unit_relation'), function (Blueprint $table) {
            $table->foreignId('unit_id')->index()->constrained(config('unit-converter.tables.unit'))->cascadeOnUpdate()->cascadeOnDelete();
            /**
             * reference to unit in units table
             *
             * - foreign key to units.id
             * - cascade on update/delete
             */

            $table->morphs('unitable');
            /**
             * polymorphic relation to any model
             *
             * creates:
             * - unitable_type: model class name (e.g. App\Models\Product)
             * - unitable_id: model record id
             *
             * allows attaching units to any model using HasUnit trait
             * example: Product model can have weight, length, volume units
             */

            $table->string('type')->index();
            /**
             * type of unit relation
             *
             * must match one of the allowed types in unitAllowTypes() method of the model
             * examples: weight, length, volume, area, etc.
             *
             * allows a model to have multiple unit types
             * e.g. Product can have both weight and length units
             */

            $table->decimal('value', 15, 8)->index();
            /**
             * value of the unit for this relation
             *
             * - stored in the unit specified by unit_id
             * - can be converted to other units of the same type
             * - precision: 15 digits total, 8 decimal places
             *
             * example:
             * - product weight: 2.5 (in unit_id = kilogram)
             * - product length: 100 (in unit_id = centimeter)
             */

            $table->dateTime('created_at')->index()->default(DB::raw('CURRENT_TIMESTAMP'));
            /**
             * timestamp when unit was attached to model
             *
             * - no updated_at: relations are immutable (detach and re-attach to change)
             */

            $table->unique([
                'unit_id',
                'unitable_type',
                'unitable_id',
                'type'
            ], 'UNIT_RELATION_UNIQUE');
            /**
             * unique constraint
             *
             * ensures one unit per type per model instance
             * prevents duplicate unit assignments
             *
             * example:
             * - Product #1 can have only one weight unit
             * - Product #1 can have multiple unit types (weight, length, etc.)
             */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('unit-converter.tables.unit_relation'));
    }
};
