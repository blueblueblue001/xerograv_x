<?php

use App\Models\User;
use App\Models\Divelog;

it('allows a user to like a divelog', function () {
    $user = User::factory()->create();
    $divelog = Divelog::factory()->create();
  
    $this->actingAs($user)
      ->post(route('divelogs.like', ['divelog' => $divelog->id]))
      ->assertStatus(302);
  
    $this->assertDatabaseHas('divelog_user', [
      'user_id' => $user->id,
      'divelog_id' => $divelog->id
    ]);
  });
  
  // dislikeのテスト
  it('allows a user to dislike a divelog', function () {
    $user = User::factory()->create();
    $divelog = Divelog::factory()->create();
  
    // 最初にlikeをする
    $user->likes()->attach($divelog);
  
    $this->actingAs($user)
      ->delete(route('divelogs.dislike', ['divelog' => $divelog->id]))
      ->assertStatus(302);
  
    $this->assertDatabaseMissing('divelog_user', [
      'user_id' => $user->id,
      'divelog_id' => $divelog->id
    ]);
  });
  