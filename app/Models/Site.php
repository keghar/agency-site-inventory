<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'url', 'status', 'client_id', 'notes'])]
class Site extends Model
{
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
