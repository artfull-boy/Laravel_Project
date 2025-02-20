<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers'; // Define the existing table

    protected $primaryKey = 'id'; // Change if your primary key is different

    public $timestamps = false; // Set to true if the table has created_at and updated_at

    protected $fillable = [
        'customer_id',
        'first_name',
        'last_name',
        'company',
        'city',
        'country',
        'phone_1',
        'phone_2',
        'email',
        'subscription_date',
        'website',
    ];
}
