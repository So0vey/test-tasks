<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Warehouse extends Model
{
    public function stocks(): HasMany
    {
        return $this->hasMany(Stock::class);
    }
}
