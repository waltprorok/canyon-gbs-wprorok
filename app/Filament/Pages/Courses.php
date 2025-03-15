<?php

namespace App\Filament\Pages;

use App\Models\Course;
use Filament\Pages\Page;
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
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('advisors.name')
            ])
            ->filters([])
            ->actions([])
            ->bulkActions([]);
    }
}
