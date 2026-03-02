<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Get;


use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Filament\Forms;
class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
               TextInput::make('name')->label('إسم المستخدم')
            ->required(),

        TextInput::make('email')->label('عنوان البريد اللإلكتروني')
            ->email()
            ->required()
            ->unique(ignoreRecord: true),

       TextInput::make('password')
    ->label('كلمة المرور')
    ->password()
    ->revealable()                          // 👈 زر إظهار/إخفاء
    ->required(fn ($livewire) => $livewire instanceof \App\Filament\Resources\Users\Pages\CreateUser)
    ->dehydrated(fn ($state) => filled($state))    // لا يرسل الحقل للـ DB إلا لو تم ملؤه
    ->rule(Password::defaults())            // قواعد أمان Laravel الافتراضية
    ->dehydrateStateUsing(fn ($state) => Hash::make($state)),  // هاش قبل الحفظ

TextInput::make('password_confirmation')
    ->label('تأكيد كلمة المرور')
    ->password()
    ->revealable()
    ->required(fn ($livewire) => $livewire instanceof \App\Filament\Resources\Users\Pages\CreateUser)
    ->same('password')                      // 👈 يتأكد أن الحقلين متطابقين
    ->dehydrated(false),                    // 👈 لا يحفظ في الـ DB

        Select::make('role')->label('نوع المستخدم (الدور)')
            ->options([
                'pharmacist' => 'صيدلاني',
                'super_admin' => 'مسؤول عام للنظام',
            ])
            ->required()
            ->reactive(),

        Select::make('pharmacy_id')->label('إسم الحي أو المنطقة')
            ->relationship('pharmacy', 'name')
            ->required(fn (Get $get) => $get('role') === 'pharmacist')
            ->visible(fn (Get $get) => $get('role') === 'pharmacist'),
    ]);
    }
}
