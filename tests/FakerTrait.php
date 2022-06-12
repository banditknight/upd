<?php

namespace Tests;

trait FakerTrait
{
    public $faker;

    public function getFaker()
    {
        $faker = \Faker\Factory::create('id_ID');
        $this->faker = $faker;

        return $faker;
    }
}
