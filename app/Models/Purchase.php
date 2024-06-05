<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'purchases';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'product_purchased_id',
        'price',
        'quantity',
        'total_cost',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function purchaseSales()
    {
        return $this->hasMany(Sale::class, 'purchase_id', 'id');
    }

    public function product_purchased()
    {
        return $this->belongsTo(Product::class, 'product_purchased_id');
    }
}
