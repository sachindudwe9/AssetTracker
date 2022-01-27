<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assets extends Model
{
    use HasFactory;

    protected $guarded = [];


    /**
     * Get the user associated with the Assets
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function type()
    {
        return $this->hasOne(AssetType::class, 'id', 'asset_types_id');
    }

    /**
     * Get all of the comments for the Assets
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
   

}
