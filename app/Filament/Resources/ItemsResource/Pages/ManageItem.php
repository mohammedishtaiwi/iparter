<?php


namespace App\Filament\Resources\ItemsResource\Pages;

use App\Filament\Resources\ItemResource;
use App\Models\User;
use App\Models\Item;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Filament\Forms\Components\Grid;
use Filament\Forms;
use Filament\Forms\Components\Select;

class ManageItem extends ManageRecords
{
    protected static string $resource = ItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->form([
                Grid::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('price')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Select::make('seller')
                            ->searchable()
                            ->columnSpanFull()
                            ->options(User::all()->pluck('name', 'id')),
                    ])->columns(1),
            ])->using(function (array $data): Item {
                $sellers = $data['seller'];
                unset($data['seller']);
                $item = Item::create($data);

                $sellers =  User::where('id', $sellers)->get();



                $item->users()->attach($sellers);
                
                return $item;
            }),
        ];
    }
}
