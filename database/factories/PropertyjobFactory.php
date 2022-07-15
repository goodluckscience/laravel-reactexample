<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Property;
use Illuminate\Support\Carbon;

class PropertyjobFactory extends Factory
{
    protected $users;
    protected $properties;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->users = User::all()->pluck('id')->toArray();
        $this->properties = Property::all()->pluck('id')->toArray();
        $propertyjob_summary = [
            'Roofing - maintenance, routine check.',
            'Building cleaning.',
            'Electricity - emergency repair.',
            'Painting - planned maintenance.',
            'Exterior window repair.',
            'Kitchen redesign - cost assessment.',
            'Planned fire safety risk assessment.',
            'Parking surface replacement.',
            'Energy save bulbs replacement in whole building.',
            'Plumbing - urgent leaking pipe repair/replacement.',
        ];

        $status = ['open','in progress', 'completed','cancelled'];

        return [
            'user_id' => $this->faker->randomElement($this->users),
            'property_id' => $this->faker->randomElement($this->properties),
            'summary' => $propertyjob_summary[mt_rand(0,9)],
            'description' => $this->faker->text(500),
            'status' => $status[mt_rand(0,3)],
            'created_at' => Carbon::today()->subDays(rand(0, 365)),
            'updated_at' => now(),
        ];
    }
}
