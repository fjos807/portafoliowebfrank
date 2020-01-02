
var allAssignments;

function readJSON(file)
{
    var rawFile = new XMLHttpRequest();
    rawFile.open("GET", file, false);
    rawFile.onreadystatechange = function ()
    {
        if(rawFile.readyState === 4)
        {
            if(rawFile.status === 200 || rawFile.status == 0)
            {
                var allText = rawFile.responseText;
                allAssignments = JSON.parse(allText);
            }
        }
    }
    rawFile.send(null);
}

function loadAllAssignments(){
    var arrayElements = allAssignments.dataAll;
    var contentInvestigaciones = "";
    var contentLaboratorios = "";
    var contentProyectos = "";
    var contentTareas = "";

    for (var i = 0; i < arrayElements.length; i++){
        var elementOfArrayCollections = arrayElements[i];
        var arrayAssignments = elementOfArrayCollections.data;
        for (var a = 0; a < arrayAssignments.length; a++){
            var img = ""
            switch(elementOfArrayCollections.collection){
                case "investigaciones":
                    img = "img/investigation.jpg";
                    break; 
                case "laboratorios":
                    img = "img/lab.jpg";
                    break;
                case "proyectos":
                    img = "img/project.jpg";
                    break;
                case "tareas":
                    img = "img/task.jpg";
                    break;
            }
            
            var item = "<div class=\"col mb-4\"> <div class=\"card\"> <img src=" + img + " class=\"card-img-top\" alt=" + 
            arrayAssignments[a].name + "> <div class=\"card-body\"> <h5 class=\"card-title\">" + 
            arrayAssignments[a].name + "</h5> <p class=\"card-text\"> " +
            arrayAssignments[a].description + "</p>" +
            "<a class=\"btn btn-outline-primary\" href=" + arrayAssignments[a].route +
            " \" role=\"button\">Ver más</a> </div> </div> </div>"

            if (elementOfArrayCollections.collection == "investigaciones"){
                contentInvestigaciones += item;
            }
            if (elementOfArrayCollections.collection == "laboratorios"){
                contentLaboratorios += item;
            }
            if (elementOfArrayCollections.collection == "proyectos"){
                contentProyectos += item;
            }
            if (elementOfArrayCollections.collection == "tareas"){
                contentTareas += item;
            }
        }
    }

    var empty = "<div class=\"jumbotron\"> <h1 class=\"display-4 text-center\">:(</h1> <p class=\"lead text-center\">Hasta el momento no hay contenido en esta pestaña</p> </div> </div>"
    if (contentInvestigaciones == ""){
        document.getElementById("investigaciones").innerHTML = empty;
    } else {
        document.getElementById("investigaciones_content").innerHTML = contentInvestigaciones;
    }

    if (contentLaboratorios == ""){
        document.getElementById("laboratorios").innerHTML = empty;
    } else {
        document.getElementById("laboratorios_content").innerHTML = contentLaboratorios;
    }

    if (contentProyectos == ""){
        document.getElementById("proyectos").innerHTML = empty;
    } else {
        document.getElementById("proyectos_content").innerHTML = contentProyectos;
    }

    if (contentTareas == ""){
        document.getElementById("tareas").innerHTML = empty;
    } else {
        document.getElementById("tareas_content").innerHTML = contentTareas;
    }
}

function loadPage(){
    readJSON("data.json");
    loadAllAssignments();
}