<?php

namespace JobMetric\UnitConverter\Enums;

use JobMetric\PackageCore\Enums\EnumMacros;

/**
 * @method static WEIGHT()
 * @method static LENGTH()
 * @method static CURRENCY()
 * @method static NUMBER()
 * @method static CRYPTO()
 * @method static VOLUME()
 * @method static TEMPERATURE()
 * @method static AREA()
 * @method static PRESSURE()
 * @method static SPEED()
 * @method static FORCE()
 * @method static TIME()
 * @method static TORQUE()
 * @method static ENERGY()
 * @method static FREQUENCY()
 * @method static POWER()
 * @method static ACCELERATION()
 * @method static DATA_TRANSFER()
 * @method static DATA_STORAGE()
 * @method static ANGLE()
 * @method static DENSITY()
 * @method static MASS_FLOW()
 * @method static VOLUMETRIC_FLOW()
 * @method static ELECTRIC_CURRENT()
 * @method static HEAT_TRANSFER_COEFFICIENT()
 * @method static LUMINOSITY()
 * @method static ELECTRIC_VOLTAGE()
 * @method static ELECTRIC_RESISTANCE()
 * @method static ELECTRIC_CAPACITANCE()
 * @method static ELECTRIC_INDUCTANCE()
 * @method static MAGNETIC_FLUX()
 * @method static RADIATION()
 * @method static FUEL_CONSUMPTION()
 * @method static VISCOSITY()
 * @method static CONCENTRATION()
 * @method static COOKING()
 */
enum UnitTypeEnum: string
{
    use EnumMacros;

    case WEIGHT = "weight";                                                 /* Weight units */
    case LENGTH = "length";                                                 /* Length units */
    case CURRENCY = "currency";                                             /* Currency units */
    case NUMBER = "number";                                                 /* Number units */
    case CRYPTO = "crypto";                                                 /* Cryptocurrency units */
    case VOLUME = "volume";                                                 /* Volume units */
    case TEMPERATURE = "temperature";                                       /* Temperature units */
    case AREA = "area";                                                     /* Area units */
    case PRESSURE = "pressure";                                             /* Pressure units */
    case SPEED = "speed";                                                   /* Speed units */
    case FORCE = "force";                                                   /* Force units */
    case TIME = "time";                                                     /* Time units */
    case TORQUE = "torque";                                                 /* Torque units */
    case ENERGY = "energy";                                                 /* Energy units */
    case FREQUENCY = "frequency";                                           /* Frequency units */
    case POWER = "power";                                                   /* Power units */
    case ACCELERATION = "acceleration";                                     /* Acceleration units */
    case DATA_TRANSFER = "data_transfer";                                   /* Data transfer units */
    case DATA_STORAGE = "data_storage";                                     /* Data storage units */
    case ANGLE = "angle";                                                   /* Angle units */
    case DENSITY = "density";                                               /* Density units */
    case MASS_FLOW = "mass_flow";                                           /* Mass flow units */
    case VOLUMETRIC_FLOW = "volumetric_flow";                               /* Volumetric flow units */
    case ELECTRIC_CURRENT = "electric_current";                             /* Electric current units */
    case HEAT_TRANSFER_COEFFICIENT = "heat_transfer_coefficient";           /* Heat transfer coefficient units */
    case LUMINOSITY = "luminosity";                                         /* Luminosity units (lumen, candela, lux) */
    case ELECTRIC_VOLTAGE = "electric_voltage";                             /* Electric voltage units (volt, millivolt, kilovolt) */
    case ELECTRIC_RESISTANCE = "electric_resistance";                       /* Electric resistance units (ohm, kiloohm, megaohm) */
    case ELECTRIC_CAPACITANCE = "electric_capacitance";                     /* Electric capacitance units (farad, microfarad) */
    case ELECTRIC_INDUCTANCE = "electric_inductance";                       /* Electric inductance units (henry) */
    case MAGNETIC_FLUX = "magnetic_flux";                                   /* Magnetic flux units (weber, tesla) */
    case RADIATION = "radiation";                                           /* Radiation units (becquerel, sievert, gray) */
    case FUEL_CONSUMPTION = "fuel_consumption";                             /* Fuel consumption units (L/km, mpg) */
    case VISCOSITY = "viscosity";                                           /* Viscosity units (poise, stokes) */
    case CONCENTRATION = "concentration";                                   /* Concentration units (mol/L, ppm) */
    case COOKING = "cooking";                                               /* Cooking units (cup, tablespoon, teaspoon) */

    /**
     * Get the translated label for the unit type.
     *
     * @return string
     */
    public function label(): string
    {
        return trans('unit-converter::base.unit_types.' . $this->value);
    }
}
