<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static bool $shouldRegisterNavigation = true;


    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('name')
            ->required()
            ->maxLength(255),
        Forms\Components\TextInput::make('email')
            ->email()
            ->unique('users', 'email', ignorable: fn ($record) => $record ? $record : null)
            ->required()
            ->maxLength(255),
        Forms\Components\TextInput::make('password')
            ->nullable()
            ->password()
            ->dehydrateStateUsing(fn (mixed $state) => $state ? Hash::make($state) : $state)
            ->maxLength(255),


            Select::make('roles')->multiple()->relationship('roles', 'name'),
                  ]);


    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('id')->label('Id')
            ->searchable(isIndividual: true, isGlobal: false),
        Tables\Columns\TextColumn::make('name')
            ->searchable(isIndividual: true, isGlobal: false),
        Tables\Columns\TextColumn::make('email')
            ->searchable(isIndividual: true, isGlobal: false),
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
                                Forms\Components\TextInput::make('email')->unique()->email()->required(),
                                Forms\Components\Select::make('roles')->multiple()->relationship('roles', 'name')->required(),
                            ])->columns(1),
                            ]),

                Tables\Actions\EditAction::make()
                    ->using(function (array $data, string $model) {
                        $companies = $data['company'];
                        unset($data['company']);
                        if (is_null($data['password'])) {
                            unset($data['password']);
                        }
                        unset($data['password_confirmation']);
                        $user = User::where('email', $data['email'])->first();
                        if ($user) {
                            $user->update($data);
                            $user->companies()->sync($companies);
                        }

                        return $user;
                    })
                   ->hidden(function (User $user) {
                        return $user->isSuperAdmin();
                    }),
                Tables\Actions\DeleteAction::make()->hidden(function (User $user) {
                    return $user->isSuperAdmin();
                }),
                Tables\Actions\ForceDeleteAction::make()->hidden(function (User $user) {
                    return $user->isSuperAdmin();
                }),
                Tables\Actions\RestoreAction::make()->hidden(function (User $user) {
                    return $user->isSuperAdmin();
                }),
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
            'index' => Pages\ManageUsers::route('/'),
        ];
    }
}
