    </div><!-- end .content -->
</div><!-- end .main -->

<script>
// Auto-hide alert setelah 4 detik
document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(function(alert) {
        setTimeout(function() {
            alert.style.transition = 'opacity .5s';
            alert.style.opacity = '0';
            setTimeout(function() { alert.style.display = 'none'; }, 500);
        }, 4000);
    });

    // Konfirmasi hapus
    document.querySelectorAll('.btn-hapus').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            if (!confirm('Yakin ingin menghapus data mahasiswa ini?\nData yang dihapus tidak dapat dikembalikan.')) {
                e.preventDefault();
            }
        });
    });
});
</script>

</body>
</html>
