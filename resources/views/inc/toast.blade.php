<script src="https://unpkg.com/vue-toasted"></script>
<script>
    Vue.use(Toasted)
    var toastOptions = {
        duration: 4000,
        position:"bottom-right",
        theme: "bubble"
    }
    function toastSuccess(msg) {
        Vue.toasted.success(msg,toastOptions);
    }
    function toastInfo(msg) {
        Vue.toasted.info(msg,toastOptions);
    }
    function toastError(msg) {
        Vue.toasted.error(msg,toastOptions);
    }
</script>
