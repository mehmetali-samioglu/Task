@extends('panel.master')

@section('content')

    <form action=" {{ isset($user->id) ? route('user.save',$user->id)  :  route('user.save')}} " method="POST">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <label for="name" >{{ __('general.user_name') }}: <span>*</span> </label>
                <input type="text"  id="name" value="{{   isset($user->name) ? $user->name : old('name') }}" name="name" autofocus required>
                @error('name') <span class="badge bg-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-md-3">
                <label for="role" >{{ __('general.user_auth') }}: <span>*</span> </label>
                <select name="role" id="role" required>
                    @if(auth()->user()->role=="super-admin")
                    <option value="super-admin" {{  old('role') =='super-admin'   ? 'selected' : '' }} >Süper Admin</option>
                    @endif
                    <option value="user" {{  old('role') =='user' || (isset($user) && $user->role == 'user') ? 'selected' : '' }}>Kullanıcı</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="email" >{{ __('general.user_email') }}:<span>*</span> </label>
                <input type="text"  id="email" value=" {{  isset($user->email) ? $user->email : old('email') }}" name="email" required>
                <input type="hidden" name="id" id="id" value="{{$user->id ?? ''}} " >
                @error('email') <span class="badge bg-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-md-3">
                <label for="password" >{{ __('general.user_password') }}: <span>*</span> </label>
                <input type="password"  id="password" name="password" >
                @error('password') <span class="badge bg-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" >
                <a class="btn btn-outline-primary" href="{{route('user.list') }}" style="float: right"> {{ __('general.cancel') }}</a>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-outline-primary">
                    {{ isset($user->id) ? __('general.update')  :   __('general.save') }}
                </button>
            </div>
        </div>
    </form>

@endsection
