<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'content', 'cover_image', 'link'];
    public static function generateSlug($name)
    {
        return Str::slug($name, '-');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProjectType::class);
    }
}
