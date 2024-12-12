@extends('layouts.administrateur')

@section('content')
<form action="{{ route('administrateur.test.message.store') }}" method="post">
    @csrf
    <div class="element-wrapper">
        <h6 class="element-header">
          Editeur
        </h6>
        <div class="element-box">
          <textarea cols="80" id="ckeditor1" name="message" rows="10"></textarea>
        </div>
        <div class="element-box">
            <button class="btn btn-sm btn-primary" type="submit">Ajouter</button>
          </div>
    </div>
</form>


@endsection

@section('script')
<script src="{{ asset('assets/admin/bower_components/ckeditor/ckeditor.js') }}"></script>
@endsection