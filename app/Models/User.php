<?php
namespace App\Models;
use App\Transformers\UserTransformer;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
// use Tymon\JWTAuth\Contracts\JWTSubject;
use Laravel\Passport\HasApiTokens;
use Laravel\Passport\PersonalAccessTokenFactory;
use Laravel\Passport\PersonalAccessTokenResult;
use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\ClientRepository;


class User extends Authenticatable 
{
    use HasFactory, Notifiable,HasApiTokens, SoftDeletes;

    const VERIFIED_USER = '1';
    const UNVERIFIED_USER = '0';
    const GENDER_MALE = 'male';
    const GENDER_FEMALE = 'female';
    

    public $transformer = UserTransformer::class; //obtains full namespace of the tranformer class
    
    const ADMIN_USER = 'true';
    const REGULAR_USER = 'false';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'verified', 
        'verification_token', 
        'admin',
        'is_email_public',
        'about',
        'location',
        'company',
        'company_url',
        'interests',
        'gender',
        'fb_url',
        'tw_url',
        'insta_url',
        'in_url',
    ];
            
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
        'verification_token', 
        'email_verified_at'
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = strtolower($name);
    }
   

    //defining mutator to set email to lowercase when storing to db
    public function setEmailAttribute($email)
    {
        $this->attributes['email'] = strtolower($email);
    }


    // accessor for name attribute
    public function getNameAttribute($name)
    {
        return ucwords($name);
    }
    


    public function isVerified()
    {
        return $this->verified == User::VERIFIED_USER;
    }

    public function isAdmin()
    {
        return $this->admin == User::ADMIN_USER;
    }
    // public function createCustomToken($name, array $scopes = []): PersonalAccessTokenResult {
    //     if (empty($this->forcedClientId)) {
    //         return $this->createToken($name, $scopes);
    //     }

    //     $client = app()->make(ClientRepository::class)->find($this->forcedClientId);

    //     $clientRepository = app()->makeWith(CustomClientRepository::class, [
    //         'personalAccessClientId' => $client->id,
    //         'personalAccessClientSecret' => $client->secret
    //     ]);

    //     return Container::getInstance()->makeWith(PersonalAccessTokenFactory::class, [
    //         'clients' => $clientRepository
    //     ])->make(
    //         $this->getKey(), $name, $scopes
    //     );
    // }
    // public function setForcedClientId(int $id): Model {
    //     $this->forcedClientId = $id;

    //     return $this;
    // }
    public static function generateVerificationToken()
    {
        return Str::random(40);
    }

    // public function getJWTIdentifier() {
    //     return $this->getKey();
    // }
    // /**
    //  * Return a key value array, containing any custom claims to be added to the JWT.
    //  *
    //  * @return array
    //  */
    // public function getJWTCustomClaims() {
    //     return [];
    // }    
    // public function orders(): HasMany
    // {
    //     return $this->hasMany(Order::class);
    // }
}