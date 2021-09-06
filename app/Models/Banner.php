<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DisplayIn;

class Banner extends Model
{
    use HasFactory;
    protected $table = "tbl_banner";

    public function display_in(){
        return $this->belongsTo(DisaplayIn::class);
    }
}
