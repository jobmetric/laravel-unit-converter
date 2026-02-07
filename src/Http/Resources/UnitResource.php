<?php

namespace JobMetric\UnitConverter\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use JobMetric\Translation\Models\Translation;
use JobMetric\UnitConverter\Models\UnitRelation;

/**
 * Class UnitResource
 *
 * Transforms the Unit model into a structured JSON resource.
 *
 * @property int $id
 * @property string $type
 * @property float $value
 * @property bool $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read Collection|Translation[] $translations
 * @property-read Collection|UnitRelation[] $unitRelations
 */
class UnitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        global $translationLocale;

        return [
            'id'     => $this->id,
            'type'   => $this->type,
            'value'  => $this->value,
            'status' => $this->status,

            'created_at' => $this->created_at?->toISOString(),
            'updated_at' => $this->updated_at?->toISOString(),

            'translations' => translationResourceData($this->translations, $translationLocale),

            'unit_relations' => $this->whenLoaded('unitRelations', function () {
                return UnitRelationResource::collection($this->unitRelations);
            }),
        ];
    }
}
