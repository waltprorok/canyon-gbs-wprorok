<?php

namespace App\Filament\Pages;

use App\Models\Advisor;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class Advisors extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $model = Advisor::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static string $view = 'filament.pages.advisors';

    public function table(Table $table): Table
    {
        return $table
            ->query(Advisor::query())
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable()
            ])
            ->filters([])
            ->actions([
                EditAction::make()
                    ->form([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(50),
                        TextInput::make('email')
                            ->required()
                            ->maxLength(50),
                    ]),
                DeleteAction::make(),
            ])
            ->bulkActions([]);
    }
}
