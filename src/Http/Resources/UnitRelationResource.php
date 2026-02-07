<?php

namespace JobMetric\UnitConverter\Http\Resources;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use JobMetric\UnitConverter\Models\Unit;

/**
 * Class UnitRelationResource
 *
 * Transforms the UnitRelation model into a structured JSON resource.
 *
 * @property int $unit_id
 * @property string $unitable_type
 * @property int $unitable_id
 * @property string $type
 * @property float $value
 * @property Carbon $created_at
 *
 * @property-read Unit $unit
 * @property-read Model $unitable
 * @property-read mixed $unitable_resource
 */
class UnitRelationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'unit_id'       => $this->unit_id,
            'unitable_id'   => $this->unitable_id,
            'unitable_type' => $this->unitable_type,
            'type'          => $this->type,
            'value'         => $this->value,
            'created_at'    => $this->created_at?->toISOString(),

            'unit' => $this->whenLoaded('unit', function () {
                return UnitResource::make($this->unit);
            }),

            'unitable' => $this?->unitable_resource,
        ];
    }
}
