<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookGetUserAreaControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function simpleGetOk()
    {
        $response = $this->get('/user-area/whatever');

        $response->assertStatus(200);
    }
}
