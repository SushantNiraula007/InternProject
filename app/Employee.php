<?php

namespace App;

use App\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Employee extends Model
{
    protected $guarded = [];
    protected $appends = ['logo_url'];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('first_name', 'like', '%' . $query . '%')
            ->orWhere('email', 'like', '%' . $query . '%');
    }
    /**
     * Get the company of an employee
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getLogoUrlAttribute()
    {
        return $this->logo
            ? Storage::url('logos/' . $this->logo)
            : asset('images/default-logo-employee.jpg');
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
