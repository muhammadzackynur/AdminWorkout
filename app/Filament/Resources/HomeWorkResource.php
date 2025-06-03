<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomeWorkResource\Pages;
use App\Models\HomeWork;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\DeleteBulkAction;

class HomeWorkResource extends Resource
{
    protected static ?string $model = HomeWork::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_latihan')
                    ->label('Nama Latihan')
                    ->required()
                    ->maxLength(255),

                Select::make('kategori')
                    ->label('Kategori')
                    ->required()
                    ->options([
                        'Latihan Kardio' => 'Latihan Kardio',
                        'Latihan Kekuatan' => 'Latihan Kekuatan',
                        'Latihan Fleksibilitas & Mobilitas' => 'Latihan Fleksibilitas & Mobilitas',
                        'Latihan Keseimbangan dan Stabilitas' => 'Latihan Keseimbangan dan Stabilitas',
                        'HIIT' => 'HIIT (High Intensity Interval Training)',
                        'Latihan Ringan untuk Pemula / Rehabilitasi' => 'Latihan Ringan untuk Pemula / Rehabilitasi',
                    ]),

                Select::make('alat')
                    ->label('Alat')
                    ->required()
                    ->options([
                        'tanpa alat' => 'Tanpa Alat',
                        'dengan alat' => 'Dengan Alat',
                    ]),

                TextInput::make('sets')
                    ->label('Sets')
                    ->numeric()
                    ->minValue(1)
                    ->required(),

                TextInput::make('repetisi')
                    ->label('Repetisi')
                    ->numeric()
                    ->minValue(1)
                    ->required(),

                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->nullable(),

                FileUpload::make('image')
                    ->label('Gambar')
                    ->image()
                    ->disk('public')
                    ->directory('gambar-latihan')
                    ->preserveFilenames()
                    ->visibility('public'),

                FileUpload::make('video')
                    ->label('Video')
                    ->acceptedFileTypes(['video/mp4'])
                    ->maxSize(102400) // maksimal 100MB
                    ->disk('public')
                    ->directory('video-latihan')
                    ->preserveFilenames()
                    ->visibility('public'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Gambar')
                    ->disk('public')
                    ->height(60)
                    ->rounded(),

                TextColumn::make('nama_latihan')
                    ->label('Nama Latihan')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('kategori')
                    ->label('Kategori')
                    ->sortable(),

                TextColumn::make('alat')
                    ->label('Alat')
                    ->sortable(),

                TextColumn::make('sets')
                    ->label('Sets'),

                TextColumn::make('repetisi')
                    ->label('Repetisi'),

                TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(50),

                TextColumn::make('video')
                    ->label('Video')
                    ->limit(50),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHomeWorks::route('/'),
            'create' => Pages\CreateHomeWork::route('/create'),
            'edit' => Pages\EditHomeWork::route('/{record}/edit'),
        ];
    }
}
