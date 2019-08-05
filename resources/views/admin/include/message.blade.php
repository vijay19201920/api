    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissable custom-success-box" style="margin-top: 15px;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p> {{ Session('success') }} </p>
        </div>
    @endif
        @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissable custom-success-box" style="margin-top: 15px;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p> {{ Session('error') }} </p>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissable custom-success-box" style="margin-top: 15px;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>  
    @endif