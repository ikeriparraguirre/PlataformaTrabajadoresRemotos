document.querySelector("#file-input").addEventListener('change', function () {
    //Para colocar el nombre del archivo en el input de subir el archivo.
    let input = document.querySelector("#file-input");
    if (input.files.length > 0) {
        let archivo = input.files[0];
        document.querySelector("#nombre-archivo").value = archivo.name;
    }
});