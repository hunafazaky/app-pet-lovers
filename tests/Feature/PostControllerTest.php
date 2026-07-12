<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

uses(RefreshDatabase::class);

test('authenticated user can create a post with an uploaded image', function () {
    Storage::fake('public');

    $user = User::factory()->create();

    /** @var TestCase $this */
    $response = $this->actingAs($user)
        ->post(route('posts.store'), [
            'content' => 'A lovely pet moment',
            'photo' => UploadedFile::fake()->image('pet.jpg', 600, 600),
        ]);

    $response->assertRedirect(route('dashboard'));
    $response->assertSessionHas('success', 'Postingan berhasil dibuat!');

    $post = Post::query()->latest('created_at')->first();

    expect($post)->not->toBeNull()
        ->and($post->user_id)->toBe($user->id)
        ->and($post->content)->toBe('A lovely pet moment')
        ->and($post->photo)->not->toBeNull();

    expect(Storage::disk('public')->exists($post->photo))->toBeTrue();
});
