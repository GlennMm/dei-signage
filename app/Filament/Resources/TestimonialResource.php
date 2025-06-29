<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Testimonial Content')
                    ->schema([
                        Forms\Components\Textarea::make('content')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),
                        
                        Forms\Components\Select::make('rating')
                            ->required()
                            ->options([
                                5 => '⭐⭐⭐⭐⭐ (5 Stars)',
                                4 => '⭐⭐⭐⭐ (4 Stars)',
                                3 => '⭐⭐⭐ (3 Stars)',
                                2 => '⭐⭐ (2 Stars)',
                                1 => '⭐ (1 Star)',
                            ])
                            ->default(5),
                    ]),

                Forms\Components\Section::make('Client Information')
                    ->schema([
                        Forms\Components\TextInput::make('client_name')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('client_position')
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('client_company')
                            ->maxLength(255),
                        
                        Forms\Components\FileUpload::make('client_photo')
                            ->label('Client Photo')
                            ->image()
                            ->directory('testimonials')
                            ->maxSize(5120),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Settings')
                    ->schema([
                        Forms\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                        
                        Forms\Components\Toggle::make('is_featured')
                            ->label('Featured')
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
                Tables\Columns\ImageColumn::make('client_photo')
                    ->circular(),
                
                Tables\Columns\TextColumn::make('client_name')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('client_company')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('content')
                    ->limit(50)
                    ->wrap(),
                
                Tables\Columns\TextColumn::make('rating')
                    ->formatStateUsing(fn (int $state): string => str_repeat('⭐', $state)),
                
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean(),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('rating')
                    ->options([
                        5 => '5 Stars',
                        4 => '4 Stars',
                        3 => '3 Stars',
                        2 => '2 Stars',
                        1 => '1 Star',
                    ]),
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
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'view' => Pages\ViewTestimonial::route('/{record}'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}