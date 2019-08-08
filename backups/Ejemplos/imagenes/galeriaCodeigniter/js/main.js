$(document).ready(

function(e) {

var addUploadFormBtn = $("#addUploadForm");


addUploadFormBtn.on("click" , function(e) {

var div = $(this).parent().find(".formUploadObj").first();
var msgDiv = div.find(".sideMessage");
var divHTML = div.html();
var Wrapper = $(this).parent().find(".Wrapper");

msgDiv.html("");
formObj = $("<div class='formUploadObj'>"+divHTML+"</div>");
Wrapper.append(formObj);


});



$(document).on("submit", ".form_upload", function(e) {

var file = $(this).find("input[name=photo]").val();
var URL = $(this).find("input[name=URL]").val();
var msgDiv = $(this).parent().find(".sideMessage");


if (!file) { 


         msgDiv.html("Please choose an image to proceed");

         return false;

    } 



e.preventDefault();

var loadIcon = '<i class="fa fa-cog fa-spin fa-3x fa-fw"></i> Loading...';

msgDiv.html(loadIcon);

 $.ajax({


context: this, // the object in context 
url: URL, // Url to do the upload 
type: "POST",
async: true,             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,           // To send DOMDocument or non processed data file it is set to false
dataType: "text",       
success: function(data)   // A function to be called if request succeeds
{

msgDiv = $(this).parent().find(".sideMessage");

msgDiv.text(data);

console.log(data);

}
}); }); 


$("#thumbPrev").on("click", function(e) {





});

$("#thumbNext").on("click", function(e) {





});


});



