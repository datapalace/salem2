<style>
    .alert-bottom-right {
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        z-index: 1050;
        animation: pop-in 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55);
    }

    @keyframes pop-in {
        0% {
            transform: translateY(50px) scale(0.8);
            opacity: 0;
        }
        80% {
            transform: translateY(-10px) scale(1.05);
            opacity: 1;
        }
        100% {
            transform: translateY(0) scale(1);
            opacity: 1;
        }
    }
</style>
@if (session('success'))
    <div
        class="alert alert-success alert-dismissible fade show alert-bottom-right"
        role="alert"
    >
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        ></button>

        <strong>Success!</strong> {{ session('success') }}
    </div>
    
@endif
@if (session('error'))
    <div
        class="alert alert-danger alert-dismissible fade show alert-bottom-right"
        role="alert"
    >
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        ></button>

        <strong>Error!</strong> {{ session('error') }}
    </div>
@endif