<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use HasFactory;

    public $table = 'topics';

    protected $orderable = [
        'id',
        'name',
        'id_chapter.name',
    ];

    protected $filterable = [
        'id',
        'name',
        'id_chapter.name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'id_chapter_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function idChapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
