@extends('layouts.user')

@section('title')
  Customer Dispute
@endsection

@section('content')
  <x-base>
    @slot('message')
      test
    @endslot
    
    @slot('section')
      <x-input type="text" name="name" placeholder="Masukkan nama anda" disabled="false" required="true"></x-input>
    @endslot
  </x-base>
@endsection