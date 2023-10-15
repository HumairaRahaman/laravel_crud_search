<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Attributes\SearchUsingPrefix;
use Laravel\Scout\Searchable;


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



    public function toSearchableArray(): array
    {
        return [
            'id' => $this->getKey(),
            'name' => $this->name,
            'description' => $this->description,
        ];
    }

}
