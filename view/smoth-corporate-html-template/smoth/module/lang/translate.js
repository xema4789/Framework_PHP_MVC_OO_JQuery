

function cambiarIdioma(lang) {
    // Habilita las 2 siguientes para guardar la preferencia.
    lang = lang || localStorage.getItem('app-lang') || 'es';
    localStorage.setItem('app-lang', lang);
  
    var elems = document.querySelectorAll('[data-tr]');

    $.ajax({
      url: 'module/lang/' + lang + '.json',
        type: 'POST',
        dataType: 'JSON',
        success: function(data){
          for (var x = 0; x < elems.length; x++) {
            elems[x].innerHTML = data.hasOwnProperty(lang)
              ? data[lang][elems[x].dataset.tr]
              : elems[x].dataset.tr;
          }
        }

    })//end ajax

    
  }
  
    // window.onload = function(){
    //   //alert ("estamos dentro chavales 1");
    //   cambiarIdioma();
    //     document.getElementById('btn-es').addEventListener('click', cambiarIdioma.bind(null, 'es'));
    //     document.getElementById('btn-en').addEventListener('click', cambiarIdioma.bind(null, 'en'));
    //     document.getElementById('btn-va').addEventListener('click', cambiarIdioma.bind(null, 'va'));
    // }

  // $[document].ready[function]{

  
  $(document).ready(function(){

    cambiarIdioma();

    $("#btn-en").on("click", function(){
      cambiarIdioma('en');
    });

    $("#btn-es").on("click", function(){
      cambiarIdioma('es');
    });

    $("#btn-va").on("click", function(){
      cambiarIdioma('va');
    });

  });

  
  