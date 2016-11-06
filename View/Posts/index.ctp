<div class="posts index">
    <h2>Posts</h2>
        <div align="right">
           
            <?php if($login_user['role'] =='admin'):?>
            
            
            <button class="btn btn-default">
                <?php echo $this->Html->link('お知らせ追加', array('action' => 'add')); ?>               
            </button>
            <?php endif ;?>
        </div>
     
	<table class="table table-striped">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('title'); ?></th>
                <th><?php echo $this->Paginator->sort('作成日'); ?></th>
                <th><?php echo $this->Paginator->sort('編集時刻'); ?></th>
                <th class="light">Actions </th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($posts as $post): ?>
            <tr>
                <td><?php echo h($post['Post']['id']); ?></td>
                <td><?php echo h($post['Post']['title']); ?></td>
                <td><?php echo h($post['Post']['created']); ?></td>
                <td><?php echo h($post['Post']['modified']); ?></td>
                <td aling="center">
                    <button type="button" class="btn btn-default"><?php echo $this->Html->link('詳細', array('action' => 'view', $post['Post']['id'])); ?></button>
                    <?php if($login_user['role'] =='admin'):?>
                    <button type="button" class="btn btn-default"><?php echo $this->Html->link('編集', array('action' => 'edit', $post['Post']['id'])); ?></button>
                    <button type="button" class="btn btn-danger"><?php echo $this->Form->postLink('削除', array('action' => 'delete', $post['Post']['id']), array('confirm' => '本当に削除してもよろしいですか？', $post['Post']['id'])); ?></button>
                    <?php endif;?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
	</table>
    <nav>
        <ul class="pagination pagination-lg">
            <?php echo $this->Paginator->prev('< ' .'前', array(), null, array('class' => 'prev disabled'));?>
            <?php echo $this->Paginator->numbers(array('separator' => ''));?> 
            <?php echo $this->Paginator->next('次' . ' >', array(), null, array('class' => 'next disabled')); ?>
        </ul>
    </nav>
</div>
