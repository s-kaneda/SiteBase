<nav class="navbar navbar-inverse">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Site base</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="/pages/page1">Page1</a></li>
        <li><a href="/pages/page2">Page2</a></li>
        <li><a href="/contacts/contact">お問い合わせ</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <?php if($login_user) :?>
            <li>
              <?= $this->Html->link(
                'ログアウト', ['controller' => 'users', 'action' => 'logout', ]                                             
              );?>              
            </li>
            <li>
              <?= $this->Html->link(
                '管理画面', ['controller' => 'users', 'action' => 'index', ]                                             
              );?>              
            </li>
          <?php else: ?>
            <li>
              <?= $this->Html->link(
                'ログイン', ['controller' => 'users', 'action' => 'login', ]                                             
              );?>              
            </li>
          <?php endif; ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>