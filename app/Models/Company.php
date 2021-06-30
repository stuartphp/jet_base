<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table ='companies';
    protected $fillable = [
'attela_reference',
'created_by',
'trading_name',
'registered_as',
'registration_number',
'vat_number',
'contact_name',
'contact_number',
'email',
'physical_address',
'postal_address',
'domain',
'url_contact_us',
'url_terms_and_conditions',
'url_privacy_policy',
'slogan',
'document_logo',
'website_logo',

    ];
}
