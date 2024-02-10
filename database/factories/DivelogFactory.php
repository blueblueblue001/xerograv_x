<?php

namespace Database\Factories;
use App\Models\Divelog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Divelog>
 */
class DivelogFactory extends Factory
{
     // 🔽 追加
  protected $model = Divelog::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       // 🔽 追加
        return [
          'user_id' => User::factory(), // UserモデルのFactoryを使用してユーザを生成
          'divelog' => $this->faker->text(200) // ダミーのテキストデータ
        ]; [
            //
        ];
    }
}
