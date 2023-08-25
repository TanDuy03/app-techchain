<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewModel extends Model
{
    use HasFactory;
    protected $table = 'tin';
    protected $primaryKey  = 'id';
    protected $dates = 'ngayDang';
    protected $timestamp = true;
    protected $fillable = [
        'lang', 'tieuDe', 'slug', 'tomTat', 'urlHinh', 'noiDung','idLT', 'xem','nguoiDang', 'noiBat', 'anHien', 'tags'
    ];
    protected $attributes = [
        'lang' => 'vi',
        'noiBat' => 0,
        'anHien' => 1,
        'nguoiDang' => 'tanduy'
    ];
}