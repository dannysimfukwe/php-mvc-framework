<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Posts extends AbstractMigration
{

    public function change()
    {
        $users = $this->table('posts');
        $users->addColumn('title', 'string', ['limit' => 100])
                ->addColumn('description', 'text', ['limit' => 400])
                ->addColumn('author', 'string', ['limit' => 100])
                ->addColumn('created_at', 'datetime')
                ->addColumn('updated_at', 'datetime', ['null' => true])
                ->create();
    }

}
