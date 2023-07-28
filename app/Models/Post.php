<?php

namespace App\Models;

use App\Scope\PostScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted()
    {
        // static::addGlobalScope(new PostScope);
    }

    public function Author()
    {
        return $this->belongsTo(Author::class);
    }

    public function Category()
    {
        return $this->belongsToMany(Category::class);
    }

    public function Comment()
    {
        return $this->hasMany(Comment::class);
    }

    public static function findBySlug($slug)
    {
        return static::query()->where('slug', $slug)->firstOrFail();
    }

    public function scopePublicStatus(Builder $query)
    {
        return $query->where('public', 2);
    }

    // Accessor, Mutator
    /**
     * Undocumented function
     *
     * @param  Builder $query
     * @param  array   $filter ['search' => 'abc']
     * @return void
     */
    public function scopeFilter(Builder $builder, array $filters)
    {
        $builder = $builder->when($filters['search'] ?? false, function ($q, $filter) {
            $q->where('title', 'like', '%' . $filter . '%')
                ->orWhere('content', 'like', '%' . $filter . '%');
        });

        $builder = $builder->when($filters['category_id'] ?? false, function ($query) {
            $query->whereIn('id', function ($query) {
                $query->select('post_id')
                    ->from('category_post')
                    ->where('category_id', request('category_id'));
            });
        });

        return $builder;
    }
}
