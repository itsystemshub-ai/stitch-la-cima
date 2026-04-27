<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_active',
        'modulos',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'is_active' => 'boolean',
            'modulos' => 'array',
        ];
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function isCliente(): bool
    {
        return $this->role === 'cliente';
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isTrabajador(): bool
    {
        return $this->role === 'trabajador';
    }

    public function isVendedor(): bool
    {
        return $this->role === 'vendedor';
    }

    public function puedeAccederModulo(string $modulo): bool
    {
        if ($this->isAdmin()) {
            return true;
        }

        if ($this->role === 'cliente') {
            return false;
        }

        $modulos = $this->modulos ?? [];

        return in_array($modulo, $modulos);
    }

    public function getModulos(): array
    {
        if ($this->isAdmin()) {
            return ['inventario', 'ventas', 'compras', 'contabilidad', 'rrhh', 'configuracion', 'finanzas', 'aprobaciones', 'ayuda', 'pos'];
        }

        return $this->modulos ?? [];
    }

    public function tieneAccesoCompleto(): bool
    {
        return $this->isAdmin();
    }
}
