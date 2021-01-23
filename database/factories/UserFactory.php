<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function bloodType()
    {
        $bloodTypes= array("A", "AB", "B", 'O+', "O-");
        return $bloodTypes[array_rand($bloodTypes)];
    }
    public function permisionGive()
    {
        $permissions= array(1,0);
        return $permissions[array_rand($permissions)];
    }
    public function gender()
    {
        $gender= array("Male","Female");
        return $gender[array_rand($gender)];
    }
    public function randomDate()
    {
        //Generate a timestamp using mt_rand.
        $timestamp = mt_rand(1, time());
        
        //Format that timestamp into a readable date string.
        $randomDate = date("d M Y", $timestamp);
        
        //Print it out.
        return $randomDate;
    }
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'phone'=>$this->faker->e164PhoneNumber,
            'blood_type'=>$this->bloodType(),
            'address'=>$this->faker->address,
            'dob'=>$this->randomDate(),
            'gender'=>$this->gender(),
            'subcounty'=>$this->faker->word,
            'is_admin'=>$this->permisionGive(),
            'is_donor'=>$this->permisionGive(),
            'is_patient'=>$this->permisionGive(),
            'is_blood_bank'=>$this->permisionGive(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
}