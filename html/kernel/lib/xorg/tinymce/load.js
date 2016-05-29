tinymce.init({
    selector: "textarea",theme: "modern",width: 680,height: 300,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
   ],
   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
   image_advtab: true ,
   
   external_filemanager_path:"/kernel/lib/filemanager/",
   filemanager_title:"File manager" ,
   external_plugins: { "filemanager" : "/kernel/lib/filemanager/plugin.min.js"}
 });