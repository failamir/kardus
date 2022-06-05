<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use HasFactory;

    public const STATUS_RADIO = [
        [
            'label' => 'capture',
            'value' => 'capture',
        ],
        [
            'label' => 'settlement',
            'value' => 'settlement',
        ],
        [
            'label' => 'pending',
            'value' => 'pending',
        ],
        [
            'label' => 'deny',
            'value' => 'deny',
        ],
        [
            'label' => 'cancel',
            'value' => 'cancel',
        ],
        [
            'label' => 'expire',
            'value' => 'expire',
        ],
    ];

    public $table = 'transactions';

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
        'user.name',
        'payment.name',
        'total_bill',
        'total_pay',
        'course.title',
        'payment_token',
        'status',
    ];

    protected $filterable = [
        'id',
        'user.name',
        'payment.name',
        'total_bill',
        'total_pay',
        'course.title',
        'payment_token',
        'status',
    ];

    protected $fillable = [
        'user_id',
        'payment_id',
        'total_bill',
        'total_pay',
        'course_id',
        'payment_token',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->belongsTo(ListPayment::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function getStatusLabelAttribute()
    {
        return collect(static::STATUS_RADIO)->firstWhere('value', $this->status)['label'] ?? '';
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
