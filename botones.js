var cont=0;
function imagenes(){
    if(cont==0){
        document.getElementById("img").src="imagenes/imagen1.jpg";
        cont++;
    }
    else if(cont==1){
            document.getElementById("img").src="imagenes/imagen2.jpg";
            cont++;
        }
        else if(cont==2){
                document.getElementById("img").src="imagenes/imagen3.jpg";
                cont=0;
            }
    setTimeout(imagenes,2500);
}