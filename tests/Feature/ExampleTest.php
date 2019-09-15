<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function only_logged_in_user_can_see_prospects_list()
    {
        $response = $this->get('/')->assert(200);
    
    }


}
  