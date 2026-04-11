@extends('layouts.erp')

@section('title', 'Módulo ERP')

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', () => {
      const b = document.getElementById('breadcrumbPage');
      if(b) b.innerText = 'Módulo';
  });
</script>


@endsection
