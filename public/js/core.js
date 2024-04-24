
/*DropDown Selectro*/
 $('.jSelectbox').select2(); 

/*DatePicker Date Selector*/
$('.date').datepicker({
  dateFormat: 'yy-mm-dd' // Set the date format to yyyy-mm-dd
});

/*Display Image While Update or Add*/
 function displayImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            document.getElementById('selectedImage').setAttribute('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

/*Display Icon While Update or add*/
function displayIcon(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            document.getElementById('selectedIcon').setAttribute('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

/*Tinymice Reach Editor*/
handleRichEditor();
function handleRichEditor(){
    /*For rich-editor Class*/
    tinymce.init({
    selector: "textarea.rich-editor",
    plugins: [
    "advlist autolink link image imagetools lists charmap print preview hr anchor pagebreak",
    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
    "save table contextmenu directionality paste textcolor jbimages nanospell"
    ],
    toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages | preview media fullpage | forecolor backcolor",
    nanospell_server: "php", // choose "php" "asp" "asp.net" or "java"
    relative_urls: false,
    paste_as_text: true,
    textcolor_cols: "10",
    textcolor_map: [
    "FFFFFF", "White",
    "000000", "Black",
    "993300", "Burnt orange",
    "333300", "Dark olive",
    "003300", "Dark green",
    "003366", "Dark azure",
    "000080", "Navy Blue",
    "333399", "Indigo",
    "333333", "Very dark gray",
    "800000", "Maroon",
    "FF6600", "Orange",
    "808000", "Olive",
    "008000", "Green",
    "008080", "Teal",
    "0000FF", "Blue",
    "666699", "Grayish blue",
    "808080", "Gray",
    "FF0000", "Red",
    "FF9900", "Amber",
    "99CC00", "Yellow green",
    "339966", "Sea green",
    "33CCCC", "Turquoise",
    "3366FF", "Royal blue",
    "800080", "Purple",
    "999999", "Medium gray",
    "FF00FF", "Magenta",
    "FFCC00", "Gold",
    "FFFF00", "Yellow",
    "00FF00", "Lime",
    "00FFFF", "Aqua",
    "00CCFF", "Sky blue",
    "993366", "Red violet",
    "FF99CC", "Pink",
    "FFCC99", "Peach",
    "FFFF99", "Light yellow",
    "CCFFCC", "Pale green",
    "CCFFFF", "Pale cyan",
    "99CCFF", "Light sky blue",
    "CC99FF", "Plum"
  ],
    extended_valid_elements: 'span[class|style],i[class|aria-hidden]'
});

/*rich-editor-min-toolbar*/
 tinymce.init({
    selector: "textarea.rich-editor-min-toolbar",
    plugins: [
    "advlist lists link preview hr",
    "searchreplace wordcount nonbreaking",
    "directionality paste nanospell textcolor"
    ],
    toolbar: "undo redo | bold italic | strikethrough superscript subscript | alignleft aligncenter alignright alignjustify | bullist numlist | forecolor backcolor",
    nanospell_server: "php", // choose "php" "asp" "asp.net" or "java"
    relative_urls: false,
    paste_as_text: true,
    textcolor_cols: "10",
    textcolor_map: [
    "FFFFFF", "White",
    "000000", "Black",
    "993300", "Burnt orange",
    "333300", "Dark olive",
    "003300", "Dark green",
    "003366", "Dark azure",
    "000080", "Navy Blue",
    "333399", "Indigo",
    "333333", "Very dark gray",
    "800000", "Maroon",
    "FF6600", "Orange",
    "808000", "Olive",
    "008000", "Green",
    "008080", "Teal",
    "0000FF", "Blue",
    "666699", "Grayish blue",
    "808080", "Gray",
    "FF0000", "Red",
    "FF9900", "Amber",
    "99CC00", "Yellow green",
    "339966", "Sea green",
    "33CCCC", "Turquoise",
    "3366FF", "Royal blue",
    "800080", "Purple",
    "999999", "Medium gray",
    "FF00FF", "Magenta",
    "FFCC00", "Gold",
    "FFFF00", "Yellow",
    "00FF00", "Lime",
    "00FFFF", "Aqua",
    "00CCFF", "Sky blue",
    "993366", "Red violet",
    "FF99CC", "Pink",
    "FFCC99", "Peach",
    "FFFF99", "Light yellow",
    "CCFFCC", "Pale green",
    "CCFFFF", "Pale cyan",
    "99CCFF", "Light sky blue",
    "CC99FF", "Plum"
  ],
    extended_valid_elements: 'span[class|style],i[class|aria-hidden]'
});
};