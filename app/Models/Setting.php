<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $primaryKey = ['id'];
    protected $guarded = [''];
    protected $fillable = ['site_name', 'contact_email', 'address', 'created_at', 'updated_at'];

}
