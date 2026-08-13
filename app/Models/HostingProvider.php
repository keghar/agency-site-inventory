<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name'])]
class HostingProvider extends Model
{
    use HasFactory;
    public function sites()
    {
        return $this->hasMany(Site::class);
    }
}
