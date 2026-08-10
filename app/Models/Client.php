<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[Fillable(['name', 'email', 'company'])]
class Client extends Model
{
    use HasFactory;
    public function sites()
    {
        return $this->hasMany(Site::class);
    }
}
