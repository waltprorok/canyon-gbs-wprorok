<?php

namespace App\Filament\Pages;


use App\Models\Advisor;
use App\Models\Course;
use App\Models\Student;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\EditAction;
use Filament\Pages\Page;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

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
            ->headerActions([
                CreateAction::make()
                    ->model(Student::class)
                    ->form([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(50),
                        TextInput::make('email')
                            ->required()
                            ->maxLength(75),
                        Textarea::make('bio')
                            ->required()
                            ->maxLength(255),
                        DatePicker::make('date_of_birth')
                            ->required(),
                        Select::make('course_id')
                            ->label('Course')
                            ->multiple()
                            ->relationship(name: 'studentCourses', titleAttribute: 'name')
                            ->options(Course::all()->pluck('name', 'id'))
                            ->searchable(),
                        SpatieMediaLibraryFileUpload::make('avatar')
                    ]),
            ])
            ->columns([
                SpatieMediaLibraryImageColumn::make('avatar')
                    ->conversion('thumb'),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('date_of_birth'),
                TextColumn::make('studentCourses.advisors.name'),
                TextColumn::make('studentCourses.name'),
            ])
            ->defaultSort('name')
            ->filters([])
            ->actions([
                ViewAction::make()
                    ->form([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(50),
                        TextInput::make('email')
                            ->required()
                            ->maxLength(75),
                        Textarea::make('bio')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('date_of_birth')
                            ->required()
                            ->maxLength(20),
                        Select::make('course_id')
                            ->label('Course')
                            ->multiple()
                            ->relationship(name: 'studentCourses', titleAttribute: 'name')
                            ->options(Course::all()->pluck('name', 'id')),
                        SpatieMediaLibraryFileUpload::make('avatar'),
                    ]),
                EditAction::make()
                    ->form([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(50),
                        TextInput::make('email')
                            ->required()
                            ->maxLength(50),
                        TextInput::make('bio')
                            ->required()
                            ->maxLength(180),
                        Select::make('course_id')
                            ->label('Course')
                            ->multiple()
                            ->relationship(name: 'studentCourses', titleAttribute: 'name')
                            ->options(Course::all()->pluck('name', 'id'))
                            ->searchable(),
                        SpatieMediaLibraryFileUpload::make('avatar'),
                    ]),
                DeleteAction::make(),
            ])
            ->bulkActions([]);
    }
}
