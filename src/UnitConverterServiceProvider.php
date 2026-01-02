<?php

namespace JobMetric\UnitConverter;

use JobMetric\PackageCore\Exceptions\MigrationFolderNotFoundException;
use JobMetric\PackageCore\Exceptions\RegisterClassTypeNotFoundException;
use JobMetric\PackageCore\PackageCore;
use JobMetric\PackageCore\PackageCoreServiceProvider;
use JobMetric\UnitConverter\Commands\UnitConvertCommand;
use JobMetric\UnitConverter\Commands\UnitExportCommand;
use JobMetric\UnitConverter\Commands\UnitListCommand;
use JobMetric\UnitConverter\Commands\UnitSeedCommand;

class UnitConverterServiceProvider extends PackageCoreServiceProvider
{
    /**
     * @param PackageCore $package
     *
     * @return void
     * @throws MigrationFolderNotFoundException
     * @throws RegisterClassTypeNotFoundException
     */
    public function configuration(PackageCore $package): void
    {
        $package->name('laravel-unit-converter')
            ->hasConfig()
            ->hasMigration()
            ->hasTranslation()
            ->registerCommand(UnitConvertCommand::class)
            ->registerCommand(UnitListCommand::class)
            ->registerCommand(UnitSeedCommand::class)
            ->registerCommand(UnitExportCommand::class)
            ->registerClass('UnitConverter', UnitConverter::class);
    }
}
