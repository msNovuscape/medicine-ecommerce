<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Medicine extends Model
{
    use HasFactory;
    protected $table = "tbl_medicine";

    public function company(){
        return $this->belongsTo(Company::class,'tbl_company','foreign_key','company_id');
    }
    public function put($company_name){
        return ['company_name' => $company_name];
    }
}
