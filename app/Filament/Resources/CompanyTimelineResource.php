<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyTimelineResource\Pages;
use App\Models\CompanyTimeline;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CompanyTimelineResource extends Resource
{
    protected static ?string $model = CompanyTimeline::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationGroup = 'Company Information';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Timeline Event')
                    ->schema([
                        Forms\Components\TextInput::make('year')
                            ->required()
                            ->maxLength(10),
                        
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),
                        
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->directory('timeline')
                            ->maxSize(5120),
                        
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
                Tables\Columns\TextColumn::make('year')
                    ->sortable()
                    ->badge()
                    ->color('primary'),
                
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('description')
                    ->limit(50)
                    ->wrap(),
                
                Tables\Columns\ImageColumn::make('image')
                    ->circular(),
                
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
            'index' => Pages\ListCompanyTimelines::route('/'),
            'create' => Pages\CreateCompanyTimeline::route('/create'),
            'view' => Pages\ViewCompanyTimeline::route('/{record}'),
            'edit' => Pages\EditCompanyTimeline::route('/{record}/edit'),
        ];
    }
}