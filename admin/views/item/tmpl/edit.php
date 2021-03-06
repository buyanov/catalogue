<?php
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');

$app = JFactory::getApplication();
$categoryId = $app->getUserStateFromRequest('com_catalogue.catalogue.filter.cat_id', 'filter_cat_id', '');

?>

<script type="text/javascript">
	Joomla.submitbutton = function(task) {
		if (task == 'item.cancel' || document.formvalidator.isValid(document.id('item-form'))) {
			<?php echo $this->form->getField('item_description')->save(); ?>
			Joomla.submitform(task, document.getElementById('item-form'));
		} else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
	}
	
	window.addEvent('domready', function(){
		$('paramsTableAdd').addEvent('click', function(e){
			e.stop();
			var tr = new Element('tr');
			var remove = new Element('a').set({
				class: "btn btn-danger btn-small",
				events: {
					click : function(e){
						e.stop();
						this.getParent('tr').dispose();
					}
				}
			}).appendText('Удалить');
			
			tr.innerHTML = '<td class="span2"><input type="text" class="inputBox required" name="jform[params][name][]" /></td><td class="span1"><input type="text" class="inputBox required" name="jform[params][count][]" /></td><td class="span1"><input type="text" class="inputBox required" name="jform[params][price][]" /></td><td class="span2"></td>';
			tr.getElement('td:last-child').adopt(remove);
			$('paramsTable').adopt(tr);
		})
		
		$$('.paramsTableRemove').each(function(el){
			el.addEvent('click', function(e){
				e.stop();
				this.getParent('tr').dispose();
			})
		})

	})
	
</script>

<form action="<?php echo JRoute::_('index.php?option=com_catalogue&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="item-form" class="form-validate form-vertical">
<div class="span12 form-vertical">
<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'details')); ?>

		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'details', JText::_('COM_CATALOGUE_ITEM_DETAILS', true)); ?>
				<div class="span5">
					<div class="row-fluid">
						<div class="span6">
							<div class="control-group">
								<div class="control-label">
									<?php echo $this->form->getLabel('item_name'); ?>
								</div>
								<div class="controls">
									<?php echo $this->form->getInput('item_name'); ?>
								</div>
							</div>
						</div>
						
						<div class="span5">
							<div class="control-group">
								<div class="control-label">
									<?php echo $this->form->getLabel('alias'); ?>
								</div>
								<div class="controls">
									<?php echo $this->form->getInput('alias'); ?>
								</div>
							</div>
						</div>
					</div>

					<div class="row-fluid">
						<div class="span6">
							<div class="control-group">
								<div class="control-label">
									<?php echo $this->form->getLabel('item_art'); ?>
								</div>
								<div class="controls">
									<?php echo $this->form->getInput('item_art'); ?>
								</div>
							</div>
						</div>
						<div class="span5">
							<div class="control-group">
								<div class="control-label">
									<?php echo $this->form->getLabel('item_count'); ?>
								</div>
								<div class="controls">
									<?php echo $this->form->getInput('item_count'); ?>
								</div>
							</div>
						</div>	
					</div>

					<div class="row-fluid">
						<div class="span6">
							<div class="control-group">
								<div class="control-label">
									<?php echo $this->form->getLabel('category_id'); ?>
								</div>
								<div class="controls">
									<?php echo $this->form->getInput('category_id'); ?>
								</div>
							</div>
						</div>
						<div class="span5">
							<div class="control-group">
								<div class="control-label">
									<?php echo $this->form->getLabel('manufacturer_id'); ?>
								</div>
								<div class="controls">
									<?php echo $this->form->getInput('manufacturer_id'); ?>
								</div>
							</div>
						</div>	
					</div>
					<div class="row-fluid">
						<div class="span6">
							<div class="control-group">
								<div class="control-label">
									<?php echo $this->form->getLabel('price'); ?>
								</div>
								<div class="controls">
									<?php echo $this->form->getInput('price'); ?>
								</div>
							</div>
						</div>
						<div class="span5">
							<div class="control-group">
								<div class="control-label">
									<?php echo $this->form->getLabel('item_sale'); ?>
								</div>
								<div class="controls">
									<?php echo $this->form->getInput('item_sale'); ?>
								</div>
							</div>
						</div>		
					</div>
					<div class="row-fluid">
						<div class="span6">
							<div class="control-group">
								<div class="control-label">
									<?php echo $this->form->getLabel('sticker'); ?>
								</div>
								<div class="controls">
									<?php echo $this->form->getInput('sticker'); ?>
								</div>
							</div>
						</div>
						<div class="span5">
							<div class="control-group">
								<div class="control-label">
									<?php echo $this->form->getLabel('rate'); ?>
								</div>
								<div class="controls">
									<?php echo $this->form->getInput('rate'); ?>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row-fluid">
						<div class="control-group">
							<div class="control-label">
								<?php echo $this->form->getLabel('state'); ?>
							</div>
							<div class="controls">
								<?php echo $this->form->getInput('state'); ?>
							</div>
						</div>
						<div class="control-group">
							<div class="control-label">
								<?php echo $this->form->getLabel('id'); ?>
							</div>
							<div class="controls">
								<?php echo $this->form->getInput('id'); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="span7">
					<div class="control-group">
						<div class="control-label">
							<?php echo $this->form->getLabel('item_image'); ?>
						</div>
						<div class="controls">
							<?php echo $this->form->getInput('item_image'); ?>
						</div>
						<div class="controls">
							<?php echo $this->form->getInput('item_image_2'); ?>
						</div>
						<div class="controls">
							<?php echo $this->form->getInput('item_image_3'); ?>
						</div>
						<div class="controls">
							<?php echo $this->form->getInput('item_image_4'); ?>
						</div>
						<div class="controls">
							<?php echo $this->form->getInput('item_image_5'); ?>
						</div>
					</div>
					<div class="control-group">
						<div class="control-label">
							<?php echo $this->form->getLabel('item_description'); ?>
						</div>
						<div class="controls">
							<?php echo $this->form->getInput('item_description'); ?>
						</div>
					</div>
				</div>
		<?php echo JHtml::_('bootstrap.endTab'); ?>
		
			
		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'metadata', JText::_('COM_CATALOGUE_METADATA', true)); ?>
		<div class="row-fluid form-horizontal-desktop">
			<div class="span6">
				<?php echo JLayoutHelper::render('joomla.edit.metadata', $this); ?>
			</div>
		</div>
		<?php echo JHtml::_('bootstrap.endTab'); ?>
	
		<?php echo JLayoutHelper::render('joomla.edit.params', $this); ?>
		
<?php echo JHtml::_('bootstrap.endTabSet'); ?>

	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
