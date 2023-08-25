<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoaiTin extends Model
{
    use HasFactory;
    protected $table = 'loaitin';
    protected $primaryKey = 'id';
    protected $attribute = [
        'anHien' => 1,
        'lang' => 'vi'
    ];
    protected $fillable = [
        'lang', 'ten', 'slug', 'thuTu', 'anHien'
    ];
    use SoftDeletes;
}
