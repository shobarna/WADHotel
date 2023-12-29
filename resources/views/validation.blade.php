<script>
    window.addEventListener('deleted', event => {
        iziToast.warning({
            title: 'Berhasil',
            message: 'Data Terhapus!',
        });
    })

    window.addEventListener('validation', event => {
        iziToast.question({
            timeout: 20000,
            close: false,
            overlay: true,
            displayMode: 'once',
            id: 'question',
            zindex: 999,
            title: 'Peringatan!',
            message: 'Apakah anda yakin?',
            position: 'center',
            buttons: [
                ['<button><b>YA</b></button>', function(instance, toast) {

                    Livewire.emit('confirm', event.detail.id);
                    instance.hide({
                        transitionOut: 'fadeOut'
                    }, toast, 'button');

                }, true],
                ['<button>TIDAK</button>', function(instance, toast) {

                    instance.hide({
                        transitionOut: 'fadeOut'
                    }, toast, 'button');

                }],
            ],
            onClosing: function(instance, toast, closedBy) {
                console.info('Closing | closedBy: ' + closedBy);
            },
            onClosed: function(instance, toast, closedBy) {
                console.info('Closed | closedBy: ' + closedBy);
            }
        });
    })
</script>
