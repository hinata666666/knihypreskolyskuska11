<ul class="sidebar-menu">
<li class="header">MENU</li>
<?php
    $active = ($this->params->controller=='books' or $this->params->controller=='pages') ? 'active' : '';
    $active_in = ($active=='active') ? 'menu-open' : '';
    echo '<li class="treeview '.$active.'">';
    echo $this->Html->link('<i class="fa fa-book fa-fw"></i> <span>'. __('Učebnice').'</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>', ['#'=>''], ['escape'=>false]);

    echo '<ul class="treeview-menu '.$active_in.'">';
      echo '<li class="'. (($this->params->controller=='pages' && $this->params->action=="search") ? "active" : "").'">'.$this->Html->link('<i class="fa fa-search"></i>'. __('Hľadať'), ['controller'=>'pages', 'action'=>'index'], ['escape'=>false]).'</li>';
      echo '<li class="'. (($active=="active" && $this->params->action=="index") ? "active" : "").'">'.$this->Html->link('<i class="fa fa-list"></i>'. __('Zoznam'), ['controller'=>'books', 'action'=>'index'], ['escape'=>false]).'</li>';
      if($user['type'] != '2') {
      if($user['type'] != '1') {
      echo '<li class="'. (($active=="active" && $this->params->action=="edit" && empty($this->params->pass)) ? "active" : "").'">'.$this->Html->link('<i class="fa fa-plus"></i>'. __('Pridať'), ['controller'=>'books', 'action'=>'edit'], ['escape'=>false]).'</li>'; } }
    echo '</ul>';
    echo '</li>';

if($user['type'] != '3') {
if($user['type'] != '1') {

    $active = ($this->params->controller=='users') ? 'active' : '';
    $active_in = ($active=='active') ? 'menu-open' : '';
    echo '<li class="treeview '.$active.'">';
    echo $this->Html->link('<i class="fa fa-user fa-fw"></i> <span>'. __('Používatelia').'</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>', ['#'=>''], ['escape'=>false]);

    echo '<ul class="treeview-menu '.$active_in.'">';
      echo '<li class="'. (($active=="active" && $this->params->action=="index") ? "active" : "").'">'.$this->Html->link('<i class="fa fa-list"></i>'. __('Zoznam'), ['controller'=>'users', 'action'=>'index'], ['escape'=>false]).'</li>';
      echo '<li class="'. (($active=="active" && $this->params->action=="edit" && empty($this->params->pass)) ? "active" : "").'">'.$this->Html->link('<i class="fa fa-plus"></i>'. __('Pridať'), ['controller'=>'users', 'action'=>'edit'], ['escape'=>false]).'</li>';
    echo '</ul>';
    echo '</li>';
 } 
}

if($user['type'] != '2') {
if($user['type'] != '3') {
    $active = ($this->params->controller=='libraries') ? 'active' : '';
    $active_in = ($active=='active') ? 'menu-open' : '';
    echo '<li class="treeview '.$active.'">';
    echo $this->Html->link('<i class="fa fa-briefcase fa-fw"></i> <span>'. __('Knižnica ').'</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>', ['#'=>''], ['escape'=>false]);

    echo '<ul class="treeview-menu '.$active_in.'">';
      echo '<li class="'. (($active=="active" && $this->params->action=="index") ? "active" : "").'">'.$this->Html->link('<i class="fa fa-list  "></i>'. __('Zoznam'), ['controller'=>'libraries', 'action'=>'index'], ['escape'=>false]).'</li>';
     
    echo '</ul>';
    echo '</li>';
}
}
?>

</ul> 