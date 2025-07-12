<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuMakananResource\Pages;
use App\Models\MenuMakanan;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select; // Import Select
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class MenuMakananResource extends Resource
{
    protected static ?string $model = MenuMakanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_makanan')
                    ->label('Nama Makanan')
                    ->required()
                    ->maxLength(255),

                TextInput::make('kalori')
                    ->label('Kalori')
                    ->numeric()
                    ->required(),

                // Add the Select component for 'kategori'
                Select::make('kategori')
                    ->label('Kategori')
                    ->options([
                        'Bulking (Penambah Massa Otot)' => 'Bulking (Penambah Massa Otot)',
                        'Cutting / Diet (Penurunan Lemak Tubuh)' => 'Cutting / Diet (Penurunan Lemak Tubuh)',
                    ])
                    ->required(), // Make it required if a category must be selected

                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->nullable(),

                Textarea::make('bahan')
                    ->label('Bahan')
                    ->nullable(),

                FileUpload::make('image')
                    ->label('Gambar')
                    ->image()
                    ->directory('menu-makanan') // Simpan di storage/app/public/menu-makanan
                    ->visibility('public') // Agar dapat diakses publik
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_makanan')->label('Nama Makanan')->sortable()->searchable(),
                TextColumn::make('kalori')->label('Kalori')->sortable(),
                TextColumn::make('kategori')->label('Kategori')->sortable()->searchable(), // Add Kategori column
                TextColumn::make('deskripsi')->label('Deskripsi')->limit(50),
                TextColumn::make('bahan')->label('Bahan')->limit(50),
                ImageColumn::make('image')
                    ->label('Gambar')
                    ->disk('public') // storage/app/public
                    ->visibility('public')
                    ->height(60)
                    ->rounded(),
                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                \Filament\Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                \Filament\Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenuMakanans::route('/'),
            'create' => Pages\CreateMenuMakanan::route('/create'),
            'edit' => Pages\EditMenuMakanan::route('/{record}/edit'),
        ];
    }
}