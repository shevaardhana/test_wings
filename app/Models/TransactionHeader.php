<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_code',
        'document_number',
        'user',
        'total',
        'date'
    ];

    public function TransactionDetail(){
    	return $this->hasMany(TransactionDetail::class, 'document_number');
    }
}
