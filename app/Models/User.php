<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'mobile', 'email_verified', 'email_verification_token', 'code', 'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
     public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function brand()
    {
        return $this->hasOne(Brand::class);
    }
    public function category()
    {
        return $this->hasOne(Category::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
     public function orderProcessed()
    {
        return $this->hasMany(Order::class);
    }
    public function wishlists()
    {
        return $this->hasMany(WishList::class);
    }
     public function messages()
    {
        return $this->hasMany(Message::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
     public function warrantees()
    {
        return $this->hasMany(Warrantee::class);
    }
}
