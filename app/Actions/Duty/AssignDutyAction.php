<?php

namespace App\Actions\Duty;

use App\Models\Duty;
use App\Enums\DutyType;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

final class AssignDutyAction
{
    public function __construct(
        private ValidateDutyOverlapAction $overlapValidator
    ) {}

    public function execute(
        int $pharmacyId,
        Carbon $startsAt,
        Carbon $endsAt,
        DutyType $type,
        int $createdBy
    ): Duty {
        return DB::transaction(function () use (
            $pharmacyId,
            $startsAt,
            $endsAt,
            $type,
            $createdBy
        ) {
            $this->overlapValidator->execute(
                pharmacyId: $pharmacyId,
                startsAt: $startsAt,
                endsAt: $endsAt
            );

            return Duty::create([
                'pharmacy_id' => $pharmacyId,
                'starts_at'   => $startsAt,
                'ends_at'     => $endsAt,
                'duty_type'   => $type->value,
                'created_by'  => $createdBy,
            ]);
        });
    }
}
