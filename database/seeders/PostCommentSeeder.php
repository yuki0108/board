<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;


class PostCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = 'この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。';

        $commentdammy = 'コメントです。';

        for($i = 1;$i <= 10;$i++) {
            $post = new Post;
            $post->title = "${i}番目の投稿";
            $post->content = $content;
            $post->category_id = 1;
            $post->save();

            $maxComments = mt_rand(3, 15);
            for($j=0;$j <= $maxComments; $j++) {
                $comment = new Comment;
                $comment->commenter = 'テストユーザー';
                $comment->comment = $commentdammy;
                $post->comments()->save($comment);
                $post->increment('comment_count');
            }
        }

        $cat1 = new Category;
        $cat1->name = 'カテゴリーその1';
        $cat1->save();

        $cat2 = new Category;
        $cat2->name = 'カテゴリーその2';
        $cat2->save();
    }
}
