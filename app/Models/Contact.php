<?php

namespace App\Models;

use App\Models\organization;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'job_title', 'organization_id'];
    //Relatoinship with the organization model
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
