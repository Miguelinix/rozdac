//Funcion para mostrar los municipios según departamento
function selc(){
    var dept = document.getElementById("departamento").value;
    munics();//Funcion que contiene los arrays de los municipios de cada departamento
    //Validar que se haya ingresado un departamento
    if(dept == 0){
        alert("¡Debe seleccionar un departamento!");
        document.getElementById("municipio").disabled = true;
    }else{
        document.getElementById("municipio").innerHTML = "<option value='0'>Seleccione Municipio</option>";
         //If para cada departamento
        if(dept == "Ahuachapán"){
              //Se recorre el array de municipios según el departamento seleccionado
            for(i = 0; i<muniAH.length; i++){
                document.getElementById("municipio").innerHTML += "<option>"+ muniAH[i] +"</option>";
            }
        }else if(dept == "Cabañas"){
            for(i = 0; i<muniCAB.length; i++){
                document.getElementById("municipio").innerHTML += "<option>"+ muniCAB[i] +"</option>";
            }
        }else if(dept == "Chalatenango"){
            for(i = 0; i<muniCHA.length; i++){
                document.getElementById("municipio").innerHTML += "<option>"+ muniCHA[i] +"</option>";
            }
        }else if(dept == "Cuscatlán"){
            for(i = 0; i<muniCUS.length; i++){
                document.getElementById("municipio").innerHTML += "<option>"+ muniCUS[i] +"</option>";
            }
        }else if(dept == "La Libertad"){
            for(i = 0; i<muniLA.length; i++){
                document.getElementById("municipio").innerHTML += "<option>"+ muniLA[i] +"</option>";
            }
        }
        else if(dept == "La Paz"){
            for(i = 0; i<muniLP.length; i++){
                document.getElementById("municipio").innerHTML += "<option>"+ muniLP[i] +"</option>";
            }
        }
        else if(dept == "La Unión"){
            for(i = 0; i<muniLU.length; i++){
                document.getElementById("municipio").innerHTML += "<option>"+ muniLU[i] +"</option>";
            }
        }else if(dept == "Morazán"){
            for(i = 0; i<muniMOR.length; i++){
                document.getElementById("municipio").innerHTML += "<option>"+ muniMOR[i] +"</option>";
            }
        }else if(dept == "San Miguel"){
            for(i = 0; i<muniSM.length; i++){
                document.getElementById("municipio").innerHTML += "<option>"+ muniSM[i] +"</option>";
            }
        }else if(dept == "San Salvador"){
            for(i = 0; i<muniSS.length; i++){
                document.getElementById("municipio").innerHTML += "<option>"+ muniSS[i] +"</option>";
            }
        }else if(dept == "San Vicente"){
            for(i = 0; i<muniSV.length; i++){
                document.getElementById("municipio").innerHTML += "<option>"+ muniSV[i] +"</option>";
            }
        }else if(dept == "Santa Ana"){
            for(i = 0; i<muniSA.length; i++){
                document.getElementById("municipio").innerHTML += "<option>"+ muniSA[i] +"</option>";
            }
        }else if(dept == "Sonsonate"){
            for(i = 0; i<muniSON.length; i++){
                document.getElementById("municipio").innerHTML += "<option>"+ muniSON[i] +"</option>";
            }
        }else if(dept == "Usulután"){
            for(i = 0; i<muniUSU.length; i++){
                document.getElementById("municipio").innerHTML += "<option>"+ muniUSU[i] +"</option>";
            }
        }
        document.getElementById("municipio").disabled = false;
    }
}
//Validar que se haya ingresado un municipio
function munic_vac(){
    var muni = document.getElementById("municipio").value;
    if(muni == 0){
        alert("¡Debe seleccionar un municipio!");
    }
}