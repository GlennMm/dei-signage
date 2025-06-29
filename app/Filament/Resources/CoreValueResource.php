<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CoreValueResource\Pages;
use App\Models\CoreValue;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CoreValueResource extends Resource
{
    protected static ?string $model = CoreValue::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';

    protected static ?string $navigationGroup = 'Company Information';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Core Value')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),
                        
                        Forms\Components\TextInput::make('icon')
                            ->maxLength(255)
                            ->helperText('CSS class or emoji for the icon'),
                        
                        Forms\Components\ColorPicker::make('color')
                            ->helperText('Hex color code for the value theme'),
                        
                        Forms\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0)
                            ->helperText('Lower numbers appear first'),
                        
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('description')
                    ->limit(50)
                    ->wrap(),
                
                Tables\Columns\TextColumn::make('icon')
                    ->label('Icon'),
                
                Tables\Columns\ColorColumn::make('color'),
                
                Tables\Columns\TextColumn::make('sort_order')
                    ->numeric()
                    ->sortable(),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order', 'asc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCoreValues::route('/'),
            'create' => Pages\CreateCoreValue::route('/create'),
            'view' => Pages\ViewCoreValue::route('/{record}'),
            'edit' => Pages\EditCoreValue::route('/{record}/edit'),
        ];
    }
}