
<center>
<h1>-- Edit Data --</h1>

<form method="POST" action=" {{ route('updatepage',['id'=>$id]) }} ">
    @csrf
    @method('put')

    <div>
        <label> Name : </label>
        <input type="text" name="fname"  value=" {{ $id->name }} "  />
        @error('fname')
        <div>
            {{ $message }}
        </div>
        @enderror
    </div><br>

    <div>
        <label> RAM : </label>
        <input type="text" name="fram" value=" {{ $id->ram }} "  />
        @error('fram')
        <div>
            {{ $message }}
        </div>
        @enderror
    </div><br>

    <div>
        <label> Processor : </label>
        <input type="text" name="fprocessor" value=" {{ $id->processor }} " />
        @error('fprocessor')
        <div>
            {{ $message }}
        </div>
        @enderror
    </div><br>

    <div>
        <label> Windows Version : </label>
        <input type="text" name="fwversion" value=" {{ $id->wversion }} " />
        @error('fwversion')
        <div>
            {{ $message }}
        </div>
        @enderror
    </div><br>

    <div>
        <label> Price : </label>
        <input type="text" name="fprice" value=" {{ $id->price }} " />
        @error('fprice')
        <div>
            {{ $message }}
        </div>
        @enderror
    </div><br>

    <div>
        <button type="submit"> Update </button>
    </div>

</form>
</center>