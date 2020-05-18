<nav id="mainnav-container">
	<div id="mainnav">
		<div id="mainnav-menu-wrap">
			<div class="nano">
				<div class="nano-content ">
					<div id="mainnav-profile" class="mainnav-profile">
						<div class="profile-wrap text-center">
							<div class="pad-btm">
								<img class="img-circle img-md" src="{{ asset("img/profile-photos/1.png") }}" alt="Profile Picture">
							</div>
							<a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
								<span class="pull-right dropdown-toggle">
									<i class="dropdown-caret"></i>
								</span>
								<p class="mnp-name">Aaron Chavez </p>
								<span class="mnp-desc">{{ Auth::user()->email }}</span>
							</a>
						</div>
						<div id="profile-nav" class="collapse list-group bg-trans">
							<a href="#" class="list-group-item">
								<i class="demo-pli-male icon-lg icon-fw"></i> View Profile
							</a>
							<a href="#" class="list-group-item">
								<i class="demo-pli-gear icon-lg icon-fw"></i> Settings
							</a>
							<a href="#" class="list-group-item">
								<i class="demo-pli-information icon-lg icon-fw"></i> Help
							</a>
							<a href="#" class="list-group-item">
								<i class="demo-pli-unlock icon-lg icon-fw"></i> Logout
							</a>
						</div>
					</div>

					<div id="mainnav-shortcut" class="hidden">
						<ul class="list-unstyled shortcut-wrap">
							<li class="col-xs-3" data-content="My Profile">
								<a class="shortcut-grid" href="#">
									<div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
										<i class="demo-pli-male"></i>
									</div>
								</a>
							</li>
							<li class="col-xs-3" data-content="Messages">
								<a class="shortcut-grid" href="#">
									<div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
										<i class="demo-pli-speech-bubble-3"></i>
									</div>
								</a>
							</li>
							<li class="col-xs-3" data-content="Activity">
								<a class="shortcut-grid" href="#">
									<div class="icon-wrap icon-wrap-sm icon-circle bg-success">
										<i class="demo-pli-thunder"></i>
									</div>
								</a>
							</li>
							<li class="col-xs-3" data-content="Lock Screen">
								<a class="shortcut-grid" href="#">
									<div class="icon-wrap icon-wrap-sm icon-circle bg-purple">
										<i class="demo-pli-lock-2"></i>
									</div>
								</a>
							</li>
						</ul>
					</div>

					@if(Auth::user()->tipo=="ADMIN")
						<ul id="mainnav-menu" class="list-group">
							<li class="list-header">Opciones</li>
							
							<li>
								<a href="#">
									<i class="pli-file-clipboard-file-text"></i>
									<span class="menu-title">Inscripciones</span>
									<i class="arrow"></i>
								</a>
								<ul class="collapse">
									<li><a href="{{ route('grupo') }}">Grupos</a></li>
									<li><a href="{{ route('aula') }}">Aulas</a></li>
									<li><a href="{{ route('estudiante') }}">Estudiante</a></li>
									<li><a href="{{ route('responsable') }}">Responsables</a></li>

									<li><a href="{{ route('traspaso') }}">Traspasos</a></li>
									<li><a href="{{ route('evaluaciones.index') }}">Ponderaciones</a></li>
								</ul>
							</li>
							<li>
								<a href="#">
									<i class="pli-old-radio"></i>
									<span class="menu-title">Admin. Equipo</span>
									<i class="arrow"></i>
								</a>
								<ul class="collapse">
									<li><a href="{{ route('docente') }}">Docentes</a></li>
									<li><a href="{{ route('equipos.index') }}">Equipos</a></li>
									<li><a href="{{ route('materiales.index') }}">Materiales Didacticos</a></li>
									<li><a href="{{ route('prestamos.index') }}">Prestamos</a></li>
								</ul>
							</li>
							<li>
								<a href="#">
									<i class="pli-file-horizontal-text"></i>
									<span class="menu-title">Noticias</span>
									<i class="arrow"></i>
								</a>
								<ul class="collapse">
									<li><a href="{{ route('noticia') }}">Noticias</a></li>
								</ul>
							</li>
							<li>
								<a href="#">
									<i class="pli-calendar-4 icon-lg icon-fw"></i>
									<span class="menu-title">Tareas Comunes</span>
									<i class="arrow"></i>
								</a>
								<ul class="collapse">
									<li><a href="{{ route('periodo') }}">Periodos</a></li>
									<li><a href="{{ route('importar') }}">Importar Grupos</a></li>
									<li><a href="{{ route('curso') }}">Cursos</a></li>
								</ul>
							</li>
							<li>
								<a href="#">
									<i class="demo-pli-gear icon-lg icon-fw"></i>
									<span class="menu-title">Configuracion</span>
									<i class="arrow"></i>
								</a>
								<ul class="collapse">
									<li><a href="{{ route('idioma') }}">Idiomas</a></li>
									<li><a href="{{ route('categoria') }}">Categorias</a></li>
									<li><a href="{{ route('modalidad') }}">Modalidad</a></li>
								</ul>
							</li>
						</ul>
					@endif
					
					@if(Auth::user()->tipo=="DOCENTE")
						<ul id="mainnav-menu" class="list-group">
							<li class="list-header">Opciones</li>
							
							<li class="active-link">
						                <a href="{{ route('grupo') }}" data-original-title="" title="">
						                    <i class="demo-pli-inbox-full"></i>
						                    <span class="menu-title">Grupos</span>
						                </a>
						    </li>
							<li class="">
						                <a href="{{ route('grupo') }}" data-original-title="" title="">
						                    <i class="demo-pli-inbox-full"></i>
						                    <span class="menu-title">Prestamos</span>
						                </a>
						    </li>
							<li>
								<a href="#">
									<i class="demo-pli-gear icon-lg icon-fw"></i>
									<span class="menu-title">Configruaciones</span>
									<i class="arrow"></i>
								</a>
								<ul class="collapse">
									<li><a href="{{ route('grupo') }}">Otra Opcion</a></li>
								</ul>
								
							</li>
						</ul>
					@endif	
					@if(Auth::user()->tipo=="ESTUDIANTE")
						<ul id="mainnav-menu" class="list-group">
							<li class="list-header">Opciones</li>
							
							<li class="active-link">
						                <a href="{{ route('record') }}" data-original-title="" title="">
						                    <i class="demo-pli-inbox-full"></i>
						                    <span class="menu-title">Record Academico</span>
						                </a>
						    </li>
							<li class="">
						                <a href="{{ route('notas') }}" data-original-title="" title="">
						                    <i class="demo-pli-inbox-full"></i>
						                    <span class="menu-title">Notas</span>
						                </a>
						    </li>
							<li>
								<a href="#">
									<i class="demo-pli-gear icon-lg icon-fw"></i>
									<span class="menu-title">Configruaciones</span>
									<i class="arrow"></i>
								</a>
								<ul class="collapse">
									<li><a href="{{ route('grupo') }}">Otra Opcion</a></li>
								</ul>
								
							</li>
						</ul>
					@endif	
				</div>
			</div>
		</div>
	</div>
</nav>