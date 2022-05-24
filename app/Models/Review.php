<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use HasFactory;

    public const STAR_RADIO = [
        [
            'label' => '1',
            'value' => '1',
        ],
        [
            'label' => '2',
            'value' => '2',
        ],
        [
            'label' => '3',
            'value' => '3',
        ],
        [
            'label' => '4',
            'value' => '4',
        ],
        [
            'label' => '5',
            'value' => '5',
        ],
    ];

    public $table = 'reviews';

    protected $appends = [
        'star_label',
    ];

    protected $orderable = [
        'id',
        'star',
    ];

    protected $filterable = [
        'id',
        'star',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'star',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getStarLabelAttribute()
    {
        return collect(static::STAR_RADIO)->firstWhere('value', $this->star)['label'] ?? '';
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
