Laravel Extention Side A_DAY 1 _課題_20240210

テーマ：ダイビングログの投稿とCRUD
仕様：laratterプロジェクトの工程をすべて再度実施。TweetをDivelogとし、世界展開できるよう英語に変更した。
苦労したこと：TweetのコードをすべてDivelogに変更して記載したため、TEST実施で変更漏れがあり、勉強になった。
Laravelのロゴを自社ロゴに変えたいが現在エラー。
実施したこと
1. sttorage/imgフォルダを作成し,ロゴファイルを格納
2, navigation.bladeの <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />と該当部分を  <img src="{{ asset('img/AppIcon@1024.png')}}">に変更
3.php artisan storage:link
4. GET http://localhost/img/AppIcon@1024.png 404 (Not Found)　エラーとなる。
もう少し調べて修復したい。

 
