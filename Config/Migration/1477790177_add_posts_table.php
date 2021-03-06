<?php
class AddPostsTable extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'add_posts_table';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
            'create_table' =>array(
               'posts' =>array(
                   'id'=> array(
                       'type' => 'integer',
                       'null' => false,
                       'default' => null,
                       'length' =>36,
                       'key' =>'primary',
                   ),
                    'title' => array(
                       'type' => 'string',
                       'null' => false,
                       'default' =>null
                   ),
                    'body'=> array(
                       'type' => 'text',
                       'null' => false,
                       'default' => null
                   ),
                    'created'=> array(
                        'type'=> 'datetime'
                    ),
                    'modified'=>array(
                        'type'=>'datetime'
                    ),
                ),
            ),          
		),
		'down' => array(
            'drop_table'=>array(
                'posts',
            )
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function after($direction) {
		return true;
	}
}
