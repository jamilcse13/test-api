<?php

namespace Tests\Feature\Blog;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BlogIndexTest extends TestCase
{
    /**
     * @test
     */
    public function index_show_list_of_blogs_test()
    {
        $this->get('/')
            ->assertSee('Laravel')
            ->assertSeeInOrder(['Laracasts', 'News']);
    }
}
