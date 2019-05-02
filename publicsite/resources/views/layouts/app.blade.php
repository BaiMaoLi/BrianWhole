<!DOCTYPE html>
<html lang="en">
<head>
    @include('Layout.mainheader')
	
	@yield('headerpart')
</head>
<body class="nav-sm preloader-off developer-mode ">
	<div class="loader-container">
         <div class="sk-spinner sk-spinner-pulse"></div>
    </div>
	<div class="pace-cover"></div>
	<div id="st-container" class="st-container st-effect">
	    <div class="body">
	        <div class="main_container">
	            @include('Layout.maintopnav')
	            <div style="width:100%;height:20px"></div>

				@yield('content')

				 @include('Layout.mainfooter')
			 </div>
			@include('Layout.mainnav')
	 	</div>
		 <div class="search search-main">
			 <div id="btn-search-close" class="btn btn--search-close" aria-label="Close search form">
				 <i class="fa fa-times"></i>
			 </div>
			 <form class="search__form" action="#">
				 <input class="search__input" name="search" type="search" placeholder="Hash, transactions..." autocomplete="off" autocapitalize="off" spellcheck="false"/>
				 <span class="search__info">Hit enter to search or ESC to close</span>
			 </form>
		 </div>


 	 @include('Layout.mainscript')
	 @yield('script')
	 <script>
      window.onload = function () {
          setTimeout(function () {
              $('.loader-container').fadeOut('slow');
          }, 100);
      }
    </script>
 	</div>
 </body>
 </html>
