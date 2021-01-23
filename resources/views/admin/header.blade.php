

<?php
$notifications = [];
$reminders =[];
if(auth()->user()->is_admin){
$notifications = auth()->user()->notifications()->where('type', "App\Notifications\NewAppeal")->orWhere('type', "App\Notifications\Overstayed")->orWhere('type', "App\Notifications\BloodAppealNotification")->where('read_at', null)->get();

}
if(auth()->user()->is_patient){
$notifications = auth()->user()->notifications->where('type', "App\Notifications\NewAppeal")->where('read_at', null)->all();

}


if(auth()->user()->is_blood_bank){
  $notifications = auth()->user()->notifications()->where('type', "App\Notifications\NewAppeal")
       ->orWhere('type', "App\Notifications\BloodAppealNotification")
       ->orWhere('type', "App\Notifications\LowBlood")->where('read_at', null)->get();
}
if(auth()->user()->is_donor){
  $reminders =  auth()->user()->notifications->where('type', "App\Notifications\Transfusion")->where('read_at', null)->all();
}

?>
<header class="header twitter-bg">
    <div class="toggle-nav">
      <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
    </div>

    <!--logo start-->
    <a href="/dashboard/home" class="logo" style="color:  #fff;">BBIS</span></a>
    <!--logo end-->

    <div class="nav search-row" id="top_menu">
      <!--  search form start -->
      <ul class="nav top-menu">
        <li>
          <form class="navbar-form">
            <input class="form-control" placeholder="Search" type="text">
          </form>
        </li>
      </ul>
      <!--  search form end -->
    </div>

    <div class="top-nav notification-row">
      <!-- notificatoin dropdown start-->
      <ul class="nav pull-right top-menu">

        <!-- task notificatoin start -->

        <!-- task notificatoin end -->
        <!-- inbox notificatoin start-->
      
        <!-- inbox notificatoin end -->
        <!-- alert notification start-->
        <li id="alert_notificatoin_bar" class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                          
                          @if(auth()->user()->is_donor)
                          <i class="icon-bell-l"></i><span class="badge bg-important">{{count($reminders)}}</span>
                          @else
                          
                          <i class="icon-bell-l"></i><span class="badge bg-important">{{count($notifications)}}</span>
                          @endif
                      </a>
          <ul class="dropdown-menu extended notification">
            <div class="notify-arrow notify-arrow-blue"></div>
            
            @if (count($notifications) > 0)
            <li>
              <p class="blue">You have {{count($notifications)}} new notifications</p>
            </li>
            @else
            <li>
              <p class="blue">You have 0 new notifications</p>
            </li>
            @endif
          @if(count($notifications) > 0)
           @foreach ($notifications as $notification)
           <li>
            <a href="{{route('notifications')}}">
                <span class="label label-primary"><i class="icon_profile"></i></span>
                  {{$notification->data['appeal_type']}}
                <span class="small italic pull-right">{{$notification->created_at->diffForHumans()}}</span>
            </a>
          </li> 
           @endforeach
          @else
          <li>
            <a href="{{route('notifications')}}">
                <span class="label label-primary"><i class="icon_profile"></i></span>
                  No notification yet!
             
            </a>
          </li> 
          @endif


          @if (count($reminders) > 0)
          <li>
            <p class="blue">You have {{count($reminders)}} new reminders</p>
          </li>
          @else
          <li>
            <p class="blue">You have 0 new Reminders</p>
          </li>
          @endif
        @if(count($reminders) > 0)
         @foreach ($reminders as $notification)
         <li>
          <a href="{{route('notifications')}}">
              <span class="label label-primary"><i class="icon_profile"></i></span>
             {{$notification->data['appeal_type']}}
              <span class="small italic pull-right">{{$notification->created_at->diffForHumans()}}</span>
          </a>
        </li> 
         @endforeach
        @else
        <li>
          <a href="{{route('notifications')}}">
              <span class="label label-primary"><i class="icon_profile"></i></span>
                No reminders yet!
           
          </a>
        </li> 
        @endif
            
            <li>
              <a href="{{route('notifications')}}">See all notifications</a>
            </li>
          </ul>
        </li>
        <!-- alert notification end-->
        <!-- user login dropdown start-->
        <li class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <span class="profile-ava">
                              <img alt="" height="50" width="50" src="{{asset('images/individual.png')}}">
                          </span>
                        @if (auth()->user())
                        <span style="color: #fff" class="username">{{auth()->user()->name}}</span> 
                        @endif
                          <b class="caret"></b>
                      </a>
          <ul class="dropdown-menu extended logout">
            <div class="log-arrow-up"></div>
            <li class="eborder-top">
              <a href="/dashboard/users/{{auth()->id()}}"><i class="icon_profile"></i> My Profile</a>
            </li>
            <li>
              <a href="/"><i class="fa fa-home"></i> Return to homepage</a>
            </li>
        
            <li>
              <form action="{{ route('logout') }}" method="POST">
                {{ csrf_field() }}
                  <input type="submit"  class="btn btn-block btn-danger" value="Logout">

            </form>
            </li>
          </ul>
        </li>
        <!-- user login dropdown end -->
      </ul>
      <!-- notificatoin dropdown end-->
    </div>
  </header>