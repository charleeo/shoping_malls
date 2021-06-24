@extends('layouts.app')
@section('title','create your online shop fast and easy')
@section('content')
<section class="create-business pt-3">
 
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-10">
            <div class="card shadow-sm">
                <div class="card-header"><h3 class='text-center'>Create A Subaccount</h3></div>
                <div class="card-body">
                    <small>Note: All <b><sup>*</sup> fields</b> are required</small>
                    <form action="{{route('sub-account-store')}}" method="POST">
                      @csrf
                        <div class="form-group">
                            <label for="accountNumber">Account Number <sup>*</sup> </label> <br>
                            <input type="text" name='accountNumber' class="form-control" placeholder="enter account number"
                            value="{{ old('accountNumber',
                            (isset($subAccountId->accountNumber))? $subAccountId->accountNumber: ''
                            )}}">
                        </div>
                        <div class="form-group">
                            <label for="bankCode">Banks  </label> 
                            <select name="bankCode" id="" class="form-control">
                                <option value="">select bank</option>
                                @foreach ($banks as $bank )
                                  <option value="{{$bank['code']}}"
                                  {{ old('bankCode') == $bank['code']?"selected" :"" }}
                                  {{isset($subAccountId->bankCode) && $subAccountId->bankCode===$bank['code']?'selected':''
                                }}
                                >{{$bank['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Create Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</section>
@endsection

