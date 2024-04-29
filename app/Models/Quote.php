<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;
    protected $fillable = [
        'quote_number',
        'organization_id',
        'contact_id',
        'quote_date',
        'expiry_date',
        'total',
        'status',
    ];
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
    
    
}
