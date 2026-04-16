<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, Searchable, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nombre', 'codigo_oem', 'stock_actual', 'precio_mayor', 'costo_compra', 'activo', 'ubicacion_almacen'])
            ->logOnlyDirty()
            ->useLogName('inventario')
            ->dontSubmitEmptyLogs();
    }

    protected $fillable = [
        'foto_path',
        'codigo_oem',
        'codigo_interno',
        'nombre',
        'marca',
        'categoria',
        'fabricante',
        'material',
        'espesor',
        'medidas',
        'stock_actual',
        'stock_calculado',
        'stock_minimo',
        'costo_compra',
        'precio_mayor',
        'precio_detal',
        'activo',
        'is_development',
        'development_notes',
        'ubicacion_almacen',
        'fecha_incorporacion',
    ];

    /**
     * Motor de búsqueda inteligente "Zenith AI"
     * Busca con pesos de relevancia en múltiples campos.
     */
    public function scopeSmartSearch($query, $term)
    {
        if (empty($term)) return $query;

        return $query->where(function ($q) use ($term) {
            $q->where('nombre', 'LIKE', "%{$term}%")
              ->orWhere('codigo_oem', 'LIKE', "%{$term}%")
              ->orWhere('codigo_interno', 'LIKE', "%{$term}%")
              ->orWhere('categoria', 'LIKE', "%{$term}%")
              ->orWhere('marca', 'LIKE', "%{$term}%")
              ->orWhere('fabricante', 'LIKE', "%{$term}%");
        });
    }

    /**
     * Relación con los movimientos de stock (Kardex)
     */
    public function movements()
    {
        return $this->hasMany(StockMovement::class);
    }
}
