<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class customers extends Authenticatable
{
    protected $table = 'customers';
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'customerID';
    use HasFactory;

    public function getAuthPassword()
    {
        return $this->customerPassword;
    }
}
