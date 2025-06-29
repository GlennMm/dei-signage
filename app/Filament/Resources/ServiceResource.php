<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Service Information')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $context, $state, callable $set) => $context === 'create' ? $set('slug', Str::slug($state)) : null)
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->unique(Service::class, 'slug', ignoreRecord: true)
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
                        
                        Forms\Components\Textarea::make('short_description')
                            ->label('Short Description')
                            ->maxLength(500)
                            ->helperText('Brief description for cards and previews'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Content')
                    ->schema([
                        Forms\Components\RichEditor::make('description')
                            ->required()
                            ->columnSpanFull(),
                        
                        Forms\Components\Repeater::make('features')
                            ->schema([
                                Forms\Components\TextInput::make('feature')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->addActionLabel('Add Feature')
                            ->collapsible()
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Media & Settings')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Service Image')
                            ->image()
                            ->directory('services')
                            ->maxSize(5120) // 5MB
    ->acceptedFileTypes(['image/jpeg', 'image/jpg', 'image/png', 'image/webp']),
                        
                        Forms\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0)
                            ->helperText('Lower numbers appear first'),
                        
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                        
                        Forms\Components\Toggle::make('is_featured')
                            ->label('Featured')
                            ->default(false),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->circular(),
                
                Tables\Columns\TextColumn::make('title')
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
                
                Tables\Columns\TextColumn::make('sort_order')
                    ->numeric()
                    ->sortable(),
                
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean()
                    ->label('Featured'),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active'),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'illuminated' => 'Illuminated Signs',
                        'dibond' => 'Dibond Signs',
                        'gate' => 'Gate Signs',
                        'office' => 'Office Branding',
                        'exhibition' => 'Exhibition Materials',
                        'informative' => 'Informative Signs',
                    ]),
                
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Featured'),
                
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active'),
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'view' => Pages\ViewService::route('/{record}'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}