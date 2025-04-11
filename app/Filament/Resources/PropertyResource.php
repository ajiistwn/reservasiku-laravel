<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Property;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;


use Filament\Forms\Components\Repeater;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Filters\QueryBuilder;
use App\Filament\Resources\PropertyResource\Pages;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;


class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Property Name')
                    ->columnSpan(2),
                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->columnSpan(2),
                Forms\Components\TextInput::make('country')
                    ->required()
                    ->label('Country')
                    ->columnSpan(1),
                Forms\Components\TextInput::make('city')
                    ->required()
                    ->label('City')
                    ->columnSpan(1),
                Forms\Components\Textarea::make('address')
                    ->required()
                    ->label('Address Detail')
                    ->columnSpan(2),
                Forms\Components\FileUpload::make('media')
                    ->label('Media Upload')
                    ->disk('public')
                    ->directory('uploads/property')
                    ->multiple()
                    ->imageEditor()
                    ->downloadable()
                    ->columnSpan(2)
                    ->panelLayout('grid')
                    ->reorderable()
                    ->appendFiles()
                    ->openable(),

                Repeater::make('rooms')
                    ->relationship()
                    ->schema([
                    // ...
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->label('Rooms Name')
                        ->columnSpan(2),
                    Forms\Components\Textarea::make('description')
                        ->label('Room Description')
                        ->columnSpan(2),
                    Forms\Components\TextInput::make('bed')
                        ->required()
                        ->label('Model or Beds Type')
                        ->columnSpan(2),
                    Forms\Components\TextInput::make('unit')
                        ->required()
                        ->label('Unit')
                        ->columnSpan(2),
                    Forms\Components\TextInput::make('price')
                        ->required()
                        ->label('Price')
                        ->columnSpan(2),
                    Forms\Components\FileUpload::make('media')
                        ->label('Media Upload')
                        ->disk('public')
                        ->directory('uploads/room')
                        ->multiple()
                        ->imageEditor()
                        ->downloadable()
                        ->columnSpan(2)
                        ->panelLayout('grid')
                        ->reorderable()
                        ->appendFiles()
                        ->openable()

                    ])
                    ->grid(2)
                    ->columnSpan(2)


            ]);

    }



    public static function table(Table $table): Table
    {
        return $table
            ->query(Property::query()->where('user_id', Auth::id()))
            ->columns([
                //

                Tables\Columns\TextColumn::make('name')->label('Property Name'),
                Tables\Columns\TextColumn::make('description')->label('Description'),
                Tables\Columns\TextColumn::make('country')->label('Country'),
                Tables\Columns\TextColumn::make('city')->label('City'),
                Tables\Columns\TextColumn::make('price')->label('Price'),
                Tables\Columns\TextColumn::make('address')->label('address'),
                Tables\Columns\ImageColumn::make('media'),





            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListProperties::route('/'),
            'create' => Pages\CreateProperty::route('/create'),
            'edit' => Pages\EditProperty::route('/{record}/edit'),
        ];
    }



}

