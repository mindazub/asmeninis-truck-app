<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PagesTest extends TestCase
{
    /**
     * A Truck Index page.
     *
     * @return void
     */
    public function testTruckIndex()
    {
        $response = $this->get('/truck');

        $response->assertSee('All Truck table');
    }

    /**
     * A Truck Create page.
     *
     * @return void
     */
    public function testTruckCreate()
    {
        $response = $this->get('/truck/create');

        $response->assertSee('Create Truck');
    }
}
