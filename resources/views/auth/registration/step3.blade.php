@extends('layouts.registration')

@section('registration.content')
    <form action="{{route('registration.addPhotoCompany')}}" method="post" enctype="multipart/form-data">
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

        <div class="buttons_wrapper">
            <div class="btn" >
                <a href="{{route('registration.step2')}}">{{__('Prev step')}}</a>
            </div>
            <button class="btn" type="submit">{{__('Next step')}}</button>
        </div>
    </form>
@endsection

