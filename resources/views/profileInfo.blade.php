<div class="row" style="padding: 0px 0px 20px 0px">
    <div class="card bg-dark text-white col-sm-5">
        <img class="card-img" src="{{$user->avatar}}" alt="Card image">
        <div class="card-img-overlay">
            <h4 class="card-title text-center" style="font-weight: 800;text-shadow: 0 0 5px rgba(0,0,0,0.5);">
                {{$user->name}}
            </h4>
        </div>
    </div>
    <div class="col-sm-7" style="padding-top: 10px">
        <ul class="list-group">
            <li class="list-group-item">
                Name : {{$user->name}}
            </li>
            <li class="list-group-item">
                Email : {{$user->email}}
            </li>
            <li class="list-group-item">
                Age : {{$user->age}}
            </li>
            <li class="list-group-item">
                Gender : {{$user->gender}}
            </li>
        </ul>
    </div>
</div>
