<?php defined('_JEXEC') or die; 
JHtml::_('behavior.caption');
$start = microtime(true);
$hotlink = JRoute::_( 'index.php?option=com_catalogue&view=hotitems&Itemid=111' );
$newlink = JRoute::_( 'index.php?option=com_catalogue&view=hotitems&Itemid=112' );
?>
<form action="index.php?Itemid=105" method="post" id="catalogueForm">
	<div class="row">
		<div class="left-menu span3">
			<?php echo $this->loadTemplate('left'); ?>
			<ul class="unstyled hot-new-items">
    		<li>&mdash;<a href="<?php echo $hotlink; ?>">Популярные товары</a></li>
    		<li>&mdash;<a href="<?php echo $newlink; ?>">Новинки</a></li>
			</ul>
		</div>
		<div class="catalogue-categories span9" id="catalogue">
			<?php echo $this->loadTemplate('items'); ?>
		</div>
	</div>
	<div class="row">
		<div class="span9 offset3">
			<div class="pagination"><?php if($this->pagination->getPagesLinks()) echo '<span>Страницы:</span>'; echo $this->pagination->getPagesLinks(); ?></div>
		</div>
	</div>
	<input type="hidden" name="option" value="com_catalogue" />
	<input type="hidden" name="task" value="" />
</form>