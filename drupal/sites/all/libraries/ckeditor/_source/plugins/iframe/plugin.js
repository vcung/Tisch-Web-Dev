<<<<<<< HEAD
<<<<<<< HEAD
﻿/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

(function()
{
	CKEDITOR.plugins.add( 'iframe',
	{
		requires : [ 'dialog', 'fakeobjects' ],
		init : function( editor )
		{
			var pluginName = 'iframe',
				lang = editor.lang.iframe;

			CKEDITOR.dialog.add( pluginName, this.path + 'dialogs/iframe.js' );
			editor.addCommand( pluginName, new CKEDITOR.dialogCommand( pluginName ) );

			editor.addCss(
				'img.cke_iframe' +
				'{' +
					'background-image: url(' + CKEDITOR.getUrl( this.path + 'images/placeholder.png' ) + ');' +
					'background-position: center center;' +
					'background-repeat: no-repeat;' +
					'border: 1px solid #a9a9a9;' +
					'width: 80px;' +
					'height: 80px;' +
				'}'
			);

			editor.ui.addButton( 'Iframe',
				{
					label : lang.toolbar,
					command : pluginName
				});

			editor.on( 'doubleclick', function( evt )
				{
					var element = evt.data.element;
					if ( element.is( 'img' ) && element.data( 'cke-real-element-type' ) == 'iframe' )
						evt.data.dialog = 'iframe';
				});

			if ( editor.addMenuItems )
			{
				editor.addMenuItems(
				{
					iframe :
					{
						label : lang.title,
						command : 'iframe',
						group : 'image'
					}
				});
			}

			// If the "contextmenu" plugin is loaded, register the listeners.
			if ( editor.contextMenu )
			{
				editor.contextMenu.addListener( function( element, selection )
					{
						if ( element && element.is( 'img' ) && element.data( 'cke-real-element-type' ) == 'iframe' )
							return { iframe : CKEDITOR.TRISTATE_OFF };
					});
			}
		},
		afterInit : function( editor )
		{
			var dataProcessor = editor.dataProcessor,
				dataFilter = dataProcessor && dataProcessor.dataFilter;

			if ( dataFilter )
			{
				dataFilter.addRules(
				{
					elements :
					{
						iframe : function( element )
						{
							return editor.createFakeParserElement( element, 'cke_iframe', 'iframe', true );
						}
					}
				});
			}
		}
	});
})();
=======
﻿/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

(function()
{
	CKEDITOR.plugins.add( 'iframe',
	{
		requires : [ 'dialog', 'fakeobjects' ],
		init : function( editor )
		{
			var pluginName = 'iframe',
				lang = editor.lang.iframe;

			CKEDITOR.dialog.add( pluginName, this.path + 'dialogs/iframe.js' );
			editor.addCommand( pluginName, new CKEDITOR.dialogCommand( pluginName ) );

			editor.addCss(
				'img.cke_iframe' +
				'{' +
					'background-image: url(' + CKEDITOR.getUrl( this.path + 'images/placeholder.png' ) + ');' +
					'background-position: center center;' +
					'background-repeat: no-repeat;' +
					'border: 1px solid #a9a9a9;' +
					'width: 80px;' +
					'height: 80px;' +
				'}'
			);

			editor.ui.addButton( 'Iframe',
				{
					label : lang.toolbar,
					command : pluginName
				});

			editor.on( 'doubleclick', function( evt )
				{
					var element = evt.data.element;
					if ( element.is( 'img' ) && element.data( 'cke-real-element-type' ) == 'iframe' )
						evt.data.dialog = 'iframe';
				});

			if ( editor.addMenuItems )
			{
				editor.addMenuItems(
				{
					iframe :
					{
						label : lang.title,
						command : 'iframe',
						group : 'image'
					}
				});
			}

			// If the "contextmenu" plugin is loaded, register the listeners.
			if ( editor.contextMenu )
			{
				editor.contextMenu.addListener( function( element, selection )
					{
						if ( element && element.is( 'img' ) && element.data( 'cke-real-element-type' ) == 'iframe' )
							return { iframe : CKEDITOR.TRISTATE_OFF };
					});
			}
		},
		afterInit : function( editor )
		{
			var dataProcessor = editor.dataProcessor,
				dataFilter = dataProcessor && dataProcessor.dataFilter;

			if ( dataFilter )
			{
				dataFilter.addRules(
				{
					elements :
					{
						iframe : function( element )
						{
							return editor.createFakeParserElement( element, 'cke_iframe', 'iframe', true );
						}
					}
				});
			}
		}
	});
})();
>>>>>>> 3c233a519e8546032631f6d31915c0a728a8cd53
=======
﻿/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

(function()
{
	CKEDITOR.plugins.add( 'iframe',
	{
		requires : [ 'dialog', 'fakeobjects' ],
		init : function( editor )
		{
			var pluginName = 'iframe',
				lang = editor.lang.iframe;

			CKEDITOR.dialog.add( pluginName, this.path + 'dialogs/iframe.js' );
			editor.addCommand( pluginName, new CKEDITOR.dialogCommand( pluginName ) );

			editor.addCss(
				'img.cke_iframe' +
				'{' +
					'background-image: url(' + CKEDITOR.getUrl( this.path + 'images/placeholder.png' ) + ');' +
					'background-position: center center;' +
					'background-repeat: no-repeat;' +
					'border: 1px solid #a9a9a9;' +
					'width: 80px;' +
					'height: 80px;' +
				'}'
			);

			editor.ui.addButton( 'Iframe',
				{
					label : lang.toolbar,
					command : pluginName
				});

			editor.on( 'doubleclick', function( evt )
				{
					var element = evt.data.element;
					if ( element.is( 'img' ) && element.data( 'cke-real-element-type' ) == 'iframe' )
						evt.data.dialog = 'iframe';
				});

			if ( editor.addMenuItems )
			{
				editor.addMenuItems(
				{
					iframe :
					{
						label : lang.title,
						command : 'iframe',
						group : 'image'
					}
				});
			}

			// If the "contextmenu" plugin is loaded, register the listeners.
			if ( editor.contextMenu )
			{
				editor.contextMenu.addListener( function( element, selection )
					{
						if ( element && element.is( 'img' ) && element.data( 'cke-real-element-type' ) == 'iframe' )
							return { iframe : CKEDITOR.TRISTATE_OFF };
					});
			}
		},
		afterInit : function( editor )
		{
			var dataProcessor = editor.dataProcessor,
				dataFilter = dataProcessor && dataProcessor.dataFilter;

			if ( dataFilter )
			{
				dataFilter.addRules(
				{
					elements :
					{
						iframe : function( element )
						{
							return editor.createFakeParserElement( element, 'cke_iframe', 'iframe', true );
						}
					}
				});
			}
		}
	});
})();
>>>>>>> 444740077eb6a07cd49a4296d1b3d5aebb65b9a5
