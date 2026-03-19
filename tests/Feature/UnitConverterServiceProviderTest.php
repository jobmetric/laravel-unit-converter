<?php

namespace JobMetric\UnitConverter\Tests\Feature;

use JobMetric\UnitConverter\Facades\UnitConverter as UnitConverterFacade;
use JobMetric\UnitConverter\Services\UnitConverter;
use JobMetric\UnitConverter\Tests\TestCase;
use JobMetric\UnitConverter\UnitConverterServiceProvider;

/**
 * Feature tests for package service provider wiring.
 */
class UnitConverterServiceProviderTest extends TestCase
{
    /**
     * Verify provider registration and container binding for the unit-converter service.
     *
     * @return void
     */
    public function test_provider_registers_unit_converter_binding(): void
    {
        $providers = $this->app->getLoadedProviders();

        $this->assertArrayHasKey(UnitConverterServiceProvider::class, $providers);
        $this->assertTrue($providers[UnitConverterServiceProvider::class]);
        $this->assertInstanceOf(UnitConverter::class, $this->app->make('unit-converter'));
    }

    /**
     * Verify facade root resolves to the same concrete service class.
     *
     * @return void
     */
    public function test_facade_resolves_registered_service(): void
    {
        $root = UnitConverterFacade::getFacadeRoot();

        $this->assertNotNull($root);
        $this->assertInstanceOf(UnitConverter::class, $root);
    }
}

