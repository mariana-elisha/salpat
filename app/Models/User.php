<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
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
        'id_number',
        'nationality',
        'age',
        'gender',
        'phone',
        'address',
    ];

    /**
     * Check if user has a specific role.
     */
    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }

    /**
     * Check if user is admin.
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Check if user is receptionist.
     */
    public function isReceptionist(): bool
    {
        return $this->role === 'receptionist';
    }

    /**
     * Check if user is manager.
     */
    public function isManager(): bool
    {
        return $this->role === 'manager';
    }

    /**
     * Check if user is chef.
     */
    public function isChef(): bool
    {
        return $this->role === 'chef';
    }

    /**
     * Check if user is housekeeping.
     */
    public function isHousekeeping(): bool
    {
        return $this->role === 'housekeeping';
    }

    /**
     * Check if user is barkeeper.
     */
    public function isBarKeeper(): bool
    {
        return $this->role === 'barkeeper';
    }

    /**
     * Check if user is regular user.
     */
    public function isUser(): bool
    {
        return $this->role === 'user';
    }

    public function bookings()
    {
        return $this->hasMany(\App\Models\Booking::class);
    }

    public function serviceOrders()
    {
        return $this->hasMany(\App\Models\ServiceOrder::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
