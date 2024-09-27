<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelacakan extends Model
{
    use HasFactory;

    protected $table = 'pelacakans';
    protected $guarded = ['id'];

    public function produk()
    {
        return $this->belongsTo(Product::class, 'id_produk');
    }

    public function staff()
    {
        return $this->belongsTo(User::class, 'id_karyawan');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer');
    }

}
