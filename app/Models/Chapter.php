<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chapter extends Model
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;
    use HasFactory;

    public $table = 'chapters';

    protected $orderable = [
        'id',
        'name',
        'course.title',
    ];

    protected $filterable = [
        'id',
        'name',
        'course.title',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'created_at',
        'course_id',
        'updated_at',
        'deleted_at',
        'owner_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
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
