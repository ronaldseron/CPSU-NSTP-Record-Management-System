<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class StudentFormRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'category', 'status', 'school_year', 'school_id', 'course',
        'last_name', 'first_name', 'middle_initial', 'extension_name', 'gender', 'cp_number', 'province_name', 'city_name', 'brgy_name',
        'hei_name', 'constitution_code', 'type_heis', 'program_level_code'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
