<?php

namespace App\Models;

use App\Notifications\VerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'username',
        'type',
        'salutation',
        'lastname',
        'firstname',
        'birthday',
        'nationality',
        'telefon',
        'email',
        'password',
        'name_inst',
        'email_inst',
        'telefon_inst',
        'website',
        'mobile',
        'soz_vers_nr',
        'civil_status',
        'status',
        'in_ch_since',
        'bewilligung',
        'is_draft',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
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
    ];


    public function address()
    {
        return $this->hasMany(Address::class);
    }

    public function siblings()
    {
        return $this->hasMany(Sibling::class);
    }

    public function lastLogin()
    {
        return $this->belongsTo(Login::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function sendApplications()
    {
        return $this->hasMany(Application::class)->where('appl_status', '!=', 'not_send');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function avatarUrl()
    {
        return 'https://www.gravatar.com/avatar/'.md5(strtolower(trim($this->email)));
    }

    // OVERRIDE
    /**
     * Send email verification.
     * @call function
     */
    public function sendEmailVerificationNotification() {
        $this->notify(new VerifyEmail);
    }
}
