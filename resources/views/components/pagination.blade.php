<div class="d-flex justify-content-between align-items-center">
    <span>Showing {{ $pagination->currentPage() }} to {{ $pagination->perPage() }} of {{ $pagination->total() }}
        entries</span>
    {{ $pagination->withQueryString()->links('vendor.pagination.custom') }}
</div>
