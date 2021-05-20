<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    function guests_may_not_add_replies(){
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $thread = make('App\Models\Thread');
        $this->post('/threads', $thread->toArray());
    }

    /**
     * @test
     */

    function an_authenticated_user_may_participate_in_forum_threads(){
        // Given we have an authenticated user

        $this->signIn();
        // And an existing thread
        $thread = make('App\Models\Thread');

        // When the user adds a reply to the thread
        $this->post('/threads', $thread->toArray());

        $this->get($thread->path())
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }
}
