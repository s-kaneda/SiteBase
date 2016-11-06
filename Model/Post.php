<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 */
class Post extends AppModel {
    
    public $validate = array(
        'title' => array(
            'Blank'=>array(
                'rule'=>array('notBlank'),
                'required'=>'true',
                'message' =>'タイトルが入力されてません'
            ),
        ),
        'body'=>array(
            //バリデーションの名前
            'notBlank'=>array(
                'rule'=>array('notBlank'),
                'required'=>'true',
                'message' =>'内容が入力されてません',
            ),
        ),
    );

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

}
