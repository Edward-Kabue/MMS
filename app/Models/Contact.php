<?php

namespace App\Models;



use App\Models\Organization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'job_title', 'organization_id'];
    
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
    
}
