@if (session()->has('fail'))
    <script>
        document.addEventListener("DOMContentLoaded", function (event) {
            toast().danger('{{ session('fail')[0] }}', '{{ session('fail')[1] }}').with({
                icon: 'fa-solid fa-circle-exclamation',
                color: 'bg-red-600',
                fontColor: 'white',
                fontTone: 100
            }).show();
        });
    </script>
@endif
