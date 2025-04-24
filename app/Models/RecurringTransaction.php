<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecurringTransaction extends Model
{
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
