<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientResource\Pages;
use App\Models\Client;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Client Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $context, $state, callable $set) => $context === 'create' ? $set('slug', Str::slug($state)) : null)
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->unique(Client::class, 'slug', ignoreRecord: true)
                            ->maxLength(255),
                        
                        Forms\Components\Select::make('industry')
                            ->required()
                            ->options([
                                'finance' => 'Finance & Banking',
                                'hospitality' => 'Hospitality & Tourism',
                                'retail' => 'Retail & Commerce',
                                'healthcare' => 'Healthcare',
                                'education' => 'Education',
                                'technology' => 'Technology',
                                'manufacturing' => 'Manufacturing',
                                'real_estate' => 'Real Estate',
                                'automotive' => 'Automotive',
                                'other' => 'Other',
                            ]),
                        
                        Forms\Components\TextInput::make('website')
                            ->url()
                            ->maxLength(255),
                        
                        Forms\Components\DatePicker::make('partnership_date'),
                        
                        Forms\Components\FileUpload::make('logo')
                            ->image()
                            ->directory('clients')
                            ->maxSize(5120),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Project Details')
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->rows(4)
                            ->columnSpanFull(),
                        
                        Forms\Components\Repeater::make('services_provided')
                            ->schema([
                                Forms\Components\TextInput::make('service')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->addActionLabel('Add Service')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Settings')
                    ->schema([
                        Forms\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                        
                        Forms\Components\Toggle::make('is_featured')
                            ->label('Featured Client')
                            ->default(false),
                        
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ])
                    ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo')
                    ->circular(),
                
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('industry')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'finance' => 'success',
                        'hospitality' => 'warning',
                        'retail' => 'info',
                        'healthcare' => 'danger',
                        'education' => 'primary',
                        'technology' => 'secondary',
                        default => 'gray',
                    }),
                
                Tables\Columns\TextColumn::make('partnership_date')
                    ->date()
                    ->sortable(),
                
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean(),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('industry'),
                Tables\Filters\TernaryFilter::make('is_featured'),
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
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'view' => Pages\ViewClient::route('/{record}'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }
}