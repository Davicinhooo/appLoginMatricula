<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Sistema Matrícula') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Importando la fuente Inter con un peso extra para los títulos */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

body {
    font-family: 'Inter', sans-serif;
    /* Fondo monocromático sutil (Gris muy claro azulado) */
    background-color: #f8fafc;
    color: #334155;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

/* --- NAVBAR MONOCROMÁTICO --- */
.navbar {
    background-color: #ffffff !important;
    border-bottom: 1px solid #e2e8f0;
    padding: 1rem 0;
}
.navbar-brand {
    font-weight: 700;
    font-size: 1.25rem;
    color: #0f172a !important;
    letter-spacing: -0.5px;
}
.nav-link {
    color: #64748b !important;
    font-weight: 500;
    font-size: 1rem;
    transition: color 0.2s;
}
.nav-link:hover { color: #0f172a !important; }

/* --- CONTENEDOR CENTRAL --- */
.main-wrapper {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 3rem 1rem;
}

/* --- ESTILO DE LA TARJETA (CARD) --- */
.card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
    background-color: #ffffff;
}
.card-header {
    background-color: transparent;
    border-bottom: 1px solid #f1f5f9;
    font-size: 1.5rem; /* Letra grande y clara para el título */
    font-weight: 600;
    color: #1e293b;
    text-align: center;
    padding: 1.5rem;
}
.card-body { padding: 2.5rem; }

/* --- INPUTS Y LABELS --- */
label {
    font-size: 0.95rem;
    font-weight: 500;
    color: #475569;
}
.form-control {
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    padding: 0.75rem 1rem;
    font-size: 1rem; /* Buen tamaño para leer lo que se escribe */
    color: #1e293b;
    transition: all 0.2s;
}
.form-control:focus {
    border-color: #10b981; /* Borde verde al hacer clic */
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15);
}

/* --- EL BOTÓN VERDE (LOGIN/REGISTER) --- */
.btn-primary {
    background-color: #10b981; /* Verde esmeralda vivo y moderno */
    border: none;
    border-radius: 8px;
    color: #ffffff;
    font-weight: 600;
    font-size: 1rem;
    padding: 0.75rem 1.5rem;
    transition: all 0.2s ease;
}
.btn-primary:hover {
    background-color: #059669; /* Verde más oscuro al pasar el mouse */
    transform: translateY(-1px);
}

/* --- BOTÓN DE GOOGLE (Adaptado al monocromático) --- */
.btn-outline-danger {
    background-color: #ffffff;
    border: 1px solid #cbd5e1;
    color: #475569;
    font-weight: 500;
    border-radius: 8px;
    padding: 0.75rem 1.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    transition: all 0.2s;
}
.btn-outline-danger:hover {
    background-color: #f8fafc;
    color: #0f172a;
    border-color: #94a3b8;
}

/* Enlaces (Olvidaste tu contraseña) */
.btn-link {
    color: #64748b;
    text-decoration: none;
    font-weight: 500;
    font-size: 0.9rem;
}
        .btn-link:hover {
        color: #0f172a;
        text-decoration: underline;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Sistema Matrícula') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto"></ul>

                <ul class="navbar-nav ms-auto">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end border-0 shadow-sm" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Cerrar Sesión
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div id="app" class="main-wrapper w-100">
        <main class="w-100">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>