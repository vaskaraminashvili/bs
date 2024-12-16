<?php

namespace App\Models;

use Filament\Forms;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, HasTranslations, HasSlug, NodeTrait;

    public array $translatable = ['title', 'description'];
    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
        'sort',
        'hidden',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'array',
        'description' => 'array',
        'status' => 'boolean',
        'deleted_at' => 'timestamp',
    ];

    public static function getForm(): array
    {
        return [
            Forms\Components\Section::make()
                ->description('News categoy')
                ->aside()
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->required(),
                    Forms\Components\TextInput::make('slug')
                        ->disabled()
                        ->maxLength(255),
                    Forms\Components\RichEditor::make('description'),
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
