<?php

namespace App\Filament\Resources\OpeningHours\Pages;

use App\Filament\Resources\OpeningHours\OpeningHourResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOpeningHour extends CreateRecord
{
    protected static string $resource = OpeningHourResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
{
    $data['pharmacy_id'] = auth()->user()->pharmacy_id;

    return $data;
}

}
