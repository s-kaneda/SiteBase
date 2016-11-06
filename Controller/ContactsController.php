<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class ContactsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array(
        'Paginator'=>[
            'limit'=>3
        ],
        'Session',
    );    
    //コンポーネント:各コントローラーに使えるようにする
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
        $this->layout = 'front';
    }

    public function isAuthorized($user) {
//        parent::isAuthorized();
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
    
    public function contact() {
        
        //セッションを読み込みます
        $contact = $this->Session->read('Contact');
//        var_dump($contact);
        //リクエストデーターがポストなら                        
        if ($this->request->is('post')) {
//                    var_dump($this->request->data);
//                    exit;
			$this->Contact->create();
            //リクエストデーターをセットします。
            $this->Contact->set($this->request->data);
            //バリデーション
			if ($this->Contact->validates()){
                
                // リクエストデーターの値をセッションに保存
                $this->Session->write('Contact',$this->request->data['Contact']);
                
               // var_dump($this->request->data);
                //exit;
                //コンンファームへリダレクト
                return $this->redirect(array('action' => 'confirm'));
            }
            else{
                $this->Flash->danger('メールを送信できませんでした。もう一度トライしてください');               
            }
        }else{
            //もしセッションがあればフォームにリクエストデーターをセット
            //セッションが空じゃなければ(セッションがあれば)
            if(!empty($contact)){
                //               
                $this->request->data['Contact'] = $contact;                    
            }
        }                         
    }
    
    public function confirm() {
        
        $contact = $this->Session->read('Contact');
//        var_dump($contact);
        
        $this->set('contact',$contact);
                
        if ($this->request->is('post')) {
            
            $this->sendMail($contact);
            // メール送信後 セッションデーターをクリアc
            $this->Session->delete('Contact');
            $this->Flash->success('メールを送信しました');             
            return $this->redirect(array('action' => 'contact'));            
        }
        
    }
                    
    private function sendMail($contact) {
        // セッションからお問い合わせデーターを取得
        $Email = new CakeEmail('gmail');
        $Email->viewVars($contact);        
        $Email->template('contact');
        $Email->emailFormat('text');
        $Email->from(array('sobani.live311@gmail.com' => 'Sitebaseから'));
        $Email->to('sobani.live311@gmail.com');
        $Email->subject('お問い合わせ');                
        $Email->send();                
    }
}
