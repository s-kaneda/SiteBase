<!DOCTYPE html>
<html lang="ja">

    <head>
	<?php echo $this->Html->charset(); ?>
        <title>
            SiteBase: 
		<?php echo $this->fetch('title'); ?>
        </title>
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
        <?php
            echo $this->Html->meta('icon');
            
            echo $this->Html->css('app');
            echo $this->Html->css('front');
            
            echo $this->fetch('meta');
            echo $this->fetch('css');
            echo $this->fetch('script');
        ?>
    </head>
    <body>
        <?=$this->element('navbar_front');?>        
            <div id="content">
                <!--<div class="container">-->
                    <?php echo $this->Session->flash(); ?>

                    <?php echo $this->fetch('content'); ?>
                <!--</div>-->
            </div>
            
            <div id="footer">
                <footer class="icon-bar">
                    kaneda
                </footer>                 
            </div>               
    </body>
</html>
