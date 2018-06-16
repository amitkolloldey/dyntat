
/*var editor = ace.edit('bb-ace-editor');
editor.setTheme("ace/theme/twilight");
editor.getSession().setMode("ace/mode/javascript");
editor.getSession().setTabSize(4);*/
 /* $('#invoice-edit-form').submit(function () {
    $('#html').val(editor.getSession().getValue());
  });*/
jQuery(document).ready(function() { 
	jQuery('.bbeditor').each(function(){
		var single_id	= jQuery(this).attr('id'),
			text_field	= jQuery(this).prev('.bbeditor-field');

if ( typeof ace !== 'undefined' ) {
		var editor = ace.edit(single_id);
		editor.setTheme("ace/theme/monokai");
		//editor.getSession().setMode("ace/mode/javascript");
		//editor.resize();
		editor.setValue(text_field.val());
		editor.getSession().on('change', function(e) {
		    text_field.val(editor.getSession().getValue());
		});
}

	});
});