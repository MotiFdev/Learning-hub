@props(['message', 'type'])

<div class="alert alert-{{ $type ?? 'success' }} alert-dismissible fade show" role="alert">
    <div class="d-flex align-items-center">
        <i class="bi bi-check-circle-fill me-2"></i>
        <div>
            {{ $message }}
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
