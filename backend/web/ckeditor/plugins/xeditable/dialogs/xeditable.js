/*
 Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
*/
CKEDITOR.dialog.add("xeditable", function(a) {
  return {
    title: "Select x editabel",
    minWidth: 400,
    minHeight: 200,
    content: [
      {
        id: "tab-basic",
        label: "Basic Settings",
        elements: []
      },
      {
        id: "tab-adv",
        label: "Advanced Settings",
        elements: []
      }
    ]
  };
});
