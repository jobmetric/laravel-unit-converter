<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Base Unit Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during Unit for
    | various messages that we need to display to the user.
    |
    */

    "entity_names" => [
        "unit" => "Unit",
    ],

    "messages" => [
        "change_default_value" => "Default value changed successfully.",
        "used_in"              => "Unit used in ':count' places.",
        "attached"             => "Unit attached successfully.",
        "detached"             => "Unit detached successfully.",
    ],

    "validation" => [
        "unit" => [
            "translation_name_required" => "The translation name field is required.",
            "name_duplicate_in_type"    => "A unit with the name ':name' already exists in the :type type.",
        ],
    ],

    "exceptions" => [
        "unit_not_found"                        => "Unit ':number' not found!",
        "type_not_found_in_allow_types"         => "Type ':type' not found in allowed types!",
        "unit_type_default_value"               => "The desired ':type' unit must have a default value of 1 in the first step and you cannot enter another value",
        "unit_type_use_default_value"           => "You have already entered the default value and you can no longer use the value 1",
        "unit_type_cannot_change_default_value" => "You cannot change the default value",
        "unit_type_used_in"                     => "Unit number ':unit_id' used in ':number' places!",
        "cannot_delete_default_value"           => "You cannot remove the default value until other items have been removed!",
        "from_and_to_must_same_type"            => "The from and to of the conversion must be of the same type!",
        "unit_value_zero"                       => "Cannot set a unit with zero value as the default unit!",
    ],

    "fields" => [
        "translation" => "Translation",
        "name"        => "Name",
        "code"        => "Code",
        "position"    => "Position",
        "description" => "Description",
        "type"        => "Type",
        "value"       => "Value",
        "status"      => "Status",
    ],

    "events" => [
        "unit_deleted" => [
            "title"       => "Unit Deleted",
            "description" => "This event is triggered when a Unit is deleted.",
        ],

        "unit_stored" => [
            "title"       => "Unit Stored",
            "description" => "This event is triggered when a Unit is stored.",
        ],

        "unit_updated" => [
            "title"       => "Unit Updated",
            "description" => "This event is triggered when a Unit is updated.",
        ],
    ],

    "unit_types" => [
        "weight"                    => "Weight",
        "length"                    => "Length",
        "currency"                  => "Currency",
        "number"                    => "Number",
        "crypto"                    => "Cryptocurrency",
        "volume"                    => "Volume",
        "temperature"               => "Temperature",
        "area"                      => "Area",
        "pressure"                  => "Pressure",
        "speed"                     => "Speed",
        "force"                     => "Force",
        "time"                      => "Time",
        "torque"                    => "Torque",
        "energy"                    => "Energy",
        "frequency"                 => "Frequency",
        "power"                     => "Power",
        "acceleration"              => "Acceleration",
        "data_transfer"             => "Data Transfer",
        "data_storage"              => "Data Storage",
        "angle"                     => "Angle",
        "density"                   => "Density",
        "mass_flow"                 => "Mass Flow",
        "volumetric_flow"           => "Volumetric Flow",
        "electric_current"          => "Electric Current",
        "heat_transfer_coefficient" => "Heat Transfer Coefficient",
        "luminosity"                => "Luminosity",
        "electric_voltage"          => "Electric Voltage",
        "electric_resistance"       => "Electric Resistance",
        "electric_capacitance"      => "Electric Capacitance",
        "electric_inductance"       => "Electric Inductance",
        "magnetic_flux"             => "Magnetic Flux",
        "radiation"                 => "Radiation",
        "fuel_consumption"          => "Fuel Consumption",
        "viscosity"                 => "Viscosity",
        "concentration"             => "Concentration",
        "cooking"                   => "Cooking",
    ],

];
