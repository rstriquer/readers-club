<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Inertia\Inertia;
use Tests\TestCase;

/**
 * Test public.index route
 */
class PublicIndexText extends TestCase
{
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function simpleGetOk()
    {
        $result = $this->get('/');
        $result->assertStatus(200);
    }
}
