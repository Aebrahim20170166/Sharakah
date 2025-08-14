<?php

namespace App\Http\Resources\Web;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OpportunityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "tenant_id" => $this->tenant_id,
            "title" => $this->title,
            "city" => $this->city->name,
            "sector" => $this->sector->name,
            "min_investment" => $this->min_investment,
            "status" => $this->status,
            "target_amount" => $this->target_amount,
            "raised_amount" => $this->raised_amount,
            "expected_roi" => $this->expected_roi,
            "payback_months" => $this->payback_months,
            "summary" => $this->summary,
            "assumptions" => $this->assumptions,
            "date" => $this->created_at,
        ];
    }
}
