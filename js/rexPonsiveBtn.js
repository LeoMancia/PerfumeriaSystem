$(document).ready(function(){
 
    if(window.innerWidth < 768){
        $('.btn').addClass('btn-sm');
    }
    
    // Medida por defecto (Sin ningún nombre de clase)
    else if(window.innerWidth < 900){
        $('.btn').removeClass('btn-sm');
    }
 
    // Si el ancho del navegador es menor a 1200 px le asigno la clase 'btn-lg' 
    else if(window.innerWidth < 1200){
        $('.btn').addClass('btn-lg');
    }
 
});