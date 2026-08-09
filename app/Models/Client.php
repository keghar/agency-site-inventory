<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name', 'email', 'company'])]
class Client extends Model
{
    public function sites()
    {
        return $this->hasMany(Site::class);
    }
}
