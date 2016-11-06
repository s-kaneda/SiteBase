<div class="posts view">
<h2>お知らせ詳細</h2>
<table class="table table-bordered">
    
		<tr>
            <th style="width: 30%">Id</th>
            <td><?php echo h($post['Post']['id']); ?></td>
        </tr>
        <tr>
            <th>タイトル</th>
            <td><?php echo h($post['Post']['title']); ?></td>
        </tr>		
        <tr>
            <th>body</th>
            <td><?php echo h($post['Post']['body']); ?></td>            
		</tr>
        <tr>
            <th>作成日</th>
            <td><?php echo h($post['Post']['created']); ?></td>
        </tr>           		
		<tr>
            <th>修正</th>
            <td><?php echo h($post['Post']['modified']); ?></td>
		</tr>
</table>
    <button type="button" class="btn btn-default"><?php echo $this->Html->link('戻る', array('action' => 'index')); ?></button>
    <?php if($login_user['role'] =='admin'):?>
    <button type="button" class="btn btn-default"><?php echo $this->Html->link('保存', array('action' => 'edit', $post['Post']['id'])); ?></button>
    <button type="button" class="btn btn-danger"><?php echo $this->Form->postLink('削除', array('action' => 'delete', $post['Post']['id']), array('confirm' => '本当に削除してもよろしいですか？', $post['Post']['id'])); ?></button>
    <?php endif ;?>    
</div>



