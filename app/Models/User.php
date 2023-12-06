<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use App\Models\Group;
use App\Models\Prefix;
use App\Models\ActiviyUser;
use App\Models\EducationFloor;
use Laravel\Sanctum\HasApiTokens;
use App\Models\ScholarshipStudent;
use App\Models\AssessmentAssignmentUser;
use Illuminate\Notifications\Notifiable;
use App\Models\ScholarshipPaymentTransaction;
use App\Models\ScholarshipPaymentTransactionRevise;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'prefix_id',
        'name',
        'lastname',
        'email',
        'password',
        'is_admin',
        'education_floor_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isAdmin()
    {
        return $this->is_admin === '1';
    }

    public function prefix()
    {
        return $this->belongsTo(Prefix::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users', 'user_id', 'role_id')
            ->where('role_users.user_id', $this->id);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_roles', 'role_id', 'group_id')
            ->whereIn('role_id', $this->roles()->pluck('id'));
    }


    public function scholarShipStudents()
    {
        return $this->hasMany(ScholarshipStudent::class, 'user_id');
    }

    // ความสัมพันธ์กับ ScholarshipPaymentTransaction
    public function scholarshipPaymentTransactions()
    {
        return $this->hasMany(ScholarshipPaymentTransaction::class, 'user_id');
    }

    // ความสัมพันธ์กับ ScholarshipPaymentTransactionRevise
    public function scholarshipPaymentTransactionRevises()
    {
        return $this->hasMany(ScholarshipPaymentTransactionRevise::class, 'user_id');
    }

     // ความสัมพันธ์กับ EducationFloor
    public function educationFloor()
    {
        return $this->belongsTo(EducationFloor::class, 'education_floor_id');
    }

    // ความสัมพันธ์กับ AssessmentAssignmentUser
    public function assessmentAssignmentUsers()
    {
        return $this->hasMany(AssessmentAssignmentUser::class, 'user_id');
    }

    // ความสัมพันธ์กับ ActiviyUser
    public function activiyUsers()
    {
        return $this->hasMany(ActiviyUser::class, 'user_id');
    }
}
