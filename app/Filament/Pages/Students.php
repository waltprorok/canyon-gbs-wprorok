<?php

namespace App\Filament\Pages;

use App\Models\Student;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class Students extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static string $view = 'filament.pages.students';

    public function table(Table $table): Table
    {
        return $table
            ->query(Student::query())
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('bio'),
                TextColumn::make('date_of_birth'),
            ])
            ->filters([])
            ->actions([])
            ->bulkActions([]);
    }
}
