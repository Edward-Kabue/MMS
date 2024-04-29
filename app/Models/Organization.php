<?php

namespace App\Models;


use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Organization extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'industry', 'orgsize'];
    //Relatoinship with the contact model
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
    //Relatoinship with the quote model
    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }
    //Relatoinship with the invoice model
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
    
    
}
