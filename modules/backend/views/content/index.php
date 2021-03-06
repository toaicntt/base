<h1 class="tit">
  <?php
  echo $template['title'];
  ?>
  <?php echo anchor(site_url(ADMIN_FOLDER.'/posts/add'),'Add New','class="page-title-action"');?>
</h1>
<ul class="subsubsub">
  <li class="all">
    <?php echo anchor(site_url(ADMIN_FOLDER.'/posts'),'All <span class="count">(3)</span>',array('class'=>($this->uri->segment(3) =='')?'current':''));?>  |
  </li>
  <li class="publish">
    <?php echo anchor(site_url(ADMIN_FOLDER.'/posts/published'),'Published <span class="count">(2)</span>',array('class'=>($this->uri->segment(3) =='published')?'current':''));?>  |
  </li>
  <li class="draft">
    <?php echo anchor(site_url(ADMIN_FOLDER.'/posts/draft'),'Draft <span class="count">(1)</span>',array('class'=>($this->uri->segment(3) =='draft')?'current':''));?>
  </li>
</ul>
<form class="form-inline">
  <div class="form-group">
    <select class="form-control input-sm" name="action">
      <option value="-1">All dates</option>
      <option value="trash">09/2015</option>
      <option value="trash">10/2015</option>
    </select>
  </div>
  <div class="form-group">
    <select class="form-control input-sm" name="action">
      <option value="-1">All Categories</option>
      <option value="trash">Category 1</option>
      <option value="trash">Category 2</option>
    </select>
  </div>
  <div class="form-group">
    <input type="text" name="name" value="" class="form-control input-sm">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-default btn-sm">Filter</button>
  </div>
</form>
<br class="clear">
<div class="table-responsive">
  <table class="table table-striped ">
    <thead>
      <tr>
        <td>
          <input type="checkbox" name="name" value="">
        </td>
        <td>
          <a href="#">Title</a>
        </td>
        <td>
          Author
        </td>
        <td>
          Categories
        </td>
        <td>
          <a href="#">Date</a>
        </td>
      </tr>
    </thead>
    <tbody>
      <?php
      if(isset($posts) && !empty($posts)):
        foreach ($posts as $key => $post) :
          ?>
          <tr>
            <td>
              <input type="checkbox" name="name" value="">
            </td>
            <td>
              <strong>
                <?php echo anchor(site_url(ADMIN_FOLDER.'/edit/'.$post['ID']),($post['post_title'] == '')?'(no title)':$post['post_title']);?>
                <?php ($post['post_status'] == 'draft')? print(' - <span class="post_state">Draft</span>') : print('')?>
              </strong>
              <div class="row_action">
                <span><a href="#">View</a> |</span>
                <span><?php echo anchor(site_url(ADMIN_FOLDER.'/posts/edit/'.$post['ID']),'Edit');?> |</span>
                <span><?php echo anchor(site_url(ADMIN_FOLDER.'/posts/trash/'.$post['ID']),'Move to Trash','class="trash"');?> |</span>
                <span><?php echo anchor(site_url(ADMIN_FOLDER.'/posts/delete/'.$post['ID']),'Delete','class="delete"');?> </span>

              </div>
            </td>
            <td>
              Admin
            </td>
            <td>
              Category 1
            </td>
            <td>
              <?php echo date('Y-m-d',strtotime($post['post_date'])); ?> <br>
              Published
            </td>
          </tr>
          <?php
        endforeach;
        endif
        ?>
      </tbody>
    </table>
  </div>

  <form class="form-inline" action="index.html" method="post">
    <div class="form-group">
      <select class="form-control input-sm" name="action">
        <option value="-1">Bulk Actions</option>
        <option value="trash">Public</option>
        <option value="trash">Move to Trash</option>
        <option value="trash">Delete</option>
      </select>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-default btn-sm">Apply</button>
    </div>
  </form>
