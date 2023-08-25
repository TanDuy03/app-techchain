<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'sanpham';
    protected $primaryKey = 'id_sp';
    protected $dates = 'ngay';
    protected $timestamp = true;
    protected $fillable  = [
        'id_loai', 'ten_sp', 'slug', 'gia', 'gia_km', 'hinh', 'soluotxem', 'hot', 'anhien', 'mota', 'tinhchat'
    ];
    protected $attributes = [
        'hot' => 0,
        'tinhchat' => 2,
        'soluotxem' => 0
    ];
}
