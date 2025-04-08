<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Storage;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class CustomEditProfile extends BaseEditProfile
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                Forms\Components\TextInput::make('city')
                    ->label('City')
                    ->required(),
                Forms\Components\TextInput::make('country')
                    ->label('Country')
                    ->required(),
                Forms\Components\FileUpload::make('image')
                ->image()
                ->disk('public')
                ->directory('uploads/profile')
                ->dehydrated(true)
                ->imageEditor()
                ->downloadable()
                ->saveUploadedFileUsing(function (TemporaryUploadedFile $file, $state, $component) {
                    $record = $component->getRecord();
                    $oldPath = $record->image ?? null;
                    $defaultImage = 'uploads/profile/imageDummy/avatars.png';


                    if ($oldPath && $oldPath !== $defaultImage && Storage::disk('public')->exists($oldPath)) {
                        Storage::disk('public')->delete($oldPath);
                    }

                    // Simpan file baru
                    return $file->store('uploads/profile', 'public');
                }),
                $this->getPasswordConfirmationFormComponent(),
                // ->required(),

            ]);
    }
}
