$('#modaleditakun').on('show.bs.modal', function (event) {
    // event.relatedtarget menampilkan elemen mana yang digunakan saat diklik.
    var button              = $(event.relatedTarget)
    var modal          = $(this)
        
    // menampilkan output ke elemen hasil
    modal.find('#NIK').attr("value",button.data('NIK'));
})