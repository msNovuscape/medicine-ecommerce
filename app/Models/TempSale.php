<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempSale extends Model
{
    use HasFactory;
    protected $table = "tbl_tempsales";
    protected $fillable = ['session_id','client_id','date','image_id','total_amount'];

}
