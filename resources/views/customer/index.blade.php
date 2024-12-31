@extends('layouts.app')


{{--Content --}}
@section('content')
<div class="mt-5 row justify-content-center">
          <div class="col-md-8">
              <h3>Customers</h3>
              <div class="card">
                  <div class="card-header">
                      <div class="row">
                      <div class="col-md-2">
                          <a href="{{ route('customer.create') }}" class="btn" style="background-color: #4643d3; color: white;"><i class="fas fa-plus"></i> Create Customer</a>
                      </div>
                      <div class="col-md-8">
                          <form action="{{ route('customer.index') }}" method="GET">
                              <div class="mb-3 input-group">
                                  <input type="text" class="form-control" name="search" value="{{ request()->search }}" placeholder="Search anything..." aria-describedby="button-addon2">
                                  <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                              </div>
                          </form>
                      </div>
                      <div class="col-md-2">
                        <form action="{{ route('customer.index') }}" method="GET" class="form-order">
                          <div class="mb-3 input-group">
                              <select class="form-select" name="order" id="" onChange="$('.form-order').submit()">
                                  <option @selected(request()->order=='desc') value="desc">Newest to Oldest</option>
                                  <option  @selected(request()->order=='asc') value="asc">Oldest to Newest</option>
                              </select>
                          </div>
                        </form>
                      </div>
                      </div>
                        
                  </div>
                  <div class="card-body">
                      <table class="table table-bordered" style="border: 1px solid #dddddd">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">First Name</th>
                              <th scope="col">Last Name</th>
                              <th scope="col">Phone Number</th>
                              <th scope="col">Email</th>
                              <th scope="col">BAN</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($customers as $customer)
                                        
                            <tr>
                              <th scope="row">{{ $loop->iteration }}</th>
                              <td>{{ $customer->first_name }}</td>
                              <td>{{ $customer->last_name }}</td>
                              <td>{{ $customer->phone }}</td>
                              <td>{{ $customer->email }}</td>
                              <td>{{ $customer->bank_account_number }}</td>
                          
                              <td>
                                  <a href="{{ route('customer.edit', $customer->id) }}" style="color: #2c2c2c;" class="ms-1 me-1"><i class="far fa-edit"></i></a>
                                  <a href="{{ route('customer.show', $customer->id) }}" style="color: #2c2c2c;" class="ms-1 me-1"><i class="far fa-eye"></i></a>
                                  <a href="javascript:;" onClick="if(confirm('Are you sure you want to delete this item'))   $('.form-{{ $customer->id }}').submit()"
                                 
                                     style="color: #2c2c2c;" class="ms-1 me-1"><i class="fas fa-trash-alt"></i></a>
                                     <form class="form-{{ $customer->id }}" action="{{ route('customer.destroy', $customer->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                              </td>
                            </tr>
                            @endforeach
                            
                          </tbody>
                        </table>
                  </div>
              </div>
          </div>
      </div>
@endsection