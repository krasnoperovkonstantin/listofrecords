<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Filters\QueryFilter;

class Record extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'release_date',
        'part_number',
        'genre_id',
        'format_id',
        'origin_id',
        'manufacturer_id',
        ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function origin()
    {
        return $this->belongsTo(Origin::class);
    }

    public function format()
    {
        return $this->belongsTo(Format::class);
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function tracks()
    {
        return $this->hasMany(Track::class);
    }

    public function scopeFilter(Builder $builder, QueryFilter $filter)
    {
        return $filter->apply($builder);
    }
}
