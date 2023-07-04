@extends('layouts.admin')
@section('css')
@endsection

@section('content')
    @foreach($getSettingsData as $item)
    @endforeach
    <div class="container">
        <div class="row">
            <div class="col-12">
                <x-admin.layouts.card>
                    <x-slot name="title">Genel Ayarlar</x-slot>
                    <x-slot name="content">
                        <form method="POST" action="{{route("backoffice.settings")}}">
                            @csrf
                            @method("PATCH")
                            <label class="form-label">Logo İsmi Değiştir</label>
                            <x-admin.elements.input :name="'logo_update'" :value="$item->logo" :placeholder="'logo isminizi yazınız...'" class="form-control"></x-admin.elements.input>
                            <label class="form-label">Main Header Yazısını Değiştir</label>
                            <x-admin.elements.input :name="'main_header_update'" :value="$item->main_header" :placeholder="'main header yazısını değiştir...'" class="form-control"></x-admin.elements.input>
                            <label class="form-label">Main Info Yazısını Değiştir</label>
                            <x-admin.elements.input :name="'main_info_title_update'" :value="$item->main_info_title" :placeholder="'main info title yazısını değiştir'" class="form-control"></x-admin.elements.input>
                            <label class="form-label">Main Info Content Değiştir</label>
                            <x-admin.elements.input :name="'main_info_content_update'" :value="$item->main_info_content" :placeholder="'main info content yazınız...'" class="form-control"></x-admin.elements.input>
                            <x-front.elements.input :type="'submit'" :name="'update_settings'" :value="'Ayarları Değiştir!'" class="btn btn-warning" style="padding: 10px; margin-top: 20px"></x-front.elements.input>
                        </form>
                    </x-slot>
                </x-admin.layouts.card>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
