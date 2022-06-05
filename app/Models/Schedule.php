<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use HasFactory;

    public $table = 'schedules';

    protected $dates = [
        'datetime',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'teacher.name',
        'title',
        'link',
        'datetime',
    ];

    protected $filterable = [
        'id',
        'teacher.name',
        'title',
        'link',
        'datetime',
    ];

    protected $fillable = [
        'teacher_id',
        'title',
        'description',
        'link',
        'datetime',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class);
    }

    public function getDatetimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setDatetimeAttribute($value)
    {
        $this->attributes['datetime'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
