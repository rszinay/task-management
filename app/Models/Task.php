<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    const STATUS_TODO = 1;
    const STATUS_DOING = 2;
    const STATUS_DONE = 3;

    private static $statusLabels = [
        self::STATUS_TODO   => 'Todo',
        self::STATUS_DOING  => 'Doing',
        self::STATUS_DONE   => 'Done',
    ];

    public static function showStatusLabel($status)
    {
        return self::$statusLabels[$status];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'description',
        'status',
        'deadline_at',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function statusLabel()
    {
        return self::$statusLabels[$this->status];    }

}
