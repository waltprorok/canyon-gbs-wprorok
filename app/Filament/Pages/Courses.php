<?php

namespace App\Filament\Pages;

use App\Models\Advisor;
use App\Models\Course;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class Courses extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-beaker';

    protected static string $view = 'filament.pages.courses';

    public function table(Table $table): Table
    {
        return $table
            ->query(Course::query())
            ->headerActions([
                CreateAction::make()
                    ->form([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(100),
                    ]),
            ])
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('advisors.name')
            ])
            ->filters([])
            ->actions([
                CreateAction::make()
                    ->model(Course::class)
                    ->form([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(100),
                    ]),
                ViewAction::make()
                    ->form([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                    ]),
                EditAction::make()
                    ->form([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(100),
                    ]),
                DeleteAction::make(),
            ])
            ->bulkActions([]);
    }
}
