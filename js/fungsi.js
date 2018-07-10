    $(function () {
        $(".btn").popover('show');
        $(".btn-obat").popover('hide');
    });

    $(document).ready(function() {

        // Selector input yang akan menampilkan autocomplete.
        $( "#diagnosa" ).autocomplete({
                serviceUrl: "autodgs.php",   // Kode php untuk prosesing data.
                dataType: "JSON",           // Tipe data JSON.
                onSelect: function (suggestion) {
                        $( "#diagnosa" ).val("" + suggestion.diagnosa);
                        $( "#id_dgs" ).val("" + suggestion.id_dgs);
                }
        });

        // Selector input yang akan menampilkan autocomplete.
        $( "#obat" ).autocomplete({
                serviceUrl: "autoobt.php",   // Kode php untuk prosesing data.
                dataType: "JSON",           // Tipe data JSON.
                onSelect: function (suggestion) {
                        $( "#obat" ).val("" + suggestion.obat);
                        $( "#id_obt" ).val("" + suggestion.id_obt);
                        $( "#harga" ).val("" + suggestion.harga);
                }
        });

        //id async 
        $(".btnTrs").click(function(){
            var kdTrs = $(this).data('val');
            
            $.ajax({
                type:"POST",
                url :"media.php?module=rekam_medik",
                data:{kdTrs:kdTrs},
            });
        });
    });
    //validasi inputan hanya angka saja
    function angka(e) {
        if (!/^[0-9]+$/.test(e.value)) {
            e.value = e.value.substring(0,e.value.length-1);
        }
    }

    // ngitung
    function total() {
        var hrg = document.getElementById('harga').value;
        var qty = document.getElementById('qty').value;
        var jumObat = parseInt(hrg) * parseInt(qty);
        if (!isNaN(jumObat)) {
            document.getElementById('jumlah').value = jumObat;	
        }
    }