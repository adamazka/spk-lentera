<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('insert'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '{{ session('insert') }}',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@endif

@if (session('update'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '{{ session('update') }}',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@endif

@if (session('delete'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '{{ session('delete') }}',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@endif

@error('sistemLoginError')
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ $message }}',
            footer: '<a href="">Why do I have this issue?</a>'
        })
    </script>
@enderror
