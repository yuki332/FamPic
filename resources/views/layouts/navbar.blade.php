<nav class="nav">
	<ul>
		<li>TOP</li>
		@guest
			<li @click="toggleModal('register')">REGISTER</li>
			<li @click="toggleModal('login')">LOGIN</li>
		@endguest
		@auth
			<li><a href="/logout">LOGOUT</a></li>
		@endauth
	</ul>
</nav>
