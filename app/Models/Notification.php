<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;
    use HasFactory;

    public const STATUS_SELECT = [
        [
            'label' => 'Read',
            'value' => 'Read',
        ],
        [
            'label' => 'Unread',
            'value' => 'Unread',
        ],
    ];

    public $table = 'notifications';

    protected $appends = [
        'status_label',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'title',
        'user.name',
        'status',
    ];

    protected $filterable = [
        'id',
        'title',
        'user.name',
        'status',
    ];

    protected $fillable = [
        'title',
        'value',
        'user_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
        'owner_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusLabelAttribute()
    {
        return collect(static::STATUS_SELECT)->firstWhere('value', $this->status)['label'] ?? '';
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
