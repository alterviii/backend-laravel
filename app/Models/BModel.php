<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BModel extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table='buku';
    protected $primarykey='idbuku';
    protected $fillable=['judulbuku','jenisbuku','pengarang'];
}
