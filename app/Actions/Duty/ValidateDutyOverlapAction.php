<?php

namespace App\Actions\Duty;

use App\Models\Duty;
use Carbon\Carbon;
use DomainException;

final class ValidateDutyOverlapAction
{
    public function execute(
        int $pharmacyId,
        Carbon $startsAt,
        Carbon $endsAt,
        ?int $ignoreDutyId = null
    ): void {
        if ($startsAt->gte($endsAt)) {
            throw new DomainException('Invalid duty time range.');
        }

        $query = Duty::query()
            ->where('pharmacy_id', $pharmacyId)
            ->where(function ($q) use ($startsAt, $endsAt) {
                $q->whereBetween('starts_at', [$startsAt, $endsAt])
                  ->orWhereBetween('ends_at', [$startsAt, $endsAt])
                  ->orWhere(fn ($q) =>
                      $q->where('starts_at', '<=', $startsAt)
                        ->where('ends_at', '>=', $endsAt)
                  );
            });

        if ($ignoreDutyId) {
            $query->where('id', '!=', $ignoreDutyId);
        }

        if ($query->exists()) {
            throw new DomainException('Duty overlap detected for this pharmacy.');
        }
    }
}
