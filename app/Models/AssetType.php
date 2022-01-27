<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetType extends Model
{
    use HasFactory;

    protected $guarded = [];


    /**
     * Get the user that owns the AssetType
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function asset()
    {
        return $this->hasMany(Assets::class, 'asset_types_id','id');
    }
   
   
   
     
}
