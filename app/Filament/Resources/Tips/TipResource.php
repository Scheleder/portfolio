<?php

namespace App\Filament\Resources\Tips;

use App\Filament\Resources\Tips\Pages\CreateTip;
use App\Filament\Resources\Tips\Pages\EditTip;
use App\Filament\Resources\Tips\Pages\ListTips;
use App\Filament\Resources\Tips\Schemas\TipForm;
use App\Filament\Resources\Tips\Tables\TipsTable;
use App\Models\Tip;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TipResource extends Resource
{
    protected static ?string $model = Tip::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-light-bulb';

    protected static ?string $navigationLabel = 'Cards de Dicas';

    protected static ?string $modelLabel = 'Dica';

    protected static ?string $pluralModelLabel = 'Dicas';

    protected static string|\UnitEnum|null $navigationGroup = 'TechTips';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return TipForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TipsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ImagesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTips::route('/'),
            'create' => CreateTip::route('/create'),
            'edit' => EditTip::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery()->withoutGlobalScopes([
            SoftDeletingScope::class,
        ]);

        // Usuários não-administradores veem apenas os seus próprios cards
        if (! auth()->user()?->is_admin) {
            $query->where('user_id', auth()->id());
        }

        return $query;
    }
}
