
<?php
if ($this->config->item('tinymce')) {
    if ($this->uri->segment(2) != 'attempt') {
        if ($this->uri->segment(2) != 'view_result') {

            if ($this->uri->segment(2) != 'config') {
                if ($this->uri->segment(2) != 'css') {
                    ?>
                    <!--script type="text/javascript" src="<?php echo base_url(); ?>editor/tiny_mce.js"></script-->
					<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>ressources/editor/skins/lightgray/content.min.css" />
                    <script type="text/javascript" src="<?php echo base_url(); ?>ressources/editor/tinymce.min.js"></script>
                    <script type="text/javascript">
                     
                    <?php
                    if ($this->uri->segment(2) == 'edit_quiz' || $this->uri->segment(2) == 'add_new') {
                        ?>
                        
                            /*tinyMCE.init({
                                mode: "textareas",
                                editor_selector: "tinymce_textarea",
                                theme: "advanced",
                                relative_urls: "false",
                                plugins: "jbimages,media",
                                audio_template_callback: function(data) {
                                    //return '<audio controls>' + '\n<source src="' + data.source1 + '"' + (data.source1mime ? ' type="' + data.source1mime + '"' : '') + ' />\n' + '</audio>';
                                    return '<audio controls preload="auto">' + '\n<source src="' + data.source1 + '"' + ' type="audio/mp3"' + ' />\n' + '</audio>';
                                },

                               
                        // ===========================================
                        // PUT PLUGIN'S BUTTON on the toolbar
                        // ===========================================



                                theme_advanced_buttons1: "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
                                theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
                                theme_advanced_buttons3: "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
                                theme_advanced_buttons4: "jbimages,insert,insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
                            });*/
							tinymce.init({
                                selector: "textarea",theme: "modern",width: 680,height: 300,
                                plugins: [
                                     "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                                     "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                                     "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
                               ],
                               audio_template_callback: function(data) {
                                     return '<audio controls>' + '\n<source src="' + data.source1 + '"' + (data.source1mime ? ' type="' + data.source1mime + '"' : '') + ' />\n' + '</audio>';
                                   },
                               toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
                               toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
                               image_advtab: true ,

                               external_filemanager_path:"<?php echo base_url(); ?>editor/plugins/responsivefilemanager/",
                               filemanager_title:"Responsive Filemanager" ,
                               external_plugins: { "filemanager" : "plugins/responsivefilemanager/plugin.min.js"}
                             });

                        <?php
                    } else {
                        ?>
                            
                            /*tinyMCE.init({
                                mode: "textareas",
                                theme: "advanced",
                                relative_urls: "false",
                                plugins: "jbimages,media",
                                //upload_file_name: 'userfile',//required
                                file_browser_callback : 'filebrowsercontainer',
                                //upload_action: 'upload.php',
                                //file_browser_callback_types: 'media',
                                audio_template_callback: function(data) {
                                    return '<audio controls preload="auto">' + '\n<source src="' + data.source1 + '"' + ' type="audio/mp3"' + ' />\n' + '</audio>';
                                },
                                       
                        // ===========================================
                        // PUT PLUGIN'S BUTTON on the toolbar
                        // ===========================================



                                theme_advanced_buttons1: "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
                                theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
                                theme_advanced_buttons3: "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
                                theme_advanced_buttons4: "jbimages,insert,insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
                            });*/
							tinymce.init({
                                selector: "textarea",theme: "modern",width: 680,height: 300,
                                plugins: [
                                     "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                                     "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                                     "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
                               ],
                               audio_template_callback: function(data) {
                                     return '<audio controls>' + '\n<source src="' + data.source1 + '"' + (data.source1mime ? ' type="' + data.source1mime + '"' : '') + ' />\n' + '</audio>';
                                   },
                               toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
                               toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
                               image_advtab: true ,

                               external_filemanager_path:"<?php echo base_url(); ?>editor/plugins/responsivefilemanager/",
                               filemanager_title:"Responsive Filemanager" ,
                               external_plugins: { "filemanager" : "plugins/responsivefilemanager/plugin.min.js"}
                             });

                        <?php
                    }
                    ?>

                    </script>


                    <?php
                }
            }
        }
    }
}
?>
                    
</body>
<footer>
        <div class=" col-lg-2"></div>
        <div class=" col-lg-3 footer"></div>
        <div class="col-lg-3 footer"></div>
        <div class="col-lg-4 right footer"></div>
</footer>
</html>

