<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    /**
     * Get the Worker that owns the Inventories.
     */
    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }
}
