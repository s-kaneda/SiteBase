
     <div class="row"> 
         <div class="col-md-6 col-md-offset-3">
             <h2>お問い合わせ画面</h2>
            <?= $this->Form->create('Contact',['novalidate' => 'novalidate']);?>
            <div class="form-group">
                <?= $this->Form->input('name',[
                            'type'=>'text',
                            'label'=>'お名前',
                            'maxlength'=>200,
                            'class' => 'form-control',
                            'placeholder' => 'username',
                        ]
                    );
                ?>      
            </div>
            <div class="form-group">
                <?= $this->Form->input('email',[
                            'type'=>'email',
                            'label'=>'メールアドレス',
                            'maxlength'=>250,
                            'class'=>'form-control',
                            'placeholder'=> 'hoge@example.com',                
                        ]
                    );
                ?>        
            </div>
            <div class="form-group">
                <?= $this->Form->input('body',[
                            'type'=>'textarea',
                            'label'=>'お問い合わせ内容',
                            'maxlength'=>3000,
                            'class'=>'form-control',
                            'placeholder'=> 'お問い合わせ内容',
                        ]
                    );
                ?>        
            </div>                
            <button class="btn btn-primary">送信</button>
                <?= $this->Form->end();?>
         </div>
    </div>
<p class="mb1"> </p>

