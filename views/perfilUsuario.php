<link rel="stylesheet" href="css/perfilUsuario.css">

<div class="perfil-dashboard">

    <div class="perfil-header">
        <div class="perfil-avatar-container">
            <div class="perfil-avatar">
                <img id="avatar" src="<?= $fotoPerfil ?>" alt="Avatar Default">
            </div>

            <div class="perfil-avatar-botones">
                <button class="btn-cambiar-foto" id="btnCambiarFoto">Cambiar foto</button>
                <form method="POST" style="display:inline;">
                    <button type="submit" name="restaurarFoto" class="btn-restaurar-foto"
                        id="btnRestaurarFoto">Restaurar foto</button>
                </form>
            </div>

            <div id="inputUrlContainer" style="display:none; margin-top:10px;">
                <form method="POST">
                    <input type="text" id="inputUrlFoto" name="fotoDePerfil" placeholder="Pega aquí la URL de tu imagen"
                        value="<?= $fotoPerfil ?>" style="width:100%; padding:5px;">
                    <button type="submit" name="guardarFoto" class="btn-guardar">Guardar Foto</button>
                </form>
            </div>
        </div>

        <div class="perfil-info">
            <span>Nombre de Usuario</span>
            <span id="nombreTexto" class="nombre-editable"><?= $_SESSION['nombreDeUsuario'] ?? 'Tu Nombre' ?></span>

            <p class="ubicacion"><span id="ciudad">Buenos Aires</span>, <span id="pais">Argentina</span></p>
            <textarea id="bio" class="bio-editable" placeholder="Escribe algo sobre ti..."></textarea>

            <script>
                const bioTextarea = document.getElementById("bio");

                document.addEventListener("DOMContentLoaded", () => {
                    const bioGuardada = localStorage.getItem("bioUsuario");
                    if (bioGuardada) {
                        bioTextarea.value = bioGuardada;
                    }
                });

                bioTextarea.addEventListener("input", () => {
                    localStorage.setItem("bioUsuario", bioTextarea.value);
                });
            </script>

        </div>
    </div>

    <div class="perfil-secciones">
        <ul>
            <li><a href="#">Configuración</a></li>
            <li><a href="soportePrincipal.php">Soporte</a></li>
            <li><a href="#">Privacidad</a></li>
            <li><a href="#">Notificaciones</a></li>
            <li><a href="#">Seguridad</a></li>
        </ul>
        <a href="logout.php"><button class="btn-logout">Cerrar Sesión</button></a>
    </div>

    <div class="perfil-juegos">
        <h2>Ultimos juegos Adquiridos</h2>
        <?php
        $stmt = $conex->prepare("
        SELECT v.nombreDelJuego, v.descripcion, i.url AS imagen
        FROM biblioteca b
        JOIN videojuego v ON v.idVideoJuego = b.idVideoJuego
        LEFT JOIN imagenes_juego i ON i.idVideoJuego = v.idVideoJuego AND i.tipo = 'portada'
        WHERE b.IDusuario = ?
        ORDER BY b.idBiblioteca DESC
        LIMIT 3
    ");
        $stmt->bind_param("i", $IDusuario);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            while ($juego = $resultado->fetch_assoc()) {
                $imgJuego = !empty($juego['imagen']) ? $juego['imagen'] : "img/juegoDefault.jpg";

                echo '<div class="juego">';
                echo '  <img src="' . $imgJuego . '" alt="' . $juego['nombreDelJuego'] . '">';
                echo '  <div class="info-juego">';
                echo '      <h3>' . $juego['nombreDelJuego'] . '</h3>';
                echo '  </div>';
                echo '</div>';
            }
        } else {
            echo '<p>No has adquirido ningún juego aún.</p>';
        }

        $stmt->close();
        ?>
    </div>

</div>
<script>

    const avatar = document.getElementById("avatar");
    const btnCambiarFoto = document.getElementById("btnCambiarFoto");
    const inputUrlContainer = document.getElementById("inputUrlContainer");
    const inputUrlFoto = document.getElementById("inputUrlFoto");
    const fotoOriginal = avatar.src;

    btnCambiarFoto.addEventListener("click", () => {
        inputUrlContainer.style.display = inputUrlContainer.style.display === "none" ? "block" : "none";
    });

    inputUrlFoto.addEventListener("input", () => {
        avatar.src = inputUrlFoto.value || fotoOriginal;
    });

    const secciones = document.querySelectorAll(".perfil-secciones a[href='#']");
    const contenedorJuegos = document.querySelector(".perfil-juegos");

    function animarTransicion(elemento) {
        elemento.style.opacity = 0;
        setTimeout(() => (elemento.style.opacity = 1), 100);
    }

    function crearCampo(label, type, placeholder) {
        const wrapper = document.createElement("div");
        wrapper.style.marginBottom = "20px";

        const lbl = document.createElement("label");
        lbl.textContent = label;
        lbl.style.display = "block";
        lbl.style.color = "#b18aff";
        lbl.style.fontWeight = "bold";
        lbl.style.marginBottom = "6px";

        const input = document.createElement("input");
        input.type = type;
        input.placeholder = placeholder;
        input.className = "campo-estilo";

        wrapper.appendChild(lbl);
        wrapper.appendChild(input);
        return wrapper;
    }

    function crearBoton(texto) {
        const btn = document.createElement("button");
        btn.textContent = texto;
        btn.className = "btn-guardar";
        btn.style.marginTop = "20px";
        return btn;
    }

    function crearBloqueDescripcion(texto) {
        const p = document.createElement("p");
        p.textContent = texto;
        p.style.color = "#d1c4ff";
        p.style.fontSize = "15px";
        p.style.marginBottom = "20px";
        p.style.lineHeight = "1.6";
        p.style.background = "rgba(126,92,242,0.1)";
        p.style.padding = "12px 16px";
        p.style.borderRadius = "10px";
        p.style.border = "1px solid rgba(158,131,255,0.3)";
        return p;
    }

    function crearOpcionCheckbox(texto) {
        const label = document.createElement("label");
        label.style.display = "block";
        label.style.margin = "10px 0";
        label.style.color = "#fff";
        label.style.background = "rgba(126,92,242,0.15)";
        label.style.padding = "10px 14px";
        label.style.borderRadius = "10px";
        label.style.border = "1px solid rgba(158,131,255,0.25)";
        label.style.cursor = "pointer";
        label.style.transition = "0.2s";

        const checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.style.marginRight = "10px";
        checkbox.addEventListener("change", () => {
            label.style.background = checkbox.checked
                ? "rgba(158,131,255,0.35)"
                : "rgba(126,92,242,0.15)";
        });

        label.appendChild(checkbox);
        label.appendChild(document.createTextNode(texto));
        return label;
    }

    function cargarFormulario(tipo) {
        contenedorJuegos.innerHTML = "";
        const titulo = document.createElement("h2");
        titulo.style.color = "#b18aff";

        animarTransicion(contenedorJuegos);

        if (tipo === "configuracion") {
            titulo.textContent = "Configuración de Cuenta";

            const nombreUsuario = crearCampo("Nombre de Usuario:", "text", "Ingresa tu nombre de usuario...");
            nombreUsuario.querySelector("input").value = "<?= $_SESSION['nombreDeUsuario'] ?>";

            const email = crearCampo("Correo Electrónico:", "text", "Ingresa tu correo...");
            email.querySelector("input").value = "<?= $_SESSION['email'] ?? '' ?>";

            const pass = crearCampo("Contraseña:", "password", "Ingrese su nueva contraseña...");

            const btnGuardar = crearBoton("Guardar cambios");
            btnGuardar.addEventListener("click", () => {
                const form = document.createElement("form");
                form.method = "POST";
                form.style.display = "none";

                const campoNombre = document.createElement("input");
                campoNombre.name = "nombreDeUsuario";
                campoNombre.value = nombreUsuario.querySelector("input").value;
                form.appendChild(campoNombre);

                const campoEmail = document.createElement("input");
                campoEmail.name = "email";
                campoEmail.value = email.querySelector("input").value;
                form.appendChild(campoEmail);

                const campoPass = document.createElement("input");
                campoPass.name = "password";
                campoPass.value = pass.querySelector("input").value;
                form.appendChild(campoPass);

                const campoGuardar = document.createElement("input");
                campoGuardar.type = "hidden";
                campoGuardar.name = "guardarConfiguracion";
                campoGuardar.value = "1";
                form.appendChild(campoGuardar);

                document.body.appendChild(form);

                alert("Cambios guardados correctamente");
                form.submit();
            });

            contenedorJuegos.appendChild(titulo);
            contenedorJuegos.appendChild(nombreUsuario);
            contenedorJuegos.appendChild(email);
            contenedorJuegos.appendChild(pass);
            contenedorJuegos.appendChild(btnGuardar);
        }

        if (tipo === "privacidad") {
            titulo.textContent = "Privacidad";
            const descripcion = crearBloqueDescripcion(
                "Controla quién puede ver tu perfil, tu última conexión y tu información personal. Mantén tu privacidad configurada como desees."
            );

            const opciones = [
                "Perfil visible solo para amigos",
                "Ocultar mi última conexión",
                "No mostrar mi correo público",
                "Evitar que me busquen por nombre de usuario"
            ];

            contenedorJuegos.appendChild(titulo);
            contenedorJuegos.appendChild(descripcion);
            opciones.forEach(op => contenedorJuegos.appendChild(crearOpcionCheckbox(op)));

            const btnGuardar = crearBoton("Guardar preferencias");
            btnGuardar.addEventListener("click", () => alert("Preferencias guardadas correctamente"));
            contenedorJuegos.appendChild(btnGuardar);
        }

        if (tipo === "notificaciones") {
            titulo.textContent = "Notificaciones";
            const descripcion = crearBloqueDescripcion(
                "Configura qué notificaciones quieres recibir. Puedes activarlas o desactivarlas según tus preferencias."
            );

            const opciones = [
                "Recibir correos sobre promociones",
                "Notificarme cuando un amigo se conecta",
                "Alertas de seguridad por nuevos dispositivos",
                "Recordatorios de juegos pendientes"
            ];

            contenedorJuegos.appendChild(titulo);
            contenedorJuegos.appendChild(descripcion);
            opciones.forEach(op => contenedorJuegos.appendChild(crearOpcionCheckbox(op)));

            const btnGuardar = crearBoton("Guardar notificaciones");
            btnGuardar.addEventListener("click", () => alert("Notificaciones guardadas correctamente"));
            contenedorJuegos.appendChild(btnGuardar);
        }

        if (tipo === "seguridad") {
            titulo.textContent = "Seguridad";
            const descripcion = crearBloqueDescripcion(
                "Protege tu cuenta activando medidas de seguridad adicionales. Recomendamos habilitar la verificación en dos pasos para mayor protección."
            );

            const opciones = [
                "Activar verificación en dos pasos",
                "Recibir alerta ante intentos de inicio sospechosos",
                "Permitir cierre de sesión en todos los dispositivos",
                "Solicitar contraseña al cambiar datos sensibles"
            ];

            contenedorJuegos.appendChild(titulo);
            contenedorJuegos.appendChild(descripcion);
            opciones.forEach(op => contenedorJuegos.appendChild(crearOpcionCheckbox(op)));

            const btnGuardar = crearBoton("Guardar seguridad");
            btnGuardar.addEventListener("click", () => alert("Configuración de seguridad guardada"));
            contenedorJuegos.appendChild(btnGuardar);
        }
    }

    secciones.forEach(link => {
        link.addEventListener("click", (e) => {
            e.preventDefault();
            const texto = link.textContent.trim().toLowerCase();
            if (texto === "configuración") cargarFormulario("configuracion");
            else if (texto === "privacidad") cargarFormulario("privacidad");
            else if (texto === "notificaciones") cargarFormulario("notificaciones");
            else if (texto === "seguridad") cargarFormulario("seguridad");
        });
    });

</script>