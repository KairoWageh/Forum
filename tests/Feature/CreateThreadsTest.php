<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    function guests_may_not_create_threads(){
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $thread = factory('App\Models\Thread')->make();
        $this->post('/threads', $thread->toArray());
    }
    /**
     * @test
     */

    function an_authenticated_user_can_create_new_forum_threads(){
        $this->actingAs(factory('App\Models\User'))->create();
        $thread = factory('App\Models\Thread')->make();
        $this->post('/threads', $thread->toArray());
        $this->get($thread->path())
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }
}