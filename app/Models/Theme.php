<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Theme extends Model
{
    protected $fillable = ['theme', 'niveau'];
    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->validateUniqueThemeNiveau();
        });
    }

    protected function validateUniqueThemeNiveau()
    {
        $existingTheme = static::where('theme', $this->theme)
            ->where('niveau', $this->niveau)
            ->first();

        if ($existingTheme && $existingTheme->id !== $this->id) {
            throw new \Exception('Ce couple (thème, niveau) existe déjà.');
        }
    }
    use HasFactory;

    /**
     * Get all of the documents for the Theme
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documents(): HasMany
    {
        return $this->hasMany(Docs::class, 'theme_id');
    }
}
