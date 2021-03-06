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
        $this->withExceptionHandling();

        $this->get('/threads/create')
            ->assertRedirect('/login');

        $this->post('/threads')
            ->assertRedirect('/login');
    }

    /**
     * @test
     */

    function an_authenticated_user_can_create_new_forum_threads(){
        $this->signIn();
        $thread = make('App\Models\Thread');
        $response = $this->post('/threads', $thread->toArray());
        $this->get($response->headers->get("Location"))
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }

    /**
     * @test
     */

    function a_thread_requires_a_title()
    {
        $this->publishThread(['title' => null])
            ->assertSessionHasErrors('title');
    }

    /**
     * @test
     */
    function a_thread_requires_a_body(){
        $this->publishThread(['body' => null])
            ->assertSessionHasErrors('body');
    }

    /**
     * @test
     */

    function a_thread_requires_a_valid_channel(){
        $this->publishThread(['channel_id' => null])
            ->assertSessionHasErrors('channel_id');
    }

    /**
     * @param array $overrides
     * @return \Illuminate\Testing\TestResponse
     */

    public function publishThread($overrides = [])
    {
        $this->withExceptionHandling()->signIn();
        $thread = make('App\Models\Thread', $overrides);
        return $this->post('/threads', $thread->toArray());

    }
}
