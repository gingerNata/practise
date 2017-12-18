<?php
/* @var $this PostController */
/* @var $data Post */
?>

<div class="view">

	<b><?php echo CHtml::link($data->title, 'post/view/' . $data->id);?></b>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pub_date')); ?>:</b>
	<?php echo CHtml::encode($data->pub_date); ?>
	<br />


</div>