<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class testRoute extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $appURL = env('APP_URL');
        $urls = [
            '/',
            'adicionaserie'
        ];

        foreach ($urls as $url) {
            $response = $this->get(route($url));
            $response->assertStatus(200);
        }
    }
}
