<ul class="nav nav-pills">
    <li class="nav-item">
        <a class="nav-link {{get_active_page('home_page')}}" aria-current="page" href="{{route('home_page')}}">خانه</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{get_active_page('files_page')}}" href="{{route('files_page')}}">فایل آپلودر</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{get_active_page('products_page')}}" href="{{route('products_page')}}">محصولات</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{get_active_page('posts_page')}}" href="{{route('posts_page')}}">مطالب</a>
    </li>
</ul>
