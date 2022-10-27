$(document).ready(function() {
    var table = $('#dataTable').DataTable({
        searchBuilder: true,
        // lengthChange: false,
        buttons: [ 
            {
                extend: 'excelHtml5',
                title: 'Data warga',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'spacer'
            },
            {
                extend: 'colvis',
				text: 'Kolom Visibilitas'
            }
        ],
        "oLanguage": {
            "sSearch": "Pencarian:",
            "sZeroRecords": "Tidak ada data",
            "sInfoEmpty": "Tidak ada data",
            "sLengthMenu": "Tampilan _MENU_ data",
            "sInfo": "Tampilan _START_ sampai _END_ dari _TOTAL_ data",
          },
          language: {
            oPaginate: {
               sNext: 'Selanjutnya',
               sPrevious: 'Sebelumnya',
               sFirst: 'Pertama',
               sLast: 'Terakhir'
            },
            searchBuilder: {
                add: 'Tambah',
                condition: 'Kondisi',
                clearAll: 'Hapus Semua',
                delete: 'Hapus',
                deleteTitle: 'Hapus Judul',
                data: 'Data',
                left: 'Kiri',
                leftTitle: 'Kiri Judul',
                logicAnd: 'Dan',
                logicOr: 'Atau',
                right: 'Kanan',
                rightTitle: 'Kanan Judul',
                title: {
                    0: 'Kondisi',
                    _: 'Kondisi (%d)'
                },
                value: 'Option',
                valueJoiner: 'et'
            }
          }  
    });
    table.searchBuilder.container().prependTo(table.table().container());
    table.buttons().container()
        .appendTo( '#dataTable_wrapper .col-md-6:eq(0)' );
});