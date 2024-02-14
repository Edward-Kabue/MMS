<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostUpdate extends TestCase
{
   
    public function testUpdatePost(): void
    {
        // Create a post
        $post = Post::factory()->create();

        // Mock the request
        $request = $this->mock(Request::class);
        $request->shouldReceive('validate')->once()->andReturn([
            'title' => 'Updated Title',
            'content' => 'Updated Content',
        ]);

        // Create an instance of the PostController
        $controller = new PostController();

        // Call the update method
        $response = $controller->update($request, $post->id);

        // Assert that the post was updated
        $this->assertEquals('Updated Title', $post->fresh()->title);
        $this->assertEquals('Updated Content', $post->fresh()->content);

        // Assert the redirect
        $response->assertRedirect(route('post.index'));

        // Assert the session flash message
        $this->assertSessionHas('success', 'Post updated successfully');
    }
}