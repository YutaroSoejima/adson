<?php $this->load->view('header');?>

<div class="jumbotron">
  <div class="container">
    <h1>奢りをさがす</h1>
    <p>
      話を聞いてみたい人事のお兄さん、お姉さんを探してみましょう！
    </p>
  </div>
</div>

<div class="container">
  <div class="list-group">
  	<?php foreach ($treat_proposals as $row):?>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title overflow-dotted"><a href='<?=site_url("t/$row->id")?>'><?=$row->title?></a></h3>
        </div>
        <div class="panel-body">
              <a href='<?=site_url("treat/$row->id")?>'><?=mb_strimwidth($row->content, 0, 400, "...")?></a>
        </div>
        <div class="panel-footer text-right"><span class="glyphicon glyphicon-tower" aria-hidden="true"></span> <?=$this->common_model->get_column("name", $row->client_id, "clients")?></div>
      </div>
  	<?php endforeach;?>
  </div>
</div><!-- /.container -->

<?php $this->load->view('footer');?>