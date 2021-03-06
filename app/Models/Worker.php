<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    /**
     * Get the inventories for the blog post.
     */
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
