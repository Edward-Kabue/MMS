<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
protected $fillable = [
    'invoice_number',
    'organization_id',
    'quote_id',
    'contact_id',
    'invoice_date',
    'due_date',
    'total',
];
public function organization()
{
    return $this->belongsTo(Organization::class);   
}
public function quote()
{
    return $this->belongsTo(Quote::class);   
}
public function contact()
{
    return $this->belongsTo(Contact::class);   
}
}
