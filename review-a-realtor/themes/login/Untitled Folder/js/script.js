var abc = 0; //Declaring and defining global increement variable

$(document).ready(function() {

//To add new input file field dynamically, on click of "Add More Files" button below function will be executed
    $('#add_more').click(function() {
        $(this).before($("<div/>", {id: 'filediv'}).fadeIn('slow').append(
                $("<input/>", {name: 'file[]', type: 'file', id: 'file'}), 
                
                $("<br/><br/>")
                ));
    });
    
  

//following function will executes on change event of file input to select different file	
$('body').on('change', '#file', function(){



            if (this.files && this.files[0]) {
                 abc += 1; //increementing global variable by 1
									
				var z = abc - 1;
                var x = $(this).parent().find('#previewimg' + z).remove();
                //$(this).before("<div id='abcd"+ abc +"' class='abcd'><img id='previewimg" + abc + "' class='set_images  left_image' src=''/></div><div class='abcd'><input type='radio' class='clRadio'  name='main"+z+"' value='0' onselect='updateValue(this.id);'></div>");
		if( z == 0 )
		{
			$(this).before("<div id='abcd"+ abc +"' class='abcd'><img id='previewimg" + abc + "' class='set_images  left_image' src=''/></div><div class='abcd'><input type='radio' class='clRadio' id='"+z+"' name='main' value='0' onchange='javascript: updateMainImage(this.id);' checked><label class='lblSetAsMain'>Set as Main</label></div>");
		}
		else
		{
			$(this).before("<div id='abcd"+ abc +"' class='abcd'><img id='previewimg" + abc + "' class='set_images  left_image' src=''/></div><div class='abcd'><input type='radio' class='clRadio' id='"+z+"' name='main' value='0' onchange='javascript: updateMainImage(this.id);'><label class='lblSetAsMain'>Set as Main</label></div>");
		}
          
			    var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
               
			    $(this).hide();
                $("#abcd"+ abc).append($("<img/>", {id: 'img', src: 'x.png', alt: 'delete'}).click(function() {
                $(this).parent().parent().remove();
                }));
            }
        });

//To preview image     
    function imageIsLoaded(e) {
        $('#previewimg' + abc).attr('src', e.target.result);
    };

    $('#upload').click(function(e) {
        var name = $(":file").val();
        if (!name)
        {
            alert("First Image Must Be Selected");
            e.preventDefault();
        }
    });
});
