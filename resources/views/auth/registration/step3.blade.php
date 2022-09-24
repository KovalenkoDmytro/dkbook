@extends('layouts.registration')

@section('registration.content')
    <h2>REGISTRATION __permanent</h2>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <?php
//    $file_name =  $_FILES['file']['name'];
//    $tmp_name = $_FILES['file']['tmp_name'];
//    $file_up_name = time().$file_name;
//    move_uploaded_file($tmp_name, "files/".$file_up_name);
    ?>

        <form action="{{route('company.addPhotoCompany')}}" method="post" enctype="multipart/form-data">
            @csrf
            <section class="file-Downloader">
                <p class="file-Downloader_header">
                    <span class="header_title">{{__('Show customers your company')}}</span>
                </p>
                <div>
                    <input class="company-photo" type="file" name="company_photo">
                    <i class="icon icon_load-file"></i>
                    <p class="file-Downloader_description">
                        <span>{{__('Upload company photo')}}</span>
                        <span>{{__('it\'s not necessary but recommended')}}</span>
                    </p>
                </div>
                <div class="progress-area"></div>
                <div class="uploaded-area"></div>
            </section>
            <button type="submit">Send file __permanent</button>
        </form>
@endsection

