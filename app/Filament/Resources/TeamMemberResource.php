<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamMemberResource\Pages;
use App\Models\TeamMember;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TeamMemberResource extends Resource
{
    protected static ?string $model = TeamMember::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Company Information';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Personal Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('position')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\FileUpload::make('photo')
                            ->image()
                            ->directory('team')
                            ->maxSize(5120),
                        
                        Forms\Components\Textarea::make('bio')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Contact Information')
                    ->schema([
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->maxLength(255),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Social Media')
                    ->schema([
                        Forms\Components\Repeater::make('social_links')
                            ->schema([
                                Forms\Components\Select::make('platform')
                                    ->options([
                                        'linkedin' => 'LinkedIn',
                                        'facebook' => 'Facebook',
                                        'twitter' => 'Twitter',
                                        'instagram' => 'Instagram',
                                    ])
                                    ->required(),
                                Forms\Components\TextInput::make('url')
                                    ->url()
                                    ->required(),
                            ])
                            ->columns(2)
                            ->addActionLabel('Add Social Link')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Settings')
                    ->schema([
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
                Tables\Columns\ImageColumn::make('photo')
                    ->circular(),
                
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('position')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('phone'),
                
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
            'index' => Pages\ListTeamMembers::route('/'),
            'create' => Pages\CreateTeamMember::route('/create'),
            'view' => Pages\ViewTeamMember::route('/{record}'),
            'edit' => Pages\EditTeamMember::route('/{record}/edit'),
        ];
    }
}