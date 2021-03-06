<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;

    protected $thread;

    public function setUp(): void
    {
        parent::setUp();
        $this->thread = create('App\Models\Thread');
    }

    /**
     * @test
     */
    function a_thread_can_make_a_string_path(){
        $thread = create('App\Models\Thread');
        $this->assertEquals("/threads/{$thread->channel->slug}/{$thread->id}", $thread->path());
    }
    /**
     * @test
     */
    function a_thread_has_a_creator(){
        $this->assertInstanceOf('App\Models\User', $this->thread->creator);
    }

    /** @test */
    function a_thread_has_replies()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->thread->replies);
    }

    /**
     * @tset
     */

    public function a_thread_can_add_a_reply(){
        $this->thread->addReply([
           'body'    => 'Foobar',
           'user_id' => 1
        ]);

        $this->assertCount(1, $this->thread->replies);
    }
}
