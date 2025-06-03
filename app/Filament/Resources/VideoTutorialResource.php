<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VideoTutorialResource\Pages;
use App\Models\VideoTutorial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class VideoTutorialResource extends Resource
{
    protected static ?string $model = VideoTutorial::class;

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('judul')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255),

                TextInput::make('link')
                    ->label('Link Video')
                    ->url()
                    ->required()
                    ->maxLength(255),

                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')->label('Judul')->sortable()->searchable(),
                TextColumn::make('link')->label('Link')->limit(50),
                TextColumn::make('deskripsi')->label('Deskripsi')->limit(50),
                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVideoTutorials::route('/'),
            'create' => Pages\CreateVideoTutorial::route('/create'),
            'edit' => Pages\EditVideoTutorial::route('/{record}/edit'),
        ];
    }
}
