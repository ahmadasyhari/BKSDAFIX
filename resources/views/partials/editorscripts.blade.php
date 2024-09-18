<script>
    tinymce.init({
        selector: '#konten',
        height: 450,
        plugins: [
            'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor',
            'pagebreak', 'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'emoticons', 'help'
        ],
        toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
            'forecolor backcolor emoticons | help',
        menubar: 'file edit view insert format tools table help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
    });
    
    // Priview gambar
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById('preview');
            preview.src = reader.result;
            preview.style.display = 'block'; // Tampilkan gambar baru
        };

        // Menyembunyikan gambar lama ketika gambar baru dipilih
        var oldImage = document.getElementById('oldImage');
        if (oldImage) {
            oldImage.style.display = 'none';
        }

        // Menyembunyikan nama gambar lama ketika gambar baru dipilih
        /* var filemame = document.getElementById('filename');
        if (filename) {
            filename.style.display = 'none';
        } */

        reader.readAsDataURL(event.target.files[0]);
    }
</script>