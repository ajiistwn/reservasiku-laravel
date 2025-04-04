<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Doctrine\DBAL\Query\From;
use Filament\Resources\Resource;
use Filament\Forms\FormsComponent;
use Filament\Forms\Components\Tabs\Tab;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count() ;
    }
    protected static ?string $navigationBadgeTooltip = 'Count of users';

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(2),
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(2),
                Forms\Components\TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->required(fn (string $operation): bool => $operation === 'create') // Wajib hanya saat create
                    ->hidden(fn (string $operation): bool => $operation === 'edit')
                    ->columnSpan(2),
                Forms\Components\Select::make('role')
                    ->label('Role')
                    ->options([
                        'admin' => 'admin',
                        'business' => 'business',
                        'user' => 'user',
                    ])
                    ->required()
                    ->columnSpan(2),
                Forms\Components\TextInput::make('country')
                    ->label('Country')
                    ->required()
                    ->columnSpan(2),
                Forms\Components\TextInput::make('city')
                    ->label('City')
                    ->required()
                    ->columnSpan(2),
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
                    })

                    ->columnSpan(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('Image')->circular(),
                // Tables\Columns\TextColumn::make('image')->label('ImageText'),
                Tables\Columns\TextColumn::make('name')->label('Name'),
                Tables\Columns\TextColumn::make('email')->label('Email'),
                Tables\Columns\TextColumn::make('role')->label('Role'),
                Tables\Columns\TextColumn::make('city')->label('City'),
                Tables\Columns\TextColumn::make('country')->label('Country'),
                Tables\Columns\TextColumn::make('created_at')->label('Created At')->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')->label('Updated At')->dateTime(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
    public static function mutateFormDataBeforeSave(array $data, $record): array
    {
        // Cek kalau gambar lama ada dan sekarang udah gak ada (berarti dihapus manual lewat silang)
        if ($record && $record->image && empty($data['image'])) {
            if (Storage::disk('public')->exists($record->image)) {
                Storage::disk('public')->delete($record->image);
            }
        }

        return $data;
    }
}
