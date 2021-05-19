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
    function unauthenticated_users_may_not_add_replies(){
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $thread = factory('App\Models\Thread')->create();
        $reply = factory('App\Models\Reply')->create();
        $this->post($thread->path().'/replies', $reply->toArray());
    }

    /**
     * @test
     */

    function an_authenticated_user_may_participate_in_forum_threads(){
        // Given we have an authenticated user

        $this->be($user = factory('App\Models\User')->create());

        // And an existing thread
        $thread = factory('App\Models\Thread')->create();

        // When the user adds a reply to the thread
        $reply = factory('App\Models\Reply')->make();
        $this->post($thread->path().'/replies', $reply->toArray());

        $this->get($thread->path())
            ->assertSee($reply->body);
    }
}
