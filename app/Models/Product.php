<?php

namespace App\Models;

use App\Casts\Translate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Product extends Model
{
    use HasFactory;

    protected $hidden = ['translations'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'name' => Translate::class,
            'description' => Translate::class,
        ];
    }

    public function translations()
    {
        return $this->hasMany(ProductI18n::class, 'product_id');
    }

    public function translation($locale = null)
    {
        $locale = $locale ?: App::getLocale();

        return $this->translations->where('locale', $locale)->first();
    }
}
