<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait GeneratesDocumentNumbers
{
    /**
     * Generar un número correlativo robusto para documentos.
     * 
     * @param string $prefix Prefijo del documento (ej: 'ORD', 'NC')
     * @param string $column Columna donde se guarda el número
     * @param int $length Longitud del correlativo numérico
     * @return string
     */
    public static function generateNextNumber(string $prefix, string $column = 'numero_orden', int $length = 4): string
    {
        $date = date('Ymd');
        $pattern = "{$prefix}-{$date}-%";
        
        // Obtener el último número generado hoy
        $lastRecord = self::where($column, 'like', $pattern)
            ->orderBy($column, 'desc')
            ->first();

        if (!$lastRecord) {
            $next = 1;
        } else {
            $lastNumber = (int) substr($lastRecord->$column, -($length));
            $next = $lastNumber + 1;
        }

        return "{$prefix}-{$date}-" . str_pad($next, $length, '0', STR_PAD_LEFT);
    }
}
