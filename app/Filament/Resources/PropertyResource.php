<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Property;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use App\Models\Facility;

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

    public static function getNavigationSort(): ?int
    {
        return 1;
    }


    public static function getNavigationBadge(): ?string
    {
        if(Auth::user()->role === 'admin') {
            return static::getModel()::count();
        }

        return static::getModel()::where('user_id', Auth::id())->count();
    }

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
                Forms\Components\Select::make('facilities')
                    ->multiple()
                    ->label('Fasilitas Properti')
                    ->relationship('facilities', 'name')
                    ->columnSpan(2)
                    ->options(function () {
                        return Facility::where('property', true)
                            ->pluck('name', 'id');
                    }),
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
                    Forms\Components\Select::make('facilities')
                        ->multiple()
                        ->label('Fasilitas room')
                        ->relationship('facilities', 'name')
                        ->columnSpan(2)
                        ->options(function () {
                            return Facility::where('room', true)
                                ->pluck('name', 'id');
                        }),
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
            ->query(function () {
                $query = Property::query();
            
                if (Auth::user()->role !== 'admin') {
                    $query->where('user_id', Auth::id());
                }
            
                return $query;
            })
            ->columns([
                //

                Tables\Columns\ImageColumn::make('media'),
                Tables\Columns\TextColumn::make('name')->label('Property Name'),
                // Tables\Columns\TextColumn::make('description')->label('Description'),
                Tables\Columns\TextColumn::make('country')->label('Country'),
                Tables\Columns\TextColumn::make('city')->label('City'),
                Tables\Columns\TextColumn::make('price')->label('Price'),
                // Tables\Columns\TextColumn::make('address')->label('address'),
                Tables\Columns\ToggleColumn::make('status'),





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

