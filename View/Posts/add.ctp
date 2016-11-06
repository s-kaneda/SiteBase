<div class="posts form">
<?php echo $this->Form->create('Post',['novalidate'=>'novalidate']); ?>
		<h2>お知らせ新規追加</h2>
        <?php echo $this->Form->create('Post',['novalidate'=>'novalidate']); ?>
        <div class="form-group">
        <?=$this->Form->input('title',[
            'type'=> 'text',
            'label' => 'タイトル',
            'class' => 'form-control',
            'placeholder' => 'タイトル',                                
            ]);?>
            
        </div>
        <div class="form-group">
        <?=$this->Form->input('body',[
            'type'=> 'textarea',
            'label' => '投稿内容',
            'class' => 'form-control',
            'placeholder' => '内容編集',                                
            ]);?>            
        </div>
        <button class="btn btn-primary">新規追加</button>
        <button class="btn btn-default"><?php echo $this->Html->link('戻る', array('action' => 'index')); ?></button>

<?php echo $this->Form->end(); ?>

</div>
