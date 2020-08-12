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
}
