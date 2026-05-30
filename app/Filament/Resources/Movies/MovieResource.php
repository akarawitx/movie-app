<?php

namespace App\Filament\Resources\Movies;

use App\Filament\Resources\Movies\Pages;
use App\Models\Movie;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MovieResource extends Resource
{
    protected static ?string $model = Movie::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-film';

    protected static ?string $navigationLabel = 'Movies';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('title')
                ->label('Title')
                ->required()
                ->maxLength(255),

            Select::make('genre')
                ->label('Genre')
                ->options([
                    'Action'    => 'Action',
                    'Comedy'    => 'Comedy',
                    'Drama'     => 'Drama',
                    'Horror'    => 'Horror',
                    'Sci-Fi'    => 'Sci-Fi',
                    'Romance'   => 'Romance',
                    'Thriller'  => 'Thriller',
                    'Animation' => 'Animation',
                ])
                ->required(),

            TextInput::make('year')
                ->label('Year')
                ->numeric()
                ->required()
                ->minValue(1900)
                ->maxValue(2100),

            TextInput::make('rating')
                ->label('Rating (0-10)')
                ->numeric()
                ->required()
                ->minValue(0)
                ->maxValue(10),

            Textarea::make('description')
                ->label('Description')
                ->rows(4)
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('genre')
                    ->label('Genre')
                    ->badge()
                    ->sortable(),

                TextColumn::make('year')
                    ->label('Year')
                    ->sortable(),

                TextColumn::make('rating')
                    ->label('Rating')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListMovies::route('/'),
            'create' => Pages\CreateMovie::route('/create'),
            'edit'   => Pages\EditMovie::route('/{record}/edit'),
        ];
    }
}