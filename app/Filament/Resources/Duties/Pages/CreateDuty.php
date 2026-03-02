<?php

namespace App\Filament\Resources\Duties\Pages;

use App\Filament\Resources\Duties\DutyResource;
use Filament\Resources\Pages\CreateRecord;
use App\Actions\Duty\ValidateDutyOverlapAction;

use Carbon\Carbon;


class CreateDuty extends CreateRecord
{
    protected static string $resource = DutyResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
{
    app(ValidateDutyOverlapAction::class)->execute(
        pharmacyId: $data['pharmacy_id'],
        startsAt: Carbon::parse($data['starts_at']),
        endsAt: Carbon::parse($data['ends_at'])
    );

    $data['created_by'] = auth()->id();

    return $data;
}

}
