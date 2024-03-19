{{-- Here im showing a message that details are deleted below is the logic for it --}}

@if (session()->has('msg'))
<b> {{ session('msg') }} </b>
@endif

{{-- OR you can use below method--}}

{{-- @if (Session::has('msg'))
<p> {{Session::get('msg')}} </p>
@endif --}}





@if(Auth::user())
<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

@else
<a href="{{route('login')}}" class="btn btn-danger float-end">Login</a>

@endif



<center>
    <div>
        <table border="3">
            <tr>
                <th> ID </th>
                <th> NAME </th>
                <th> RAM </th>
                <th> PROCESSOR </th>
                <th> W-VERSION </th>
                <th> PRICE </th>
                <th> EDIT </th>
                <th> DELETE </th>
            </tr>
            @foreach ($data as $item)
            <tr>
                <td> {{ $item->id }} </td>
                <td> {{ $item->name }} </td>
                <td> {{ $item->ram }} </td>
                <td> {{ $item->processor }} </td>
                <td> {{ $item->wversion }} </td>
                <td> {{ $item->price }} </td>
                {{-- <td> <a href=" {{ route('editform',['id'=>$data->id]) }} "> edit</a></td> --}}
                <td> <a href=" {{ route('editform',['id'=>$item]) }} "> edit</a></td>
                {{-- below is a delete button link --}}
                <td>
                    <form method="POST" action=" {{ route('deletepage',['laptop'=>$item->id]) }} ">
                        @csrf
                        @method('delete')
                        <button type="submit"> Delete </button>

                    </form>
                </td>
            </tr>

            @endforeach
        </table>

        
        {{--Pagination--}}

        <div>
            {{  $data->links() }}
        </div>

    </div>

    <div>

        <h2> Go to Home Page : <button> <a href=" {{ route('welcome') }} "> Click Here</a> </button> </h2>

        <h1> OR </h1>

        <form method="POST" action=" {{ route('welcome') }} ">
            @csrf
            {{-- @method('get') --}}
            <button type="submit"> Click Here </button>
        </form>

    </div>
</center>