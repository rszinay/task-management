<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * List of all task statuses
     *
     * @var array[]
     */
    public static $statuses = [
        [
            'id'    => 1,
            'label' => 'Todo',
        ],
        [
            'id'    => 2,
            'label' => 'Doing',
        ],
        [
            'id'    => 3,
            'label' => 'Done',
        ]
    ];

    /**
     * List task status labels
     *
     * @var string[]
     */
    public static $statusLabels = [
        1 => 'Todo',
        2 => 'Doing',
        3 => 'Done'
    ];

}
