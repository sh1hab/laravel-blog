<html lang="en">

@include('pertials._head')

@yield('stylesheets')

<body class="">

	@include('pertials._nav')

	<div class="container">
		@include('pertials._messages')

		@yield('content')
	</div>

	@include('pertials._footer')

	@include('pertials._script')

</body>

</html>