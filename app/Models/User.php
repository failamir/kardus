<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Hash;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use Notifiable;
    use InteractsWithMedia;
    use HasFactory;

    public const ACTIVE_RADIO = [
        [
            'label' => 'true',
            'value' => 'true',
        ],
        [
            'label' => 'false',
            'value' => 'false',
        ],
    ];

    public const GENDER_RADIO = [
        [
            'label' => 'male',
            'value' => 'male',
        ],
        [
            'label' => 'female',
            'value' => 'female',
        ],
    ];

    public $table = 'users';

    protected $hidden = [
        'remember_token',
        'password',
    ];

    protected $appends = [
        'avatar',
        'gender_label',
        'active_label',
    ];

    protected $dates = [
        'email_verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'name',
        'email',
        'email_verified_at',
        'city',
        'phone',
        'gender',
        'active',
        'linked_in',
    ];

    protected $filterable = [
        'id',
        'name',
        'email',
        'email_verified_at',
        'roles.title',
        'city',
        'phone',
        'gender',
        'active',
        'linked_in',
    ];

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'city',
        'phone',
        'gender',
        'active',
        'linked_in',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('title', 'Admin')->exists();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $thumbnailWidth  = 50;
        $thumbnailHeight = 50;

        $thumbnailPreviewWidth  = 120;
        $thumbnailPreviewHeight = 120;

        $this->addMediaConversion('thumbnail')
            ->width($thumbnailWidth)
            ->height($thumbnailHeight)
            ->fit('crop', $thumbnailWidth, $thumbnailHeight);
        $this->addMediaConversion('preview_thumbnail')
            ->width($thumbnailPreviewWidth)
            ->height($thumbnailPreviewHeight)
            ->fit('crop', $thumbnailPreviewWidth, $thumbnailPreviewHeight);
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = Hash::needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getAvatarAttribute()
    {
        return $this->getMedia('user_avatar')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();
            $media['thumbnail'] = $item->getUrl('thumbnail');
            $media['preview_thumbnail'] = $item->getUrl('preview_thumbnail');

            return $media;
        });
    }

    public function getGenderLabelAttribute()
    {
        return collect(static::GENDER_RADIO)->firstWhere('value', $this->gender)['label'] ?? '';
    }

    public function getActiveLabelAttribute()
    {
        return collect(static::ACTIVE_RADIO)->firstWhere('value', $this->active)['label'] ?? '';
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
