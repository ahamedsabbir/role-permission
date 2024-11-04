@extends('backend.master', ['title' => 'Fishing Type'])

@push('styles')
<style>
    .table-topbar {
        margin-bottom: 30px !important;
    }
</style>
@endpush
@section('content')
<div class="main-content">
    <div class="main-search-bar">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path
                d="M22 22L20 20M2 11.5C2 6.25329 6.25329 2 11.5 2C16.7467 2 21 6.25329 21 11.5C21 16.7467 16.7467 21 11.5 21C6.25329 21 2 16.7467 2 11.5Z"
                stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
        <input placeholder="Search" type="text">
    </div>
    <!-- other main contents start from here -->
    <div class="d-flex justify-content-between align-items-center">
        <div class="dashboard-title">Type Of Fishing</div>
        <a href="{{route('category.create')}}" class="btn btn-primary" style="background-color:#61a745; border:none;">Add Fishings</a>
    </div>
    <div class="data-table table-responsive">
        <table class="table table-hover" id="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });

        if (!$.fn.DataTable.isDataTable('#data-table')) {
            let dTable = $('#data-table').DataTable({
                order: [],
                lengthMenu: [
                    [25, 50, 100, 200, 500, -1],
                    [25, 50, 100, 200, 500, "All"]
                ],
                processing: true,
                serverSide: true,
                responsive: true,

                language: {
                    processing: `<div class="text-center">
                        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                        <span class="visually-hidden">Loading...</span>
                      </div>
                    </div>`,
                    lengthMenu: '_MENU_',
                    search: '',
                    searchPlaceholder: 'Search...'
                },

                ajax: {
                    url: "{{ route('category.index') }}",
                    type: "GET"
                },

                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },


                ],

                scroller: {
                    loadingIndicator: false
                },

                pagingType: "full_numbers",
                dom: "<'row justify-content-between table-topbar'<'col-md-2 col-sm-4 px-0'l><'col-md-2 col-sm-4 px-0'f>>tipr",
            });
        }
    });

    // delete Confirm
    function showDeleteConfirm(id) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure you want to delete this record?',
            text: 'If you delete this, it will be gone forever.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
        }).then((result) => {
            if (result.isConfirmed) {
                deleteItem(id);
            }
        });
    };
    // Delete Button
    function deleteItem(id) {
        var url = "{{ route('category.destroy', ':id') }}";
        var csrfToken = '{{ csrf_token() }}';
        $.ajax({
            type: "DELETE",
            url: url.replace(':id', id),
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(resp) {
                console.log(resp);
                // Reloade DataTable
                $('#data-table').DataTable().ajax.reload();
                if (resp.success === true) {
                    // show toast message
                    toastr.success(resp.message);

                } else if (resp.errors) {
                    toastr.error(resp.errors[0]);
                } else {
                    toastr.error(resp.message);
                }
            }, // success end
            error: function(error) {
                // location.reload();
            } // Error
        })
    }

    // Status Change Confirm Alert
    function showStatusChangeAlert(event, id, newStatus) {
        event.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to update the status to ' + newStatus + '?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            customClass: {
                confirmButton: 'custom-confirm-button',
                cancelButton: 'custom-cancel-button'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                statusChange(id, newStatus);
            }
        });
    }

    // Status Change Function
    function statusChange(id, newStatus) {
        var url = "{{ route('category.status', ':id') }}";
        $.ajax({
            type: "PATCH",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            url: url.replace(':id', id),
            data: {
                status: newStatus
            },
            success: function(resp) {
                console.log(resp);
                $('#data-table').DataTable().ajax.reload();
                if (resp.success) {
                    toastr.success(resp.message);
                } else {
                    toastr.error(resp.message);
                }
            },
            error: function(error) {
                toastr.error('Something went wrong!');
            }
        });
    }
</script>
@endpush