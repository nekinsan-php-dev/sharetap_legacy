<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SharetapPermission extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "sharetap_permissions";

    protected $fillable = [
        'vcard_id',
        'website',
        'twitter',
        'facebook',
        'instagram',
        'linkedin',
        'whatsapp',
        'youtube',
        'basic_info',
        'services',
        'testimonials',
        'business_hours',
    ];
}
