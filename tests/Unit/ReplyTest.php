<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReplyTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function it_has_an_owner()
    {
        $reply = create('App\Models\Reply');

        $this->assertInstanceOf('App\Models\User', $reply->owner);
    }
}
