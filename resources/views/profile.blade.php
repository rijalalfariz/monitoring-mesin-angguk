@extends('base')

@section('content')
<div class="d-flex">
    <x-sidebar>
    </x-sidebar>
    <div class="main-content flex-column">
        <x-navbar>
        </x-navbar>
        <div class="content">
            <form action="/login" method="post" class="" id="FormEditProfile">
                <div class="profile-card shadow-big mx-auto mt10v mb36 p64 d-flex">
                    <div class="foto-profil-container bg-f0 mr36"></div>
                    <div class="profil-container div-grow d-flex flex-column">
                        @csrf
                        <div class="form-text-small mb18">Username</div>
                        <input class="mb36 form-input" type="text" placeholder="username" name="username" value="{{ Auth::user()->username }}" disabled>
                        <div class="form-text-small mb18">Password</div>
                        <input class="mb36 form-input" type="password" placeholder="********" name="password" disabled>
                        <input class="mb36 form-input" type="password" placeholder="Old Password" name="old-password" hidden>

                        <div class="button-group justify-content-center d-flex BtnGroup">
                            <button class="btn fix bg-f0 shadow-big EditProfileBtn" type="button">Edit</button>
                            <button class="btn fix bg-ff shadow-big mr36 BatalEditProfileBtn" type="button" style="display: none">Batal</button>
                            <button class="btn fix bg-f0 shadow-big SimpanEditProfileBtn" type="submit" style="display: none">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
</div>

<script>
    $('.EditProfileBtn').on('click', function(){
        $('#FormEditProfile input').prop('disabled', false)
        $('#FormEditProfile input[name="password"]').attr('placeholder', 'New Password')
        $('#FormEditProfile input[name="old-password"]').prop('hidden', false)
        $('#FormEditProfile .EditProfileBtn').hide();
        $('#FormEditProfile .BatalEditProfileBtn').show();
        $('#FormEditProfile .SimpanEditProfileBtn').show();
    })

    $('.BatalEditProfileBtn').on('click', function(){
        $('#FormEditProfile input').prop('disabled', true)
        $('#FormEditProfile input[name="password"]').attr('placeholder', '********')
        $('#FormEditProfile input[name="old-password"]').prop('hidden', true)
        $('#FormEditProfile .EditProfileBtn').show();
        $('#FormEditProfile .BatalEditProfileBtn').hide();
        $('#FormEditProfile .SimpanEditProfileBtn').hide();
    })

</script>

@endsection