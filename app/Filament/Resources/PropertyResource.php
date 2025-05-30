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
use Filament\Forms\Components\Set;
use Filament\Forms\Components\Get;

use Filament\Forms\Components\Repeater;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Filters\QueryBuilder;
use App\Filament\Resources\PropertyResource\Pages;
use Faker\Core\Color;
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
                Forms\Components\TextInput::make('price_property')
                    ->prefix('Rp')
                    ->numeric()
                    ->minValue(0)
                    ->required()
                    ->label('Price')
                    ->columnSpan(2)
                    ->placeholder(function (callable $set, callable $get) {
                        $rooms = $get('rooms') ?? [];
                        $total = 0;

                        foreach ($rooms as $room) {
                            $unit = isset($room['unit']) ? (int) $room['unit'] : 0;
                            $price = isset($room['price']) ? (int) $room['price'] : 0;
                            $total += $unit * $price;
                        }

                        if ($total !== null) {
                            $set('price_property', $total);
                        }
                    })
                    ->helperText('The price of this property is automatic if you have added the rooms you have along with their prices and quantities. you can change it if you want to determine your own price. we are not responsible for your business risks!.'),
                    // ->readonly(),
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
                        ->columnSpan(2)
                        ->reactive(),
                    Forms\Components\TextInput::make('price')
                        ->prefix('Rp')
                        ->reactive()
                        ->numeric()
                        ->minValue(0)
                        ->required()
                        ->label('Price')
                        ->columnSpan(2)
                        ->reactive(),

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
                    // ->live()
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

                Tables\Columns\ImageColumn::make('media')
                    ->stacked()
                    ->overlap(2)
                    ->limit(3)
                    ->limitedRemainingText(size: 'lg')
                    ->circular(),
                Tables\Columns\TextColumn::make('name')->label('Property Name')
                    ->description(function ($record) {
                        $address = $record->address;
                        $city = $record->city;
                        $country = $record->country;
                        return "$address, $city, $country";
                    }),
                Tables\Columns\TextColumn::make('price_property')->label('Price')->money('IDR'),
                Tables\Columns\TextColumn::make('rooms_count')->label('Rooms Count')
                    ->counts('rooms')
                    ->sortable(),
                Tables\Columns\TextColumn::make('available')->label('Available Rooms')
                    ->default(function ($record) {
                        $now = now();
                        $availableRooms = $record->rooms->filter(function ($room) use ($now) {
                            return !$room->reservations()
                                ->whereHas('transaction', function ($query) {
                                    $query->where('status', '!=', 'cancelled');
                                })
                                ->where('check_in', '<=', $now)
                                ->where('check_out', '>=', $now)
                                ->exists();
                        });

                        return $availableRooms->count();
                    })
                    ->color('success')
                    ->badge(),






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

