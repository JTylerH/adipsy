<?php

/*
*  get all custom fields and dump for testing
*/

$fields = get_field_objects();
var_dump( $fields );

/*
*  get all custom fields, loop through them and create a label => value markup
*/

$allfields = get_field_objects();
$fields = $allfields['flex_section'];

if( $fields )
{
	foreach( $fields as $field_name => $field )
	{
		echo '<div>';
			echo '<h3>' . $field['label'] . '</h3>';
			echo $field['value'];
		echo '</div>';
	}
}

?>
