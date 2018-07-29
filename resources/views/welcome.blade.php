@extends('layouts.master')
@section('title', '')

@section('content')
    <div id="app">
        <transition name="bounce">
            <modal-component v-if="modalForm.isActive"
                             @modal-form="toggleModal()">
                    <modal-auth :type="modalForm.content"
                                @modal-form="toggleModal()">
                    </modal-auth>
            </modal-component>
        </transition>
        <div class="hero_container">
            @include('layouts.navbar')
            <div class="hero_title_box is-center">
                <h1 class="title is-lower">FamPic</h1>
            </div>
        </div>
    </div>
@endsection
