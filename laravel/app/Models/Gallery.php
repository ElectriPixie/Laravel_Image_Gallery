<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'description',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(Image::class, 'gallery_id', 'id');
    }
}
?>