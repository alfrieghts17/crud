@extends('layouts.app')

@section('content')
<div class="px-4 py-5 row">
          <div class="mx-auto col-md-5"> <!-- Profile widget -->
              <a href="{{ route('customer.index') }}" class="mb-3 btn" style="background-color: #4643d3; color: white;"><i class="fas fa-chevron-left"></i> Back</a>
              <div class="overflow-hidden bg-white rounded shadow">
                  <div class="px-4 pt-0 pb-4 cover">
                      <div class="media align-items-end profile-head d-flex">
                          {{-- <div class="mr-3 profile">
                              <img
                                  src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80"
                                  alt="..." width="130" class="mb-2 rounded img-thumbnail">
                          </div> --}}
                          {{-- <div class="mb-5 text-white media-body">
                              <h4 class="mt-0 mb-0">Jhon Deo</h4>
                              <p class="mb-4 small">jhon@gmail.com</p>
                          </div> --}}
                      </div>
                  </div>
  
                  <div class="px-4 py-3">
                      <div class="p-4 rounded shadow-sm bg-light">
                          <table class="table table-bordered">
                              <tbody>
                                  <tr>
                                      <td style="width: 250px;">First Name</td>
                                      <td>{{ $customer->first_name }}</td>
                                  </tr>
                                  <tr>
                                      <td style="width: 250px;">Last Name</td>
                                      <td>{{ $customer->last_name }}</td>
                                  </tr>
                                  <tr>
                                      <td style="width: 250px;">Email</td>
                                      <td>{{ $customer->email }}</td>
                                  </tr>
                                  <tr>
                                      <td style="width: 250px;">Phone</td>
                                      <td>{{ $customer->phone }}</td>
                                  </tr>
                                  <tr>
                                      <td style="width: 250px;">Account Number</td>
                                      <td>{{ $customer->bank_account_number }}</td>
                                  </tr>
                                  <tr>
                                      <td style="width: 250px;">About</td>
                                      <td> {{ $customer->about }} </td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
  
              </div>
          </div>
      </div>
@endsection