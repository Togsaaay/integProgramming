<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class ParentsModel extends Model
{
    //
    public function StudentsModel(): HasMany
    {
        return $this->hasMany(StudentsModel::class);
    }
}
