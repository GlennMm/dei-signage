<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteSettingResource\Pages;
use App\Models\SiteSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SiteSettingResource extends Resource
{
    protected static ?string $model = SiteSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationGroup = 'System';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Setting Information')
                    ->schema([
                        Forms\Components\TextInput::make('key')
                            ->required()
                            ->unique(SiteSetting::class, 'key', ignoreRecord: true)
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('label')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\Select::make('group')
                            ->required()
                            ->options([
                                'general' => 'General',
                                'contact' => 'Contact Information',
                                'social' => 'Social Media',
                                'seo' => 'SEO Settings',
                                'email' => 'Email Settings',
                            ])
                            ->default('general'),
                        
                        Forms\Components\Select::make('type')
                            ->required()
                            ->options([
                                'text' => 'Text',
                                'textarea' => 'Textarea',
                                'rich_text' => 'Rich Text',
                                'image' => 'Image',
                                'url' => 'URL',
                                'email' => 'Email',
                                'phone' => 'Phone',
                                'boolean' => 'Boolean',
                                'json' => 'JSON',
                            ])
                            ->default('text')
                            ->live(),
                        
                        Forms\Components\Textarea::make('description')
                            ->maxLength(500)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Setting Value')
                    ->schema([
                        Forms\Components\TextInput::make('value')
                            ->required()
                            ->maxLength(65535)
                            ->visible(fn (Forms\Get $get): bool => in_array($get('type'), ['text', 'url', 'email', 'phone'])),
                        
                        Forms\Components\Textarea::make('value')
                            ->required()
                            ->rows(4)
                            ->visible(fn (Forms\Get $get): bool => $get('type') === 'textarea'),
                        
                        Forms\Components\RichEditor::make('value')
                            ->required()
                            ->visible(fn (Forms\Get $get): bool => $get('type') === 'rich_text'),
                        
                        Forms\Components\FileUpload::make('value')
                            ->required()
                            ->image()
                            ->directory('settings')
                            ->visible(fn (Forms\Get $get): bool => $get('type') === 'image'),
                        
                        Forms\Components\Toggle::make('value')
                            ->required()
                            ->visible(fn (Forms\Get $get): bool => $get('type') === 'boolean'),
                        
                        Forms\Components\KeyValue::make('value')
                            ->required()
                            ->visible(fn (Forms\Get $get): bool => $get('type') === 'json'),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('label')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('group')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'general' => 'gray',
                        'contact' => 'success',
                        'social' => 'primary',
                        'seo' => 'warning',
                        'email' => 'info',
                        default => 'gray',
                    }),
                
                Tables\Columns\TextColumn::make('type')
                    ->badge(),
                
                Tables\Columns\TextColumn::make('value')
                    ->limit(50)
                    ->wrap(),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('group')
                    ->options([
                        'general' => 'General',
                        'contact' => 'Contact Information',
                        'social' => 'Social Media',
                        'seo' => 'SEO Settings',
                        'email' => 'Email Settings',
                    ]),
                
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'text' => 'Text',
                        'textarea' => 'Textarea',
                        'rich_text' => 'Rich Text',
                        'image' => 'Image',
                        'url' => 'URL',
                        'email' => 'Email',
                        'phone' => 'Phone',
                        'boolean' => 'Boolean',
                        'json' => 'JSON',
                    ]),
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
            ->defaultSort('group', 'asc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiteSettings::route('/'),
            'create' => Pages\CreateSiteSetting::route('/create'),
            'view' => Pages\ViewSiteSetting::route('/{record}'),
            'edit' => Pages\EditSiteSetting::route('/{record}/edit'),
        ];
    }
}