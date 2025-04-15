<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DuplicatedFund extends Model
{
    protected $table = 'duplicated_funds';

    protected $fillable = [
        'manager_id',
    ];

    public $timestamps = false;

    public function funds(): BelongsToMany
    {
        return $this->belongsToMany(Fund::class);
    }

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }
}
