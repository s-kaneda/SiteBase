<div class="row">
    <div class="col-md-6 col-md-offset-3">            
        <h2 style="color: blue" >確認画面</h2>    
            <div align="right">
                <?= $this->Html->link('戻る',['action'=>'contact']);?><br>
            </div>       
            <table class="table table-bordered" >
            <!-- 入力されたお問い合わせデーターを表示 -->       
                <?php foreach ($contact as $name => $result):?>
                <tr>
                    <th style= "width: 10%"><?= $name;?></th>
                    <td style= "width: 50%"><?= $result;?></td>           
                    <?php endforeach ;?>         
                </tr>
            </table>        
            <div class="posts form">
                <?= $this->Form->create('Contact',['novalidate' => 'novalidate']);?>

                <button class="btn btn-primary">送信</button>
                <?= $this->Form->end();?>           
            </div>
    </div>
</div>
<p class="mb2"> </p>
