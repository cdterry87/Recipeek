<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Enums\Icons;
use Filament\Tables;
use App\Models\Recipe;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Resources\RecipeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RecipeResource\RelationManagers;
use App\Filament\Resources\RecipeResource\RelationManagers\IngredientsRelationManager;
use App\Filament\Resources\RecipeResource\RelationManagers\InstructionsRelationManager;

class RecipeResource extends Resource
{
    protected static ?string $model = Recipe::class;

    protected static ?string $navigationIcon = Icons::Recipes->value;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('prep_hours')
                    ->numeric(),
                Forms\Components\TextInput::make('prep_minutes')
                    ->numeric(),
                Forms\Components\TextInput::make('cook_hours')
                    ->numeric(),
                Forms\Components\TextInput::make('cook_minutes')
                    ->numeric(),
                Forms\Components\TextInput::make('servings')
                    ->numeric(),
                Forms\Components\TextInput::make('calories')
                    ->numeric(),
                Forms\Components\Textarea::make('image')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('video')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('private')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\IconColumn::make('private')
                    ->boolean(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Recipe Details')
                    ->schema([
                        TextEntry::make('title'),
                        TextEntry::make('description'),
                    ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            IngredientsRelationManager::class,
            InstructionsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRecipes::route('/'),
            'create' => Pages\CreateRecipe::route('/create'),
            'edit' => Pages\EditRecipe::route('/{record}/edit'),
            'view' => Pages\ViewRecipe::route('/{record}'),
        ];
    }
}
