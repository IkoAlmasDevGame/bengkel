<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js" lang="javascript"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<!-- Source Error -->

<script type="text/javascript">
$(document).ready(function() {
    $("#example1").DataTable();
    $("#example2").DataTable();
});

function showpw() {
    var passwd = document.getElementById("passwd");
    if (passwd.type === "password") {
        document.getElementById("passwd").type = "text";
    } else {
        document.getElementById("passwd").type = "password";
    }
}

$(document).ready(function() {
    var response = '';
    $("#cari").change(function() {
        $.ajax({
            type: "POST",
            url: "action/act-barang.php?cari_barang=yes",
            data: 'keyword=' + $(this).val(),
            async: false,
            beforeSend: function(response) {
                $("#hasil_cari").hide();
                $("#tunggu").html(
                    '<p style="color:green"><blink>tunggu sebentar</blink></p>');
            },
            success: function(html, response) {
                $("#tunggu").html('');
                $("#hasil_cari").show();
                $("#hasil_cari").html(html);
            }
        });
        return response;
    });
});

function myFunction() {
    var dots = document.getElementById("more");
    var moreText = document.getElementById("dots");
    var btnText = document.getElementById("myBtn");

    if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Read more";
        moreText.style.display = "none";
    } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read less";
        moreText.style.display = "inline";
    }
}
</script>
</body>

</html>