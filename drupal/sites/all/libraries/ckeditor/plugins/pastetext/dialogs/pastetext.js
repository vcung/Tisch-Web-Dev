<<<<<<< HEAD
<<<<<<< HEAD
﻿/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

(function(){CKEDITOR.dialog.add('pastetext',function(a){return{title:a.lang.pasteText.title,minWidth:CKEDITOR.env.ie&&CKEDITOR.env.quirks?368:350,minHeight:240,onShow:function(){this.setupContent();},onOk:function(){this.commitContent();},contents:[{label:a.lang.common.generalTab,id:'general',elements:[{type:'html',id:'pasteMsg',html:'<div style="white-space:normal;width:340px;">'+a.lang.clipboard.pasteMsg+'</div>'},{type:'textarea',id:'content',className:'cke_pastetext',onLoad:function(){var b=this.getDialog().getContentElement('general','pasteMsg').getElement(),c=this.getElement().getElementsByTag('textarea').getItem(0);c.setAttribute('aria-labelledby',b.$.id);c.setStyle('direction',a.config.contentsLangDirection);},focus:function(){this.getElement().focus();},setup:function(){this.setValue('');},commit:function(){var b=this.getValue();setTimeout(function(){a.fire('paste',{text:b});},0);}}]}]};});})();
=======
﻿/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

(function(){CKEDITOR.dialog.add('pastetext',function(a){return{title:a.lang.pasteText.title,minWidth:CKEDITOR.env.ie&&CKEDITOR.env.quirks?368:350,minHeight:240,onShow:function(){this.setupContent();},onOk:function(){this.commitContent();},contents:[{label:a.lang.common.generalTab,id:'general',elements:[{type:'html',id:'pasteMsg',html:'<div style="white-space:normal;width:340px;">'+a.lang.clipboard.pasteMsg+'</div>'},{type:'textarea',id:'content',className:'cke_pastetext',onLoad:function(){var b=this.getDialog().getContentElement('general','pasteMsg').getElement(),c=this.getElement().getElementsByTag('textarea').getItem(0);c.setAttribute('aria-labelledby',b.$.id);c.setStyle('direction',a.config.contentsLangDirection);},focus:function(){this.getElement().focus();},setup:function(){this.setValue('');},commit:function(){var b=this.getValue();setTimeout(function(){a.fire('paste',{text:b});},0);}}]}]};});})();
>>>>>>> 3c233a519e8546032631f6d31915c0a728a8cd53
=======
﻿/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

(function(){CKEDITOR.dialog.add('pastetext',function(a){return{title:a.lang.pasteText.title,minWidth:CKEDITOR.env.ie&&CKEDITOR.env.quirks?368:350,minHeight:240,onShow:function(){this.setupContent();},onOk:function(){this.commitContent();},contents:[{label:a.lang.common.generalTab,id:'general',elements:[{type:'html',id:'pasteMsg',html:'<div style="white-space:normal;width:340px;">'+a.lang.clipboard.pasteMsg+'</div>'},{type:'textarea',id:'content',className:'cke_pastetext',onLoad:function(){var b=this.getDialog().getContentElement('general','pasteMsg').getElement(),c=this.getElement().getElementsByTag('textarea').getItem(0);c.setAttribute('aria-labelledby',b.$.id);c.setStyle('direction',a.config.contentsLangDirection);},focus:function(){this.getElement().focus();},setup:function(){this.setValue('');},commit:function(){var b=this.getValue();setTimeout(function(){a.fire('paste',{text:b});},0);}}]}]};});})();
>>>>>>> 444740077eb6a07cd49a4296d1b3d5aebb65b9a5
