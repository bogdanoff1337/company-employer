<?php

namespace App\Models;

use App\Mail\NewCompanyNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Mail;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Company extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'email',
        'website',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('company_logo');
    }

    public function employees(): HasMany
    {
        return $this->hasMany(Employer::class);
    }
}
