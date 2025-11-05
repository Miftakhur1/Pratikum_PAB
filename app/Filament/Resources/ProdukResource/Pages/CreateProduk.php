<?php

namespace App\Filament\Resources\ProdukResource\Pages;

use App\Filament\Resources\ProdukResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduk extends CreateRecord
{
    protected static string $resource = ProdukResource::class;
    protected function getFormAction() :array{
        return[
            parent::getCreateFromAction()
            ->label(simpan)
            ->color('success')
            ->icon('heroico-o-check-circle')


        ];
    }
}
