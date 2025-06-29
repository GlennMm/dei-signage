<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FAQResource\Pages;
use App\Models\FAQ;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FAQResource extends Resource
{
    protected static ?string $model = FAQ::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('FAQ Content')
                    ->schema([
                        Forms\Components\TextInput::make('question')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        
                        Forms\Components\RichEditor::make('answer')
                            ->required()
                            ->columnSpanFull(),
                        
                        Forms\Components\Select::make('category')
                            ->required()
                            ->options([
                                'general' => 'General',
                                'services' => 'Services',
                                'contact' => 'Contact',
                                'pricing' => 'Pricing',
                                'process' => 'Process',
                                'technical' => 'Technical',
                            ])
                            ->default('general'),
                        
                        Forms\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                        
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
                Tables\Columns\TextColumn::make('question')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                
                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'general' => 'gray',
                        'services' => 'primary',
                        'contact' => 'success',
                        'pricing' => 'warning',
                        'process' => 'info',
                        'technical' => 'secondary',
                        default => 'gray',
                    }),
                
                Tables\Columns\TextColumn::make('sort_order')
                    ->numeric()
                    ->sortable(),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'general' => 'General',
                        'services' => 'Services',
                        'contact' => 'Contact',
                        'pricing' => 'Pricing',
                        'process' => 'Process',
                        'technical' => 'Technical',
                    ]),
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
            'index' => Pages\ListFAQS::route('/'),
            'create' => Pages\CreateFAQ::route('/create'),
            'view' => Pages\ViewFAQ::route('/{record}'),
            'edit' => Pages\EditFAQ::route('/{record}/edit'),
        ];
    }
}