<!DOCTYPE html>
<html>
    <head>
    	<!-- Prohibit IE brouwser from using compatibility view. REF:http://www.loconoco.info/?p=665 -->
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta charset="UTF-8">
        <meta http-equiv="content-language" content="ja">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

        <title><?=$this->config->item('site_name')?></title>

		<!-- Import Bootstrap's CSS file. -->
	    <link href="<?=site_url()?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
	    <!-- Import original CSS file. -->
		<link href="<?=site_url()?>stylesheets/common.css" rel="stylesheet">
	</head>

    <body lang="ja">
    	<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-43527454-2', 'auto');
			ga('send', 'pageview');
		</script>
		
    	<nav class="navbar navbar-inverse" role="navigation">
	      	<div class="container">
		        <div class="navbar-header">
		        	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		            	<span class="sr-only">メニュー</span>
		            	<span class="icon-bar"></span>
		            	<span class="icon-bar"></span>
		            	<span class="icon-bar"></span>
		         	</button>
		          	<a class="navbar-brand" href="<?=site_url()?>"><?=$this->config->item('site_name')?></a>
		        </div>

		        <div id="navbar" class="navbar-collapse collapse">
		        	<ul class="nav navbar-nav">
		        		<li><a href="<?=site_url('treat')?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> 奢りをさがす</a></li>
		        	</ul>

		        	<ul class="nav navbar-nav navbar-right">
		        		<?php if( !$this->common_model->signed_in() ): ?>
		        			<li><a href="<?=site_url('user/register')?>">新規登録</a></li>
		        			<li><a href="<?=site_url('user/login')?>">ログイン</a></li>
		        		<?php else: ?>
		        			<li><a href="<?=site_url('user/logout')?>">ログアウト</a></li>
		        		<?php endif; ?>
		        	</ul>
		        </div><!--/.nav-collapse -->
	    	</div><!--/.container -->
	    </nav>

	    <?php if($this->session->flashdata('alert')): ?>
		    <div class="container">
			    <div class="alert alert-success" role="alert"><?=$this->session->flashdata('alert')?></div>
			</div>
		<?php endif; ?>