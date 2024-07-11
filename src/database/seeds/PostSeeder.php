<?php


use Phinx\Seed\AbstractSeed;

class PostSeeder extends AbstractSeed
{
    public function run(): void
    {

        $data = [
            [
                'title'    => 'Test Title 1',
                'description' => 'Test Description 1',
                'author' => 'John Smith',
            ],[
                'title'    => 'Test Title 2',
                'description' => 'Test Description 2',
                'author' => 'John Doe',
            ]
        ];

        $posts = $this->table('posts');
        $posts->insert($data)
            ->saveData();

    }
}
