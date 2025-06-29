<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactSubmissionResource\Pages;
use App\Models\ContactSubmission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Notifications\Notification;

class ContactSubmissionResource extends Resource
{
    protected static ?string $model = ContactSubmission::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationGroup = 'Communications';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationBadge = null;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('is_read', false)->count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Contact Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->disabled(),
                        
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->disabled(),
                        
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->maxLength(255)
                            ->disabled(),
                        
                        Forms\Components\TextInput::make('subject')
                            ->required()
                            ->maxLength(255)
                            ->disabled(),
                        
                        Forms\Components\TextInput::make('service_interest')
                            ->maxLength(255)
                            ->disabled(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Message')
                    ->schema([
                        Forms\Components\Textarea::make('message')
                            ->required()
                            ->rows(4)
                            ->disabled()
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Admin Actions')
                    ->schema([
                        Forms\Components\Textarea::make('admin_notes')
                            ->rows(3)
                            ->columnSpanFull(),
                        
                        Forms\Components\Toggle::make('is_read')
                            ->label('Mark as Read'),
                        
                        Forms\Components\Toggle::make('is_replied')
                            ->label('Mark as Replied'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\IconColumn::make('is_read')
                    ->boolean()
                    ->trueIcon('heroicon-o-envelope-open')
                    ->falseIcon('heroicon-o-envelope')
                    ->label('Status'),
                
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('subject')
                    ->searchable()
                    ->limit(30),
                
                Tables\Columns\TextColumn::make('service_interest')
                    ->badge(),
                
                Tables\Columns\IconColumn::make('is_replied')
                    ->boolean()
                    ->label('Replied'),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Received'),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_read')
                    ->label('Read Status'),
                
                Tables\Filters\TernaryFilter::make('is_replied')
                    ->label('Reply Status'),
                
                Tables\Filters\SelectFilter::make('service_interest')
                    ->options([
                        '2D Signs' => '2D Signs on Dibond',
                        '3D Illuminated Signs' => '3D Illuminated Signs',
                        'Gate Signs' => 'Customized Gate Signs',
                        'Informative Signs' => 'Informative Signs',
                        'Desk Branding' => 'Desk Branding',
                        'Exhibition Materials' => 'Exhibition Materials',
                        'Other' => 'Other Services',
                    ]),
            ])
            ->actions([
                Tables\Actions\Action::make('markAsRead')
                    ->icon('heroicon-o-envelope-open')
                    ->action(function (ContactSubmission $record): void {
                        $record->markAsRead();
                        Notification::make()
                            ->title('Marked as read')
                            ->success()
                            ->send();
                    })
                    ->visible(fn (ContactSubmission $record): bool => !$record->is_read),
                
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('markAsRead')
                        ->label('Mark as Read')
                        ->icon('heroicon-o-envelope-open')
                        ->action(function ($records): void {
                            $records->each->markAsRead();
                            Notification::make()
                                ->title('Marked as read')
                                ->success()
                                ->send();
                        }),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactSubmissions::route('/'),
            'view' => Pages\ViewContactSubmission::route('/{record}'),
            'edit' => Pages\EditContactSubmission::route('/{record}/edit'),
        ];
    }
}