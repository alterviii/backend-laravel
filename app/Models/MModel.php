<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MModel extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table='mahasiswa';
    protected $primarykey='id';
    protected $fillable=['nama','jk','alamat', 'idjurusan'];
}
