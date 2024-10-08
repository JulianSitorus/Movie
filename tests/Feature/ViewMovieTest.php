<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ViewMovieTest extends TestCase
{
    public function test_the_main_page_shows_correct_info()
    {
        Http::fake();
        
        $response = $this->get(route('movies.dashboard'));

        $response->assertSuccessful();
        $response->assertSee('Popular Movies');
    }

    // php artisan test --filter=test_the_main_page_shows_correct_info
}
