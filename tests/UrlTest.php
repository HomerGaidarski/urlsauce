<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class UrlTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */

    /* the at test is required if the word test is not at the beginning of the test function*/
    /** @test */
    public function addOneUrlToDatabase()
    {
        $factory = factory(App\Url::class)->create();

        $url = $factory->urls()->create([
            'long_url' => 'https://www.google.com/',
        ]);

        $found_url = Url::find(1);

        $this->assertEquals($found_url->long_url, 'https://www.google.com/');

        $this->seeInDatabase('urls', ['long_url' => 'https://www.google.com/']);
    }
}