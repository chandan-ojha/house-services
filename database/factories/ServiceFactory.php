<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $service_name = $this->faker->unique()->words($nb=4,$asText=true);
        $slug = Str::slug($service_name,"-");
        $imageName = 'service_'. $this->faker->unique()->numberBetween(1,20). '.jpg';
        return [
            'name' => $service_name,
            'slug' => $slug,
            'tagline' => $this->faker->text(20),
            'service_category_id' => $this->faker->numberBetween(1,20),
            'price' =>  $this->faker->numberBetween(100,500),
            'image' => $imageName,
            'thumbnail' => $imageName,
            'description' => $this->faker->text(500),
            'inclusion' => $this->faker->text(20) .'|'.  $this->faker->text(20) .'|'.  $this->faker->text(20) .'|'. $this->faker->text(20),
            'exclusion' => $this->faker->text(20) .'|'.  $this->faker->text(20) .'|'.  $this->faker->text(20) .'|'. $this->faker->text(20)
                
        ];
    }
}
