<ul style="border: 0;" class="nav nav-pills flex-column">
    <li class="nav-item"><a class="nav-link {{activeMenu('client.account.index') ? 'active' : ''}}" href="{{route('client.account.index')}}">Overview</a></li>
    <li class="nav-item"><a class="nav-link {{activeMenu('client.account.myProfile') ? 'active' : ''}}" href="{{route('client.account.myProfile')}}">Information</a></li>
    <li class="nav-item"><a class="nav-link {{activeMenu('client.account.myCourses') ? 'active' : ''}}" href="{{route('client.account.myCourses')}}">Courses</a></li>
    <li class="nav-item"><a class="nav-link {{activeMenu('client.account.myOrders') ? 'active' : ''}}" href="{{route('client.account.myOrders')}}">Orders</a></li>
    <li class="nav-item"><a class="nav-link {{activeMenu('client.account.changePassword') ? 'active' : ''}}" href="{{route('client.account.changePassword')}}">Change password</a></li>
    <li class="nav-item"><a class="nav-link" href="#" onclick="document['form-logout'].submit(); return false;">Logout</a></li>
</ul>