<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use NumberFormatter;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'price', 'published'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['published'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['names'];


    /**
     * @return BelongsToMany
     */
    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class);
    }

    public function getFormattedPriceAttribute()
    {
        $fmt = new NumberFormatter(config('app.locale'), NumberFormatter::CURRENCY);
        return $fmt->formatCurrency($this->price, config('app.currency', "USD"));
    }

    public function getNamesAttribute()
    {
        $names = [];
        foreach ($this->authors as $author) {
            $names[] = $author->full_name;
        }
        return $names;
    }
}
