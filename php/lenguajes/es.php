<?php
	$lang = array(
		"selectLang" => "ES",

		// -- INDEX --
		"indexTitle" => "Página inicial",
		"tituloIndex" => "Bienvenido/a",
		"lang_en" => "Inglés",
		"lang_es" => "Español",
		"indexPreg1" => "¿Ya tiene una cuenta?",
		"indexPreg2" => "¿Aún no tienes cuenta?",
		"indexBtnLogin" => "ENTRAR",
        "indexBtnRegistro" => "REGISTRARSE",

		// -- LOGIN --
		"loginTitle" => "Página de acceso",
		"tituloLogin" => "Acceso de usuarios",
        "nombreLogin" => "Nombre de usuario *",
        "passwordLogin" => "Contraseña *",
        "btnVolverLogin" => "VOLVER",
        "btnEntrarLogin" => "ENTRAR",

		// -- REGISTRO --
		"registroTitle" => "Página de registro",
        "registroTitulo" => "Registro de usuario",
        "registroAdvertencia" => "Todos los campos marcados con * son obligatorios.",
        "registroNombre" => "Nombre de usuario *",
        "registroPassword" => "Contraseña *",
        "registroPasswordR" =>"Repita la contraseña *",
        "registroEmail" => "Dirección email *",
        "registroFecha" => "Fecha de nacimiento *",
        "registroAvatar" => "Avatar *",
        "btnVolverRegistro" => "VOLVER",
        "btnRegistrarseRegistro" => "CONTINUAR",
		"btnLogear" =>"CONTINUAR",

		// -- ERRORES --
		"userErr1" => "Campo de usuario vacio.",
		"userErr2" => "Nombre de usuario no válido.",
		"loginUserErr" => "Usuario no encontrado.",
		"userLogged" => "Usuario logeado con éxito.",
		"passwdErr1" => "Campo de contraseña vacío.",
		"passwdErr2" => "La contraseña debe contener dígitos, mayúsculas, minusculas y de 8 a 16 carácteres.",
		"passwdMatchErr" => "Las contraseñas no coinciden.",
		"emailErr1" => "Campo de email vacío.",
		"emailErr2" => "Campo de email no válido.",
		"emailErr3" => "Email ya está en uso.",
		"dateErr1" => "Campo de fecha de nacimiento vacio.",
		"dateErr2" => "Campo de fecha de nacimiento no válido.",
		"dateErr3" => "Fecha de nacimiento fuera de los limites.",
		"sizeErr" => "El archivo seleccionado supera el peso maximo (1MB).",
		"fileErr" => "Solo se acepta archivos jpg, jpge o png.",
		"fileErr2" => "Campo de avatar vacio.",
		"userRegistered" => "Usuario registrado con éxito.",
		"userErr3" => "Nombre de usuario ya está en uso.",
		"elementNameErr" => "Campo nombre vacío",
		"elementNameErr2" => "Nombre de elemento no válido",

		// -- PERFIL TAB AYUDA --
		"perfilTitle" => "Batallas",
		"perfilClose" => "Cerrar sesión",
		"ayudaContent" => '<h1 class="faq-h1">Preguntas más frecuentes</h1>
							<div class="faq-container">
								<div class="questions">
									<div class="faq faq-one">
										<h2 class="faq-title">¿Qué son las batallas?</h2>
										<div class="faq-answer">
											Las batallas son enfrentamientos creados por los usuarios entre dos elementos cualesquiera, las cuales dan a saber a la comunidad cual de dichos 
											elementos son los favoritos o los más valorados gracias al sistema de votos.
										</div>
									</div>
									<div class="hr"></div>
									<div class="faq faq-two">
										<h2 class="faq-title">¿Qué son los elementos?</h2>
										<div class="faq-answer">
											Los elementos son objetos de un mismo entorno <em>(leguajes, series, marcas...)</em> efrentados entre sí a través de batallas.
										</div>
									</div>
									<div class="hr"></div>
									<div class="faq faq-three">
										<h2 class="faq-title">¿Qué pasa si denuncio un batalla?</h2>
										<div class="faq-answer">
											Al denunciar una batallas, estarás dando a entender algunos de los siguientes puntos:<br><br>
											<ul>
												<li>Que los elementos no tiene relación alguna entre sí <em>(Ejemplo: Fuego vs. Audi)</em>.</li>
												<li>Que los elemetos poseen contenido que puede resultar ofensivo para el resto de usuarios <em>(Ejemplo: homofobia, racismo, odio hacia algun 
													conjunto de personas, etc.)</em>.</li>
											</ul><br>
											Una vez hayas denunciado una batalla el usuario automáticamente recibirá un punto de <em>troll</em> en su cuenta personal.
										</div>
									</div>
									<div class="hr"></div>
									<div class="faq faq-four">
										<h2 class="faq-title">¿Qué son los puntos troll?</h2>
										<div class="faq-answer">
											Los puntos de <em>troll</em> son puntos negativos que obtienen los usuarios por cada denuncia de las batallas que hayan creado, estos puntos son 
											acumulativos y tambien cuentan como voto, por lo que solo se podrá votar un elemento o denunciar la batalla del mismo. Cuando el 80% de los votos 
											totales de una batalla son denuncias, esta será eliminada para todos los usuarios y su creador obtendrá un punto de <em>troll</em>.<br><br>
											Los usuario con 10 puntos <em>troll</em> acumulados seran baneados del sistema y no se podrá registrar de nuevo con las mismas credenciales.
										</div>
									</div>
									<div class="hr"></div>
									<div class="faq faq-five">
										<h2 class="faq-title">¿Puedo recuperar mi cuenta si ha sido baneada?</h2>
										<div class="faq-answer">
											Todos los baneos estan sujetos a revisión, por lo que si tu cuenta ha sido baneada de forma injusta deberás esperar a que los administradores 
											comprueben tu caso.<br>
										</div>
									</div>
									<div class="hr"></div>
									<div class="faq faq-six">
										<h2 class="faq-title">¿Qué son los logros?</h2>
										<div class="faq-answer">
											Los logros son un sistema de recompensas por la interacción con las batallas, tanto propias como de otros usuarios.<br><br>
											Logros por crear batallas:<br><br>
											<ul>
												<li><strong>Comprometido</strong>: Has creado 10 batallas para la comunidad.</li>
												<li><strong>Vicioso</strong>: Has creado 100 batallas para la comunidad.</li>
												<li><strong>Adicto</strong>: Has creado 1000 batallas para la comunidad.</li>
											</ul><br>
											Logros por votar batallas:<br><br>
											<ul>
												<li><strong>Votante</strong>: Has votado en 10 batallas de otros usuarios.</li>
												<li><strong>Sindicalista</strong>: Has votado en 100 batallas de otros usuario.</li>
												<li><strong>Activista</strong>: Has votado en 1000 batallas de otros usuario.</li>
											</ul><br>
											Logros por denunciar batallas:<br><br>
											<ul>
												<li><strong>Vigilante</strong>: Has denunciado 10 batallas.</li>
												<li><strong>Moderador</strong>: Has denunciado 100 batallas.</li>
												<li><strong>Policía</strong>: Has denunciado 1000 batallas.</li>
											</ul><br>
										</div>
									</div>
									<div class="hr"></div>
									<div class="faq faq-three">
										<h2 class="faq-title">Has denunciado varias batallas, pero tus logros no avanzan.</h2>
										<div class="faq-answer">
											Para que las denuncias contabilicen en los logros, las batallas en cuestion deberán ser eliminadas (80% de los votos totales son denuncias).<br>
											De esta manera se evita que los usuarios denuncien batallas al azar para obtener los logros más rápido.
										</div>
									</div>
								</div>
							</div>',

		// -- LOGROS --

		"achievementTittle" => "Tus logros",

		//ELEMENTOS CREADOS
		"achievementCrEl" => "El logro se desbloquea a los 10 elementos creados, tu tienes: ",
		"CrEl" => "Elementos creados: ",
		"CrEl1" => ". Principiante",
		"CrEl2" => ". Magnate",
		"CrEl3" => ". Dios de la Guerra",

		//BATALLAS CREADAS
		"achievementCrBt" => "El logro se debloquea a las 10 batallas creadas, tu tienes: ",
		"CrBt" => "Batallas creadas: ",
		"CrBt1" => ". Comprometido",
		"CrBt2" => ". Vicioso",
		"CrBt3" => ". Adicto",

		//BATALLAS VOTADAS
		"achievementVtBt" => "El logro se desbloquea a las 10 batallas votadas, tu tienes: ",
		"VtBt" => "Batallas votadas: ",
		"VtBt1" => ". Votante",
		"VtBt2" => ". Sindicalista",
		"VtBt3" => ". Activista",

		//BATALLAS IGNORADAS
		"achievementIgBt" => "El logro se desbloquea a las 10 batallas ignoradas, tu tienes: ",
		"IgBt" => "Batallas ignoradas: ",
		"IgBt1" => ". Ignorante",
		"IgBt2" => ". Pasota",
		"IgBt3" => ". ¿Para que te creas una cuenta? PENDEJO",

		//BATALLAS DENUNCIADAS
		"achievementRpBt" => "El logro se desbloquea a las 10 batallas denunciadas, tu tienes: ",
		"RpBt" => "Batallas denunciadas: ",
		"RpBt1" => ". Vigilante",
		"RpBt2" => ". Moderador",	
	);
?>