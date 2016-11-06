<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 * @property PaginatorComponent $Paginator
 */
class PostsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array(
        'Paginator'=>[
           'limit'=>3 
        ]            
    );

/**
 * index method
 *
 * @return void
 */
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
    } 
    
    public function isAuthorized($user) {
        //parent::isAuthorized();
        //一覧表示と詳細表示は誰でも可能            
        if (in_array($this->action, array('index','view','login','logout'))) {
            return true;
        }  
        if($user['role'] ==='admin'){
            return true;
        }
        
        if($this->action === 'edit') {
            //ログインしたユーザーがeditアクションの時に編集しようとしてるユーザーとidが一致したらtrueを返す。   
            
            if( $this->params['pass'][0] === $user['id'])
            {
                return true;
            }
        }
        // adminは編集や削除や追加ができる //adminは上記以外のactionにアクセスできる
        return false;
    }        
    
    public function index() {
		
		$this->set('posts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException('ユーザーが存在しません');
		}
		$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
        //var_dump($this->Post->find('first', $options));
        //exit;
		$this->set('post', $this->Post->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Flash->success(__('The post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The post could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException('ユーザーが見つかりません');
		}
		if ($this->request->is(array('post', 'put'))) {
            $this->Post->id = $id;
     		if ($this->Post->save($this->request->data)) {
				$this->Flash->success('編集登録できました');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error('登録できませんでした。もう一度トライしてくだい');
			}
		} else {
			$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
			$this->request->data = $this->Post->find('first', $options);
		}
	}
    

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException('ユーザーが見つかりません');
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Post->delete()) {
			$this->Flash->success('ユーザー削除できました');
		} else {
			$this->Flash->error('ユーザー削除できませんでした. もう一度トライしてください');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
