<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioResource\Pages;
use App\Models\Portfolio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PortfolioResource extends Resource
{
    protected static ?string $model = Portfolio::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Project Information')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $context, $state, callable $set) => $context === 'create' ? $set('slug', Str::slug($state)) : null)
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->unique(Portfolio::class, 'slug', ignoreRecord: true)
                            ->maxLength(255),
                        
                        Forms\Components\Select::make('category')
                            ->required()
                            ->options([
                                'illuminated' => 'Illuminated Signs',
                                'dibond' => 'Dibond Signs',
                                'gate' => 'Gate Signs',
                                'office' => 'Office Branding',
                                'exhibition' => 'Exhibition Materials',
                                'informative' => 'Informative Signs',
                            ]),
                        
                        Forms\Components\TextInput::make('client_name')
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('project_location')
                            ->maxLength(255),
                        
                        Forms\Components\DatePicker::make('completion_date'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Project Details')
                    ->schema([
                        Forms\Components\Textarea::make('short_description')
                            ->label('Short Description')
                            ->maxLength(500)
                            ->helperText('Brief description for portfolio grid'),
                        
                        Forms\Components\RichEditor::make('description')
                            ->required()
                            ->columnSpanFull(),
                        
                        Forms\Components\Repeater::make('services_provided')
                            ->schema([
                                Forms\Components\TextInput::make('service')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->addActionLabel('Add Service')
                            ->collapsible()
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Media & Gallery')
                    ->schema([
                        Forms\Components\FileUpload::make('featured_image')
                            ->label('Featured Image')
                            ->image()
                            ->directory('portfolio/featured')
                            ->maxSize(5120),
                        
                        Forms\Components\FileUpload::make('images')
                            ->label('Project Gallery')
                            ->image()
                            ->multiple()
                            ->directory('portfolio/gallery')
                            ->maxSize(5120)
                            ->reorderable()
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Settings')
                    ->schema([
                        Forms\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0)
                            ->helperText('Lower numbers appear first'),
                        
                        Forms\Components\Toggle::make('is_featured')
                            ->label('Featured Project')
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
                Tables\Columns\ImageColumn::make('featured_image')
                    ->circular(),
                
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('client_name')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'illuminated' => 'warning',
                        'dibond' => 'success',
                        'gate' => 'info',
                        'office' => 'primary',
                        'exhibition' => 'secondary',
                        'informative' => 'gray',
                        default => 'gray',
                    }),
                
                Tables\Columns\TextColumn::make('completion_date')
                    ->date()
                    ->sortable(),
                
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean()
                    ->label('Featured'),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category'),
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
            'index' => Pages\ListPortfolios::route('/'),
            'create' => Pages\CreatePortfolio::route('/create'),
            'view' => Pages\ViewPortfolio::route('/{record}'),
            'edit' => Pages\EditPortfolio::route('/{record}/edit'),
        ];
    }
}