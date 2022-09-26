<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{
    use HasFactory;

    /**
     * Had to declare this line in order to add new fields in the stock section
     * of the product form
     * @var string
     */
    protected $connection = 'mysql';

    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
