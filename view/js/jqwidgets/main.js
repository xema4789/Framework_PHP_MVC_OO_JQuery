function amigable(url){
    var link="";
    url= url.replace("?", "");
    url=url.split("&");
    cont=0;

    for(var i=0; i<url.length;i++){
        cont++;
        var aux = url[i].split("_");
        if(cont==2){
            link+= "/"+aux[i]+"/";
        }else{
            link+="/"+aux[i];
        }
    }

    return "/Programacion/Tema5_1.0/Tema5_1.0/Framework/"+link;
}