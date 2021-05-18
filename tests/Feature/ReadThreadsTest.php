<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\Thread;

class ReadThreadsTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void{
        parent::setUp();
        $this->thread = factory('App\Thread')->create();
    }
    /**
     * @test
     *
     */
    public function a_user_can_view_all_threads()
    {
        $response = $this->get('/threads')
            ->assertSee($this->thread->title);
    }

    /**
     * @test
     *
     */
    public function a_user_can_read_a_single_thread()
    {
        $response = $this->get('/threads/'.$this->thread->id)
            ->assertSee($this->thread->title);
    }

    /**
     * @test
     *
     */

    function a_user_can_read_replies_that_are_associatd_with_a_thread(){
        $reply = factory('App\Reply')->create(['thread_id' => $this->thread->id]);
        $this->get('/threads/'. $this->thread->id)
            ->assertSee($reply->body);
    }
}


