<script src="{{asset('theme')}}/js/notify.min.js"></script>
<script>
    @if(session()->has('success'))
        $.notify("{{session()->get('success')}}", "success");
    @elseif(session()->has('error'))
        $.notify("{{session()->get('error')}}", "error");
    @endif
</script>