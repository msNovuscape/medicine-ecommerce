<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempOrder extends Model
{
    use HasFactory;
    protected $table = "tbl_temporder";
    protected $fillable = ['session_id','user_id','medicine_name','quantity','medicine_id','tempsales_id','sp_per_piece','img_src','medicine_slug'];
}
