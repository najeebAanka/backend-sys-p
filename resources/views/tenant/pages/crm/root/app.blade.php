<!DOCTYPE html>
@extends('tenant.root.app', ['title' => $title])




@section('top-bar')


        <li class="nav-item">
          <a class="nav-link nav-selected" href="javascript:void(0)">Leads</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">Deals</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">Contracts</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">Companies</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">Products</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">Quotes</a>
        </li>
        
        
        <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Options</a>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Link</a></li>
    <li><a class="dropdown-item" href="#">Another link</a></li>
    <li><a class="dropdown-item" href="#">A third link</a></li>
  </ul>
</li>



@endsection


@section('content')

       @yield('content')    

@endsection




