/*
 Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
*/

CKEDITOR.plugins.add("xeditable", {
  icons: "xeditable",
  init: function(editor) {
    editor.ui.addButton("Xeditable", {
      label: "Select Xeditable type",
      command: "xeditableDialog",
      toolbar: "insert"
    });
    editor.addCommand(
      "xeditableDialog",
      new CKEDITOR.dialogCommand("xeditableDialog")
    );
  }
});
