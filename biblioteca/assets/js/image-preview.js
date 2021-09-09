imagem.onchange = evt => {
   const [file] = imagem.files
   if (file) {
      preview.src = URL.createObjectURL(file)
   }
}