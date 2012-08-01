(function(){

	// Creates a new plugin class and a custom listbox
	tinymce.create('tinymce.plugins.csshortcodes', {
	
		createControl: function(n, cm) {
			switch (n) {
				case 'shortcodesbutton':
					var c = cm.createMenuButton('shortcodesbutton', {
						title : 'Shortcodes Menu',
						image : '',
						icons : false
					});
	
					c.onRenderMenu.add(function(c, m) {
						var sub;
						var selection = '';
	
						// Layout Shortcodes
						sub = m.addMenu({title : 'Layout Shortcodes'});
						
						sub.add({title : '1/2 Column', onclick : function() {
							selection = tinyMCE.activeEditor.selection.getContent();
							tinyMCE.activeEditor.selection.setContent('[one_half]'+selection+'[/one_half]');
						}});
	
						sub.add({title : '1/2 Column Last', onclick : function() {
							selection = tinyMCE.activeEditor.selection.getContent();
							tinyMCE.activeEditor.selection.setContent('[one_half_last]'+selection+'[/one_half_last]');
						}});
						
						sub.add({title : '1/3 Column', onclick : function() {
							selection = tinyMCE.activeEditor.selection.getContent();
							tinyMCE.activeEditor.selection.setContent('[one_third]'+selection+'[/one_third]');
						}});
	
						sub.add({title : '1/3 Column Last', onclick : function() {
							selection = tinyMCE.activeEditor.selection.getContent();
							tinyMCE.activeEditor.selection.setContent('[one_third_last]'+selection+'[/one_third_last]');
						}});
						
						sub.add({title : '2/3 Column', onclick : function() {
							selection = tinyMCE.activeEditor.selection.getContent();
							tinyMCE.activeEditor.selection.setContent('[two_third]'+selection+'[/two_third]');
						}});
	
						sub.add({title : '2/3 Column Last', onclick : function() {
							selection = tinyMCE.activeEditor.selection.getContent();
							tinyMCE.activeEditor.selection.setContent('[two_third_last]'+selection+'[/two_third_last]');
						}});
						
						sub.add({title : '1/4 Column', onclick : function() {
							selection = tinyMCE.activeEditor.selection.getContent();
							tinyMCE.activeEditor.selection.setContent('[one_fourth]'+selection+'[/one_fourth]');
						}});
	
						sub.add({title : '1/4 Column Last', onclick : function() {
							selection = tinyMCE.activeEditor.selection.getContent();
							tinyMCE.activeEditor.selection.setContent('[one_fourth_last]'+selection+'[/one_fourth_last]');
						}});
						
						sub.add({title : '3/4 Column', onclick : function() {
							selection = tinyMCE.activeEditor.selection.getContent();
							tinyMCE.activeEditor.selection.setContent('[three_fourth]'+selection+'[/three_fourth]');
						}});
	
						sub.add({title : '3/4 Column Last', onclick : function() {
							selection = tinyMCE.activeEditor.selection.getContent();
							tinyMCE.activeEditor.selection.setContent('[three_fourth_last]'+selection+'[/three_fourth_last]');
						}});
						
						
						// Media Shortcodes
						sub = m.addMenu({title : 'Media Shortcodes'});
	
						sub.add({title : 'Media Embed', onclick : function() {
							selection = tinyMCE.activeEditor.selection.getContent();
							tinyMCE.activeEditor.selection.setContent('[embed width="550" height="400"]'+selection+'[/embed]');
						}});
						
						sub.add({title : 'Email Address', onclick : function() {
							selection = tinyMCE.activeEditor.selection.getContent();
							tinyMCE.activeEditor.selection.setContent('[emailaddy name="NAME" domain="DOMAIN.com"]');
						}});
						
	
						sub.add({title : 'Google Map URL', onclick : function() {
							selection = tinyMCE.activeEditor.selection.getContent();
							tinyMCE.activeEditor.selection.setContent('[googlemap width="550" height="400"]'+selection+'[/googlemap]');
						}});
						
					});
	
					// Return the new menu button instance
					return c;
			}
	
			//return null;
		}
	});
	
	// Register plugin with a short name
	tinymce.PluginManager.add('c7s_shortcodes', tinymce.plugins.csshortcodes);
	
	// Initialize TinyMCE with the new plugin and menu button
	tinyMCE.init({
		plugins : '-c7s_shortcodes' // - tells TinyMCE to skip the loading of the plugin
	});
	
})()