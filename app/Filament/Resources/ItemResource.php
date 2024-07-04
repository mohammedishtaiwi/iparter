<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ItemsResource\Pages;
use App\Models\Item;
use App\Models\Items;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\ActionGroup;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
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
                ->required()
                ->columnSpanFull()
                ->options(User::all()->pluck('name', 'id')),
            
            
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('Id'),
                Tables\Columns\TextColumn::make('name')->label('name'),
                Tables\Columns\TextColumn::make('price')->label('price'),


            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make()
                    ->form([
                        Grid::make()
                            ->schema([
                                Forms\Components\TextInput::make('name'),
                                Forms\Components\TextInput::make('price')->required(),
                                Forms\Components\Select::make('user_id')->label('Seller')->multiple()->relationship('users', 'name')->required(),
                            ])->columns(1),
                    ])->mutateRecordDataUsing(function (array $data): array {

                        $user = User::where('id',$data['id'])->first();
                        if ($user) {
                            $data['seller'] = $user->items->pluck('name');
                            

                        }
                        $data['seller'] = User::where('id', $data['id'])->first()->items->pluck('name');

                        return $data;
                    }),
                Tables\Actions\EditAction::make()
                
                ->using(function (array $data) {
                    $seller = $data['seller'];
                    unset($data['seller']);
                    
                    $items = item::where('name', $data['name'])->first();
                    if ($items) {
                        $items->update($data);
                        $items->users()->sync($seller);
                    }

                    return $items;
                })
                ->mutateRecordDataUsing(function (array $data): array {
                    $item = Item::find($data['id']);

                    if ($item) {
                        $data['seller'] = $item->users->pluck('id','name')->first();
                    }


                    return $data;
                }),
                
                Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageItem::route('/'),
        ];
    }
}
