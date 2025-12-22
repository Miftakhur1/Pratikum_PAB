<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdukResource\Pages;
use App\Filament\Resources\ProdukResource\RelationManagers;
use App\Models\Produk;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('namabarang')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('kodebarang')
                    ->required()
                    ->maxLength(10),
                Forms\Components\DatePicker::make('tanggal_masuk')
                    ->required(),
                Forms\Components\TextInput::make('quantity')
                    ->label('jumlah')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('price')
                    ->label('harga')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
                forms\Components\Select::make('tags')
                    ->label('Tags')
                    ->relationship('tags', 'namatags')
                    ->preload(),
                
                Forms\Components\Select::make('kategoris')
                    ->label('Kategori')
                    ->multiple()
                    ->relationship('kategoris', 'nama_kategori')
                    ->preload(),
                Forms\Components\SpatieMediaLibraryFileUpload::make('gambar')
                    ->image()
                    ->required()
                    ->collection('gambar'),
                    Forms\Components\Textarea::make('produk_deskripsi_short')
                    ->required()
                    ->label('Deskripsi Singkat')
                    ->maxLength(255),
                Forms\Components\RichEditor::make('produk_deskripsi_long')
                   ->required()
                     ->label('Deskripsi Lengkap')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                tables\Columns\SpatieMediaLibraryImageColumn::make('gambar')
                ->collection('gambar')
                ->circular(),
                Tables\Columns\TextColumn::make('namabarang')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kodebarang')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_masuk')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantity')
                    ->label('jumlah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('harga')
                    ->money('idr', true)
                    
                    ->sortable(),
                Tables\Columns\TextColumn::make('tags.namatags')
                    ->badge()
                    ->color('primary'),
                Tables\Columns\TextColumn::make('kategoris.nama_kategori')
                    ->badge()
                    ->color('success'),
                tables\Columns\TextColumn::make('produk_deskripsi_short')
                    ->limit(30),
                // tables\Columns\TextColumn::make('produk_deskripsi_long')
                //     ->limit(100),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                    
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'edit' => Pages\EditProduk::route('/{record}/edit'),
        ];
    }
}
