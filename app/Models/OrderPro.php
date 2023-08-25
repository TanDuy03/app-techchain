<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPro extends Model
{
    use HasFactory;
    protected $table = 'donhang';
    protected $primaryKey = 'id_dh';
    protected $fillable = [
        'id_user', 'thoidiemmua', 'tennguoinhan', 'thoidiemmua', 'dienthoai', 'diachigiaohang',  'trangthai', 
    ];
    protected $attributes = [
        'trangthai' => 0,
        'id_user' => 12,
    ];
}
