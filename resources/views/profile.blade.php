@extends('base')

@section('content')
<div class="d-flex">
    <x-sidebar>
    </x-sidebar>
    <div class="main-content flex-column">
        <x-navbar>
        </x-navbar>
        <div class="content">
            <form action="/edit-profile" method="post" class="" id="FormEditProfile" enctype="multipart/form-data">
                <div class="profile-card shadow-big mx-auto mt10v mb36 p64 d-flex">
                    <div id="ProfilePictureContainer" class="foto-profil-container bg-f0 mr36" style="background-image: url({{asset('/storage/images/'.Auth::user()->image)}}); background-size: cover; display:none;">
                    </div>
                    <div id="ProfilePictureContainerDisabled" class="foto-profil-container bg-f0 mr36" style="background-image: url({{asset('/storage/images/'.Auth::user()->image)}}); background-size: cover;">
                    </div>
                    <div class="profil-container div-grow d-flex flex-column">
                        @csrf
                        <div class="form-text-small mb18">Username</div>
                        <input class="mb36 form-input" type="text" placeholder="username" name="username" value="{{ Auth::user()->username }}" disabled>
                        <div class="form-text-small mb18">Password</div>
                        <input id="ProfilePictureInput" class="mb36 form-input" type="file" name="image" hidden>
                        <input class="mb36 form-input" type="password" placeholder="********" name="password" disabled>
                        <input class="mb36 form-input" type="password" placeholder="Old Password (Required)" name="old-password" hidden>

                        <div class="button-group justify-content-center d-flex BtnGroup">
                            <button class="btn fix bg-f0 shadow-big mr36 EditProfileBtn" type="button">Edit</button>
                            <button class="btn fix bg-ff shadow-big LogoutBtn" type="button">Log Out</button>
                            <button class="btn fix bg-ff shadow-big mr36 BatalEditProfileBtn" type="button" style="display: none">Batal</button>
                            <button class="btn fix bg-f0 shadow-big SimpanEditProfileBtn" type="submit" style="display: none">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
</div>

<div class="modal fade" id="modalConfirmLogout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Apakah anda yakin ingin Log Out ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn fix bg-f0 shadow-big" data-dismiss="modal">Batal</button>
                <a href="/logout">
                    <button type="button" class="btn fix bg-ff shadow-big" data-id-device="">Log Out</button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    $('.EditProfileBtn').on('click', function(){
        $('#FormEditProfile input').prop('disabled', false)
        $('#FormEditProfile input[name="password"]').attr('placeholder', 'New Password')
        $('#FormEditProfile input[name="old-password"]').prop('hidden', false)
        $('#FormEditProfile .EditProfileBtn').hide();
        $('#FormEditProfile .LogoutBtn').hide();
        $('#FormEditProfile .BatalEditProfileBtn').show();
        $('#FormEditProfile .SimpanEditProfileBtn').show();
        $('#ProfilePictureContainerDisabled').hide()
        $('#ProfilePictureContainer').show()
    })

    $('.BatalEditProfileBtn').on('click', function(){
        $('#FormEditProfile input').prop('disabled', true)
        $('#FormEditProfile input[name="password"]').attr('placeholder', '********')
        $('#FormEditProfile input[name="old-password"]').prop('hidden', true)
        $('#FormEditProfile .EditProfileBtn').show();
        $('#FormEditProfile .LogoutBtn').show();
        $('#FormEditProfile .BatalEditProfileBtn').hide();
        $('#FormEditProfile .SimpanEditProfileBtn').hide();
        $('#ProfilePictureContainerDisabled').show()
        $('#ProfilePictureContainer').hide()
    })

    $(function() {
        $('#profile').addClass('dragging').removeClass('dragging');
    });

    $('#ProfilePictureContainer').on('dragover', function() {
        $('#ProfilePictureContainer').addClass('dragging')
    }).on('dragleave', function() {
        $('#ProfilePictureContainer').removeClass('dragging')
    }).on('drop', function(e) {
        $('#ProfilePictureContainer').removeClass('dragging hasImage');

        if (e.originalEvent) {
            var file = e.originalEvent.dataTransfer.files[0];
            var reader = new FileReader();
            console.log(file);

            reader.readAsDataURL(file);
            reader.onload = function(e) {
                console.log(reader.result);
                $('#profile').css('background-image', 'url(' + reader.result + ')').addClass('hasImage');
                $('#ProfilePictureInput').files[0] = file;
            }
        }
    });

    $('#ProfilePictureContainer').on('click', function(e) {
        console.log('clicked')
        $('#ProfilePictureInput').click();
    });
    window.addEventListener("dragover", function(e) {
        e = e || event;
        e.preventDefault();
    }, false);
    window.addEventListener("drop", function(e) {
        e = e || event;
        e.preventDefault();
    }, false);
    $('#ProfilePictureInput').change(function(e) {

        var input = e.target;
        if (input.files && input.files[0]) {
            var file = input.files[0];
            var reader = new FileReader();

            reader.readAsDataURL(file);
            reader.onload = function(e) {
                console.log(reader.result);
                $('#ProfilePictureContainer').css('background-image', 'url(' + reader.result + ')').addClass('hasImage');
            }
        }
    })

    $('.LogoutBtn').on('click', function(){
        $('#modalConfirmLogout').modal('show');
    })
</script>

@endsection