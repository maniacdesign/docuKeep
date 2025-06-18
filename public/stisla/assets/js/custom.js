/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

$('.custom-file-input').on('change', function(event) {
    var fileName = event.target.files[0].name;
    $(this).next('.custom-file-label').html(fileName);
});

$(document).ready(function() {
    $('#dokumenModal').on('show.bs.modal', function (event) {
        // Tombol yang memicu modal
        var button = $(event.relatedTarget); 
        
        // Ekstrak informasi dari atribut data-*
        var docUrl = button.data('url');
        var docTitle = button.data('title');
        // var docTipe = button.data('tipe');
        
        // Dapatkan objek modal
        var modal = $(this);
        
        // Update judul modal
        modal.find('.modal-title').text(docTitle);
        
        var modalBody = modal.find('.modal-body');
        var content = '<iframe src="' + docUrl + '" width="100%" height="650px" style="border: none;"></iframe>';

        // Masukkan konten ke dalam modal body
        modalBody.html(content);
    });
});