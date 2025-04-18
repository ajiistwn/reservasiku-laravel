<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use App\Models\Room;
use Filament\Tables;
use Filament\Infolists;
use App\Models\Property;
use App\Models\Transaction;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Reservation;
use Doctrine\DBAL\Query\From;
use Doctrine\DBAL\Schema\View;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ReservationResource\Pages;
use App\Filament\Resources\ReservationResource\RelationManagers;
use App\Filament\Resources\ReservationResource\Pages\ViewReservation;
use Filament\Support\Components\Hr;

class ReservationResource extends Resource
{
    protected static ?string $model = Reservation::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark-square';


    public static function getNavigationSort(): ?int
    {
        return 4;
    }

    public static function getNavigationBadge(): ?string
    {
        if (Auth::user()->role === 'admin') {
            return static::getModel()::count();
        }

        return static::getModel()::where('user_id', Auth::id())->count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Select::make('user_id')
                    ->required()
                    ->relationship('user', 'email')
                    ->searchable()
                    ->label('User')
                    ->columnSpan(2)
                    ,
                Forms\Components\DateTimePicker::make('check_in')
                    ->required()
                    ->label('Check In')
                    ->columnSpan(1)
                    ->reactive(),
                Forms\Components\DateTimePicker::make('check_out')
                    ->required()
                    ->label('Check Out')
                    ->columnSpan(1)
                    ->reactive()
                    ->afterStateUpdated(function (callable $get, callable $set) {
                        $checkIn = $get('check_in');
                        $checkOut = $get('check_out');
                        if ($checkIn && $checkOut) {
                            $set('time', (int) Carbon::parse($checkIn)->diffInHours($checkOut));
                        }
                        // $set('time', 0);
                    }),
                Forms\Components\Select::make('property_id')
                    ->required()
                    ->dehydrated(false)
                    ->label('Property')
                    ->columnSpan(1)
                    ->options(
                        Property::where('user_id', Auth::id())->pluck('name', 'id')
                    )
                    ->reactive(),
                Forms\Components\Select::make('room_id')
                    ->required()
                    ->relationship('room')
                    ->label('Room')
                    ->columnSpan(1)
                    ->options(function (callable $get) {
                        $propertyId = $get('property_id');
                        if (!$propertyId) {
                            return [];
                        }
                        return Room::where('property_id', $propertyId)
                            ->pluck('name', 'id');
                    })
                    ->reactive(),
                Forms\Components\TextInput::make('time')
                    ->required()
                    ->numeric()
                    ->prefix('H')
                    ->label('Hour')
                    ->columnSpan(1)
                    ->dehydrated(false)
                    ->reactive()
                    ->readOnly(),
                Forms\Components\TextInput::make('price')
                    ->placeholder(function (callable $get, callable $set) {
                        $roomId = $get('room_id');
                        if (!$roomId) {
                            $set('price', 0);
                        }
                        $set('price', Room::find($roomId)->price ?? 0);

                    })
                    ->prefix('Rp')
                    ->required()
                    ->dehydrated(false)
                    ->numeric()
                    ->label('Price / Hour')
                    ->columnSpan(1)
                    ->reactive()
                    ->readOnly(),
                Forms\Components\TextInput::make('amount')
                    ->placeholder(function (callable $get, callable $set) {
                        $hour = $get('time');
                        $price = $get('price');
                        if ($hour && $price) {
                            $day = $hour / 24;
                            $set('amount', $day * $price);
                        } else {
                            $set('amount', 0);
                        }

                    })
                    ->prefix('Rp')
                    ->required()
                    ->dehydrated(false)
                    ->numeric()
                    ->label('Amount')
                    ->columnSpan(2)
                    ->readOnly()

            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {

        return $infolist
            ->schema([
                Infolists\Components\TextEntry::make('user.name')
                    ->label('Name')
                    ->columnSpan(1)
                    ->icon('heroicon-s-user'),
                Infolists\Components\TextEntry::make('user.email')
                    ->label('Email')
                    ->columnSpan(1)
                    ->icon('heroicon-s-envelope'),
                Infolists\Components\TextEntry::make('user.country')
                    ->label('Country')
                    ->columnSpan(2)
                    ->icon('heroicon-s-phone'),
                Infolists\Components\TextEntry::make('room.property.name')
                    ->label('Property')
                    ->columnSpan(1)
                    ->icon('heroicon-s-home-modern'),
                Infolists\Components\TextEntry::make('property.address')
                    ->label('Address Property')
                    ->columnSpan(1)
                    ->default(function ($record) {
                        $country = $record->room->property->country;
                        $city = $record->room->property->city;
                        $address = $record->room->property->address;

                        return "{$address}, {$city}, {$country}";
                    })
                    ->icon('heroicon-s-map'),
                Infolists\Components\TextEntry::make('room.name')
                    ->label('Room')
                    ->columnSpan(1)
                    ->icon('heroicon-s-arrow-right-end-on-rectangle'),
                Infolists\Components\TextEntry::make('room.bed')
                    ->label('Type Bed')
                    ->columnSpan(1)
                    ->icon('heroicon-s-paper-clip')
                    ,
                Infolists\Components\TextEntry::make('room.price')
                    ->label('Price / Day')
                    ->columnSpan(2)
                    ->money('IDR')
                    ->icon('heroicon-s-banknotes'),
                Infolists\Components\TextEntry::make('check_in')
                    ->label('Check In')
                    ->columnSpan(1)
                    ->icon('heroicon-s-calendar-days'),
                Infolists\Components\TextEntry::make('check_out')
                    ->label('Check Out')
                    ->columnSpan(1)
                    ->icon('heroicon-s-calendar-days'),
                Infolists\Components\TextEntry::make('time')
                    ->label('Time')
                    ->columnSpan(2)
                    ->default(function ($record) {
                        $checkIn = $record->check_in;
                        $checkOut = $record->check_out;
                        $time = (int) Carbon::parse($checkIn)->diffInHours($checkOut);
                        $day =  intdiv($time, 24);
                        $hour = (int) $time - ($day * 24);
                        return "{$day} days, {$hour} hours";
                    })
                    ->icon('heroicon-s-clock'),
                Infolists\Components\TextEntry::make('transaction.amount')
                    ->label('Amount')
                    ->columnSpan(1)
                    ->money('IDR')
                    ->icon('heroicon-s-banknotes'),
                Infolists\Components\TextEntry::make('transaction.status')
                    ->label('Status')
                    ->columnSpan(1)
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'failed' => 'danger',
                        'pending' => 'warning',
                        'completed' => 'success',
                    })
                    ->icon('heroicon-o-check-circle'),
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('room.name')
                    ->label('Room')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('check_in')
                    ->label('Check In')
                    ->sortable()
                    ->dateTime(),
                Tables\Columns\TextColumn::make('check_out')
                    ->label('Check Out')
                    ->sortable()
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([

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
            'index' => Pages\ListReservations::route('/'),
            'create' => Pages\CreateReservation::route('/create'),
            // 'view' => Pages\ViewReservation::route('/{record}'),
            // 'edit' => Pages\EditReservation::route('/{record}/edit'),
        ];
    }
}
