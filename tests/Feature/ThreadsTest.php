<?php

namespace Tests\Feature;

use App\Models\Thread;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ThreadsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_view_all_threads()
    {
        $thread = Thread::factory()->create();
        $response = $this->get('/threads');

        $response->assertStatus(200);
        $response->assertSee($thread->title);
    }

    /** @test */
    public function a_user_can_view_a_single_thread()
    {
        $thread = Thread::factory()->create();
        $response = $this->get('/threads/' . $thread->id);

        $response->assertStatus(200);
        $response->assertSee($thread->title);
    }
}
