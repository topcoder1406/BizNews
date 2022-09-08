@if (session()->has('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function (event) {
            toast().success('{{ session('success')[0] }}', '{{ session('success')[1] }}').with({
                color: 'bg-green-600',
                fontColor: 'white',
                fontTone: 100
            }).show();
        });
    </script>
@endif
