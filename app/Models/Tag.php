<?php

namespace App\Models;

use Filament\Forms;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Tag extends Model
{
    use HasFactory;
    use HasTranslations;
    use HasSlug;

    public array $translatable = ['title'];
    protected $fillable = [
        'title',
        'slug',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'array',
        'status' => 'boolean',
        'deleted_at' => 'timestamp',
    ];

    public static function getForm(): array
    {
        return [
            Forms\Components\Section::make()
                ->description('News Tags')
                ->aside()
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->required(),
                    Forms\Components\TextInput::make('slug')
                        ->disabled(),
                    Forms\Components\Toggle::make('status')
                        ->required(),
                ])

        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->getSlugOptions();
        });
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(function () {
                return $this->getTranslation('title', 'ka');
            })
            ->saveSlugsTo('slug');
    }
}
