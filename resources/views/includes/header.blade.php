    <!--header-top-starts-->
    <div class="header-top">
        <div class="container">
            <div class="head-main">
                <a href="{{url('/')}}"><img id="logoMain" src="{{asset('images/logo/logo.png')}}"></a>
            </div>
        </div>
    </div>
    <!--header-top-end-->
    <!--start-header-->
    <div class="header">
        <div class="container">
            <div class="head">
                <div class="navigation">
                    <span class="menu"></span>
                    <ul class="navig">
                        <li><a href="{{url('/')}}" @if(Request::segment('1') == '') class="active" @endif>Home</a></li>
                        <li><a href="{{url('/about')}}" @if(Request::segment('1') == 'about') class="active" @endif>About</a></li>
                        <li><a href="{{url('/gallery')}}" @if(Request::segment('1') == 'gallery') class="active" @endif>Gallery</a></li>
                        <li><a href="typo.html">Typo</a></li>
                        <li><a href="contact.html" @if(Request::segment('1') == 'contact') class="active" @endif>Contact</a></li>
                    </ul>
                </div>
                <div class="header-right">
                    <div class="search-bar">
                        <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
                        <input type="submit" value="">
                    </div>
                    <ul>
                        <li><a href="#"><span class="fb"> </span></a></li>
                        <li><a href="#"><span class="twit"> </span></a></li>
                        <li><a href="#"><span class="pin"> </span></a></li>
                        <li><a href="#"><span class="rss"> </span></a></li>
                        <li><a href="#"><span class="drbl"> </span></a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>