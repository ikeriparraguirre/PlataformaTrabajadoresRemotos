/*
document.querySelector(".borde-subir-archivos").addEventListener('dragover', function (e) {
    e.preventDefault();
    e.stopPropagation();
});

document.querySelector(".borde-subir-archivos").addEventListener('drop', function (e) {
    e.preventDefault();
    e.stopPropagation();
    for (var i = 0; i < e.dataTransfer.items.length; i++) {
        var entry = e.dataTransfer.items[i].webkitGetAsEntry();
        if (entry.isFile) {
            //Cargar la imagen.
            console.log(entry);
            console.log("es un archivo.")
        } else if (entry.isDirectory) {
            //Mostrar un error
            console.log(entry);
            console.log("es una carpeta.");
        }
    }

    //Para eliminar los archivos.
    if (e.dataTransfer.items) {
        e.dataTransfer.items.clear();
    } else {
        e.dataTransfer.clearData();
    }
});
*/

document.querySelector("#file-input").addEventListener('change', function () {
    let input = document.querySelector("#file-input");
    if (input.files.length > 0) {
        let archivo = input.files[0];
        document.querySelector("#nombre-archivo").value = archivo.name;
    }
});