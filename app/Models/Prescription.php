<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $table = "tbl_image";

    protected $fillable = ['image_path','remark','date','client_id'];
}
