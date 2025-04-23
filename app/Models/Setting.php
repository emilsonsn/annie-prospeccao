<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    
    public $table = 'settings';
    public $timestamps = true;
    public $incrementing = true;
    public $keyType = 'int';
    public $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'email',
        'password',
        'server',
        'port',
        'encryption',
        'is_active',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
