$(document).ready(function () {
    load_dogs();
});

function load_dogs(){
	$.ajax({
        type: 'POST',
        url: amigable("?module=dogs&function=load_info_dog"),
        data:{"load":true},
    }).done(function (data) {
        var json = JSON.parse(data);
        print_dog(json);
    }).fail(function (xhr) {
        alert(xhr.responseText);
    });
}
    
function print_dog(data){
    console.log(data.dogs)
	var data_dogs = "<div id='content_img'><img src='" + data.dogs.dogpic + "'></div><div id='content_info'><div id='header_list'><span>Nombre: " + data.dogs.dname + "</span><br><span> Raza: " + data.dogs.breed + "</span></div>" +
					"<div id='content_list'><span>Sexo: " + data.dogs.sex + "</span><br><span> Estatura: " + data.dogs.stature + "</span></div>"+
					"<div id='footer_list'>Nacimiento: " + data.dogs.date_birth + "</div></div>";
  	$("#content_result").append(data_dogs);
    $("#dbmessage").append(data.message);
}
