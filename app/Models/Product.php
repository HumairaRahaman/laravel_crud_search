<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Attributes\SearchUsingPrefix;


class Product extends Model
{
    use HasFactory,Searchable;

    protected $fillable = [
        'name',
        'description',
    ];
    public function searchableAs(): string
    {
        return 'products_index';
    }
    #[SearchUsingPrefix(['id', 'name'])]
    #[SearchUsingFullText(['description'])]
    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
        ];
    }

}
