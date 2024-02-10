<?php
use App\Models\Divelog;
use App\Models\User;

// 🔽一覧取得のテスト
it('displays divelogs', function () {
    // ユーザを作成
    $user = User::factory()->create();
  
    // ユーザを認証
    $this->actingAs($user);
  
    // Divelog
    $divelog = Divelog::factory()->create();
  
    // GETリクエスト
    $response = $this->get('/divelogs');
  
    // レスポンスにDivelogの内容と投稿者名が含まれていることを確認
    $response->assertStatus(200);
    $response->assertSee($divelog->divelog);
    $response->assertSee($divelog->user->name);
  });

  // tests/Feature/DivelogTest.php

// 作成画面のテスト
it('displays the create divelog page', function () {
    // テスト用のユーザーを作成
    $user = User::factory()->create();
  
    // ユーザーを認証（ログイン）
    $this->actingAs($user);
  
    // 作成画面にアクセス
    $response = $this->get('/divelogs/create');
  
    // ステータスコードが200であることを確認
    $response->assertStatus(200);
  });

  // tests/Feature/TweetTest.php

// 作成処理のテスト
it('allows authenticated users to create a divelog', function () {
    // ユーザを作成
    $user = User::factory()->create();
  
    // ユーザを認証
    $this->actingAs($user);
  
    // DivelogTest
    $divelogData = ['divelog' => 'This is a test divelog.'];
  
    // POSTリクエスト
    $response = $this->post('/divelogs', $divelogData);
  
    // データベースに保存されたことを確認
    $this->assertDatabaseHas('divelogs', $divelogData);
  
    // レスポンスの確認
    $response->assertStatus(302);
    $response->assertRedirect('/divelogs');
  });
  
  // tests/Feature/TweetTest.php

// 詳細画面のテスト
it('displays a divelog', function () {
    // ユーザを作成
    $user = User::factory()->create();
  
    // ユーザを認証
    $this->actingAs($user);
  
    // divelog
    $divelog = Divelog::factory()->create();
  
    // GETリクエスト
    $response = $this->get("/divelogs/{$divelog->id}");
  
    // divelog
    $response->assertStatus(200);
    $response->assertSee($divelog->divelog);
    $response->assertSee($divelog->created_at->format('Y-m-d H:i'));
    $response->assertSee($divelog->updated_at->format('Y-m-d H:i'));
    $response->assertSee($divelog->divelog);
    $response->assertSee($divelog->user->name);
  });

  // tests/Feature/DivelogTest.php

// 編集画面のテスト
it('displays the edit divelog page', function () {
    // テスト用のユーザーを作成
    $user = User::factory()->create();
  
    // ユーザーを認証（ログイン）
    $this->actingAs($user);
  
    // Divelogを作成
    $divelog = Divelog::factory()->create(['user_id' => $user->id]);
  
    // 編集画面にアクセス
    $response = $this->get("/divelogs/{$divelog->id}/edit");
  
    // ステータスコードが200であることを確認
    $response->assertStatus(200);
  
    // ビューにDivelogの内容が含まれていることを確認
    $response->assertSee($divelog->divelog);
  });
  
  // tests/Feature/DivelogTest.php

// 更新処理のテスト
it('allows a user to update their divelog', function () {
    // ユーザを作成
    $user = User::factory()->create();
  
    // ユーザを認証
    $this->actingAs($user);
  
    // Tweetを作成
    $divelog = Divelog::factory()->create(['user_id' => $user->id]);
  
    // 更新データ
    $updatedData = ['divelog' => 'Updated divelog content.'];
  
    // PUTリクエスト
    $response = $this->put("/divelogs/{$divelog->id}", $updatedData);
  
    // データベースが更新されたことを確認
    $this->assertDatabaseHas('divelogs', $updatedData);
  
    // レスポンスの確認
    $response->assertStatus(302);
    $response->assertRedirect("/divelogs/{$divelog->id}");
  });
  
  // tests/Feature/DivelogTest.php

// 削除処理のテスト
it('allows a user to delete their divelog', function () {
    // ユーザを作成
    $user = User::factory()->create();
  
    // ユーザを認証
    $this->actingAs($user);
  
    // Divelogtを作成
    $divelog = Divelog::factory()->create(['user_id' => $user->id]);
  
    // DELETEリクエスト
    $response = $this->delete("/divelogs/{$divelog->id}");
  
    // データベースから削除されたことを確認
    $this->assertDatabaseMissing('divelogs', ['id' => $divelog->id]);
  
    // レスポンスの確認
    $response->assertStatus(302);
    $response->assertRedirect('/divelogs');
  });
  