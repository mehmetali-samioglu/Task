@extends('panel.master')

@section('content')
    <table id="user_table" class="display cell-border" style="width:100%">
        <thead>
            <tr>
                <th>{{ __('general.user_name') }}</th>
                <th>{{ __('general.user_aut') }}</th>
                <th>{{ __('general.user_email') }}</th>
                <th>{{ __('general.created_at') }}</th>
                <th>{{ __('general.transactions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user )
            <tr>
                <td>{{$user->name}}</td>
                <td>
                    @if($user->role=='super-admin')
                        Süper Admin
                    @else
                        Kullanıcı
                    @endif
                </td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                <td>
                    @if($user->id == auth()->user()->id  || $user->role=='super-admin')
                        <a  href="{{ route('user.edit',$user->id) }}"  title="Düzenle" class="btn btn-sm btn-primary edit-click"><i class="fa fa-pen"></i></a>
                    @endif
                    @can('delete',App\User::class)
                        <a  id="delete" user-id="{{ $user->id }}"  title="Sil" class="btn btn-sm btn-danger remove-click"><i class="fa fa-times"></i></a>
                    @endcan
                </td>
            </tr>
            @endforeach

        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('general.user_name') }}</th>
                <th>{{ __('general.user_aut') }}</th>
                <th>{{ __('general.user_email') }}</th>
                <th>{{ __('general.user_password') }}</th>
                <th>{{ __('general.transactions') }}</th>
            </tr>
        </tfoot>
    </table>
@endsection


@push('extra_script')

    <script>
        $(document).ready(function () {
            $('#user_table').DataTable(
                {
                    "language": {
                        "url": "/assets/js/datatable/tr.json"
                    }
                }
            );
        });

        $(".remove-click").click(function(){
            id=$(this)[0].getAttribute('user-id');

            Swal.fire({
                title: 'Silmek İstediğinize Emin misiniz?',
                showDenyButton: true,
                confirmButtonText: 'Sil',
                denyButtonText: `İptal`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type:'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            id:  id,
                        },
                        url:'{{ route("user.delete") }}'+'/'+id,
                        success:function(data)
                        {
                            Swal.fire('Silindi', '', 'success')
                            location.reload();
                        },
                        error:function(e){
                            console.log(e);
                            Swal.fire('Hata!', '', 'error')
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire('Değişiklik yapılmadı', '', 'info')
                }
            })


        });
    </script>
@endpush
