document.addEventListener('DOMContentLoaded', () => {

    const toast = document.getElementById('toast-message');

    if (!toast) return;

    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: toast.dataset.type,
        title: toast.dataset.message,
        showConfirmButton: false,
        timer: 2500,
        timerProgressBar: true,
    });

});