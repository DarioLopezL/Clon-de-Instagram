import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

if(document.getElementById("dropzone")) {
  const dropzone = new Dropzone("#dropzone",{
    dictDefaultMessage: 'Sube aqui tu imagen',
    acceptedFiles: ".png, .jpg, .jpeg, .gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar Archivos",
    maxFiles: 1,
    uploadMultiple: false,

    init: function() {
      const dropzoneInstance = this;
      const imagenInput = document.querySelector('[name="imagen"]');

      if (imagenInput.value.trim()) {
        const imgPublicada = {
          size: 1234,
          name: imagenInput.value.trim()
        };

        this.emit("addedfile", imgPublicada);
        this.emit("thumbnail", imgPublicada, `/uploads/${imgPublicada.name}`);
        this.emit("complete", imgPublicada);

        // Manejar el caso en que se elimine el archivo
        imgPublicada.previewElement.querySelector(".dz-remove").addEventListener("click", function() {
          dropzoneInstance.removeFile(imgPublicada);
          imagenInput.value = "";
        });
      }
    }
  })

  dropzone.on('sending',function (file, xhr, formData){
    console.log(file)
  } )

  dropzone.on("success",function(file, response){
    console.log(response)

    document.querySelector('[name="imagen"]').value = response.imagen
  })

  dropzone.on('removedfile', function(){
    document.querySelector('[name="imagen"]').value=""
  })
}
