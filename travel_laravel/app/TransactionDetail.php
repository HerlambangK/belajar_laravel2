<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// nambahin soft delete
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use SoftDeletes; //cara pakai soft deletenya

    //menambahkan fill abele / massasign [sesuai database yang dah dibikin]

    protected $fillable = [
        'transaction_id', 'username', 'nationality', 'is_visa', 'doe_passport'
    ];
    protected $hidden = [];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transactions_id', 'id');
    }
}