<!DOCTYPE html>
<html lang="en">
<head>
	@include('header')
</head>
<body > <!--class="animsition"-->
	
	<!-- Header -->
	<header>
		@include('contentHeader')
	</header>

	<!-- Cart -->
	@include('cart')

	@yield('content')

	@include('footer')

</body>
</html>