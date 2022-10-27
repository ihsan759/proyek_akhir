$('#modalalasan').on('show.bs.modal', function (event) {
    // event.relatedtarget menampilkan elemen mana yang digunakan saat diklik.
    var button              = $(event.relatedTarget)

    var alasan        = button.data('alasan');
    var judul          = button.data('judul');

    // membuat objek elemen
    var hasil_modal = document.getElementById("alasan");
    var judul_modal = document.getElementById("modalalasanLabel");

    // menampilkan output ke elemen hasil
    hasil_modal.innerHTML = alasan;
    judul_modal.innerHTML = judul;
})