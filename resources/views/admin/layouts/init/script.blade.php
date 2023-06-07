<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/assets/js/bootstrap-rtl.min.js"></script>
<script src="/assets/js/detect.js"></script>
<script src="/assets/js/fastclick.js"></script>
<script src="/assets/js/jquery.blockUI.js"></script>
<script src="/assets/js/waves.js"></script>
<script src="/assets/js/jquery.nicescroll.js"></script>
<script src="/assets/js/jquery.slimscroll.js"></script>
<script src="/assets/js/jquery.scrollTo.min.js"></script>

<!-- file uploads js -->
<script src="/assets/plugins/fileuploads/js/dropify.min.js"></script>

<!-- KNOB JS -->
<!--[if IE]>
<script type="text/javascript" src="assets/plugins/jquery-knob/excanvas.js"></script>
<![endif]-->
<script src="/assets/plugins/jquery-knob/jquery.knob.js"></script>

<!--Morris Chart-->
<script src="/assets/plugins/morris/morris.min.js"></script>
<script src="/assets/plugins/raphael/raphael-min.js"></script>

<!-- Dashboard init -->
<script src="/assets/pages/jquery.dashboard.js"></script>

<!-- App js -->
<script src="/assets/js/jquery.core.js"></script>
<script src="/assets/js/jquery.app.js"></script>

<!-- Datepicker fa -->
<script src="/assets/js/datepicker-fa.js" async></script>

<script>
    function closeAlert() {
        var err = document.getElementById('errorAlert');
        if (err !== null) {
            document.getElementById('errorAlert').remove();
        }
        var succ = document.getElementById('successAlert');
        if (succ !== null) {
            document.getElementById('successAlert').remove();
        }
    }
    function showLoader(button) {
        button.classList.add('button--loading');
        const newText = "...";
        button.textContent = newText;
        button.style.padding = '5px 10px !important';
    }
</script>

<script type="text/javascript">
    $('.dropify').dropify({
        messages: {
            'default': 'فایل را به اینجا بکشید یا کلیک کنید',
            'replace': 'برای جایگزینی فایل را به اینجا بکشید یا کلیک کنید',
            'remove': 'پاک کردن',
            'error': 'با پوزش فراوان، خطایی رخ داده'
        },
        error: {
            'fileSize': 'حجم فایل بیشتر از حد مجاز است (1M).'
        }
    });
</script>


