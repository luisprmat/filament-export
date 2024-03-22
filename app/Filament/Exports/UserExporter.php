<?php

namespace App\Filament\Exports;

use App\Models\User;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class UserExporter extends Exporter
{
    protected static ?string $model = User::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('name'),
            ExportColumn::make('email'),
            ExportColumn::make('email_verified_at'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = __('Your users export has completed and :rowsCount :rowsLabel exported.', [
            'rowsCount' => number_format($export->successful_rows),
            'rowsLabel' => str(__('row'))->plural($export->successful_rows),
        ]);

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' '.__(':failedRowsCount :failedRowsLabel failed to export.', [
                'failedRowsCount' => number_format($failedRowsCount),
                'failedRowsLabel' => str(__('row'))->plural($failedRowsCount),
            ]);
        }

        return $body;
    }
}
