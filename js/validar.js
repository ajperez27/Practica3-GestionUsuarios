window.onload = inicio;

function inicio()
{  
    document.getElementsByClassName("enviar")[0].onclick = validar;
}

function validar()
{
    var clave = document.getElementById("clave").value;
    var claveConfirmada = document.getElementById("claveConfirmada").value;
 
    if(clave!=claveConfirmada)
    {
        alert("Las claves deben coincidir");
        event.preventDefault(); 
    }    
}